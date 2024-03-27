<?php

namespace App\Http\Controllers\Backend\Offers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Offers\CreateOfferRequest;
use App\Http\Requests\Backend\Offers\DeleteOfferRequest;
use App\Http\Requests\Backend\Offers\EditOfferRequest;
use App\Http\Requests\Backend\Offers\ManageOfferRequest;
use App\Http\Requests\Backend\Offers\StoreOfferRequest;
use App\Http\Requests\Backend\Offers\UpdateOfferRequest;
use App\Http\Responses\Backend\Offer\EditResponse;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Offer;
use App\Models\Auth\User;
use App\Repositories\Backend\OffersRepository;
use Illuminate\Support\Facades\View;

class OffersController extends Controller
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
        View::share('js', ['offers']);
    }

    /**
     * @param \App\Http\Requests\Backend\Offers\ManageOfferRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageOfferRequest $request)
    {
        return new ViewResponse('backend.offers.index');
    }

    /**
     * @param \App\Http\Requests\Backend\Offers\CreateOfferRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function create(CreateOfferRequest $request)
    {
        $users = User::all()->pluck('name','id');
        return view('backend.offers.create')->with('users',$users);
        // return new ViewResponse('backend.offers.create');
    }

    /**
     * @param \App\Http\Requests\Backend\Offers\StoreOfferRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreOfferRequest $request)
    {
        $this->repository->create($request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.offers.index'), ['flash_success' => __('alerts.backend.offers.created')]);
    }

    /**
     * @param \App\Models\Offer $offer
     * @param \App\Http\Requests\Backend\Offers\EditOfferRequest $request
     *
     * @return \App\Http\Responses\Backend\Blog\EditResponse
     */
    public function edit(Offer $offer, EditOfferRequest $request)
    {
        return new EditResponse($offer);
    }

    /**
     * @param \App\Models\Offer $offer
     * @param \App\Http\Requests\Backend\Offers\UpdateOfferRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(Offer $offer, UpdateOfferRequest $request)
    {
        $this->repository->update($offer, $request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.offers.index'), ['flash_success' => __('alerts.backend.offers.updated')]);
    }

    /**
     * @param \App\Models\Offer $offer
     * @param \App\Http\Requests\Backend\Offers\DeleteOfferRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Offer $offer, DeleteOfferRequest $request)
    {
        $this->repository->delete($offer);

        return new RedirectResponse(route('admin.offers.index'), ['flash_success' => __('alerts.backend.offers.deleted')]);
    }
}
