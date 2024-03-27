<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\Models\Post;
use App\Models\Offer;
class PaypalController extends Controller
{
    private $_api_context;

    public function __construct()
    {

        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function postPaymentWithpaypal(Request $request)
    {
        $post = POST::find($request->request_id);
        \Session::put('inputs',$request->input());
        \Session::put('post',$post);
        //dd($request->input(),$post);
        $total_amount = $request->price + 100;
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	$item_1 = new Item();

        $item_1->setName($post->title)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($total_amount);

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($total_amount);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($request->details);

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('frontend.status'))
            ->setCancelUrl(URL::route('frontend.status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('paywithpaypal');
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Unknown error occurred');
    	return redirect()->back();//Redirect::route('frontend.of');
    }

    public function getPaymentStatus(Request $request)
    {
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('frontend.requests.index');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            $inputs = \Session::get('inputs');
            $offer = Offer::find($inputs['id']);
            $offer->price =  $inputs['price'];
            $offer->fee =  100;
            $offer->paypal_payment_id = $payment_id;
            $offer->status = 'approved';
            $offer->save();
            \Session::put('success','Payment success !!');
            \Session::put('bookingConfirmed', 'yes');
            return Redirect::route('frontend.myorders');
        }

        \Session::put('error','Payment failed !!');
		return Redirect::route('frontend.requests.index');
    }
}