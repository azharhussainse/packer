<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Events\Frontend\Auth\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Repositories\Frontend\Auth\UserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Mail\Frontend\VerifyEmail;
/**
 * Class RegisterController.
 */
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * RegisterController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(home_route());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        abort_unless(config('access.registration'), 404);

        return view('frontend.auth.register');
    }

    /**
     * @param RegisterRequest $request
     *
     * @throws \Throwable
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function registerStepOne(RegisterRequest $request){
        $request->validate([
            'first_name' => 'required|string',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'country'=> 'required'
        ]);

        $otp = Str::random(5);
        echo $otp;
        //echo $request->email;
        \Session::put('inputs', $request->input());
        \Session::put('otp', $otp);
        \Mail::to($request->email)->send(new VerifyEmail($otp));
        return redirect()->route('frontend.auth.register.verify');
        //exit();
    }


    public function registerVerifyForm(){
        return view('frontend.auth.verify');
    }
    public function registerVerifyCode(Request $request){
        $inputs = \Session::get('inputs');
        $otp = \Session::get('otp');
        if(!empty($inputs)){
            if($otp == $request->verifycode){
                return redirect()->route('frontend.auth.register.setpassword')->with('flash_success','Verification Successfull.');
            }
        }
        return redirect()->back()->withErrors('Verification failded.');
    }

    public function showSetPassword(){
        return view('frontend.auth.setpassword');
    }
    public function setPassword(Request $request){
        dd($request);
    }

    /**
     * @param RegisterRequest $request
     *
     * @throws \Throwable
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'email' => 'required|unique:users',
            'password'=> 'required'
        ]);
        abort_unless(config('access.registration'), 404);

        $user = $this->userRepository->create($request->only('first_name', 'email', 'password'));
        //$user = $this->userRepository->create($request->only('first_name', 'username', 'email', 'dobm', 'dobd', 'doby', 'country','password','cnic','phone','passport'));
        // If the user must confirm their email or their account requires approval,
        // create the account but don't log them in.
        if (config('access.users.confirm_email') || config('access.users.requires_approval')) {
            event(new UserRegistered($user));

            return redirect($this->redirectPath())->withFlashSuccess(
                config('access.users.requires_approval') ?
                    __('exceptions.frontend.auth.confirmation.created_pending') :
                    __('exceptions.frontend.auth.confirmation.created_confirm')
            );
        }

        auth()->login($user);

        event(new UserRegistered($user));

        return redirect($this->redirectPath());
    }
}
