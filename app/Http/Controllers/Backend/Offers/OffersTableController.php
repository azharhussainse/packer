<?php

namespace App\Http\Controllers\Backend\Offers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Offers\ManageOfferRequest;
use App\Repositories\Backend\OffersRepository;
use Yajra\DataTables\Facades\DataTables;

class OffersTableController extends Controller
{
    /**
     * @var \App\Repositories\Backend\OffersRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\OffersRepository $repository
     */
    public function __construct(OffersRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Http\Requests\Backend\Offers\ManageOfferRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageOfferRequest $request)
    {
        return Datatables::of($this->repository->getForDataTable())
            ->editColumn('request_id', function ($offer) {
                return $offer->post->title;
            })
            ->editColumn('request_to', function ($offer) {
                return $offer->requestTo->first_name.' | '.$offer->requestTo->email;
            })
            ->editColumn('offer_by', function ($offer) {
                return $offer->offerBy->first_name.' | '.$offer->offerBy->email;;
            })
            ->editColumn('created_at', function ($offer) {
                return $offer->created_at->toDateString();
            })
            ->addColumn('actions', function ($offer) {
                return $offer->action_buttons;
            })
            ->escapeColumns(['id'])
            ->make(true);
    }
}
