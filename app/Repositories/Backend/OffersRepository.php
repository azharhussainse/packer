<?php

namespace App\Repositories\Backend;

use App\Exceptions\GeneralException;
use App\Models\Offer;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class OffersRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Offer::class;

    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = [
        'id',
        'request_to',
        'offer_by',
        'request_id',
        'details',
        'price',
        'fee',
        'isSelfPurchased',
        'paypal_payment_id',
        'status',
        'created_at',
        'updated_at',
    ];

    /**
     * Retrieve List.
     *
     * @var array
     * @return Collection
     */
    public function retrieveList(array $options = [])
    {
        $perPage = isset($options['per_page']) ? (int) $options['per_page'] : 20;
        $orderBy = isset($options['order_by']) && in_array($options['order_by'], $this->sortable) ? $options['order_by'] : 'created_at';
        $order = isset($options['order']) && in_array($options['order'], ['asc', 'desc']) ? $options['order'] : 'desc';
        $query = $this->query()
            ->orderBy($orderBy, $order);

        if ($perPage == -1) {
            return $query->get();
        }

        return $query->paginate($perPage);
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            //->leftjoin('users', 'users.id', '=', 'requests.created_by')
            ->select([
                'id',
                'request_to',
                'offer_by',
                'request_id',
                'details',
                'price',
                'fee',
                'isSelfPurchased',
                'paypal_payment_id',
                'status',
                'created_at',
            ]);
    }

    /**
     * @param array $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        if ($this->query()->where('title', $input['title'])->first()) {
            throw new GeneralException(__('exceptions.backend.offers.already_exists'));
        }

        $input['created_by'] = auth()->user()->id;
        $input['status'] = $input['status'] ?? 'pending';

        if ($offer = Offer::create($input)) {
            return $offer->fresh();
        }

        throw new GeneralException(__('exceptions.backend.offers.create_error'));
    }

    /**
     * Update Offer.
     *
     * @param \App\Models\Offer $offer
     * @param array $input
     */
    public function update(Offer $offer, array $input)
    {
        //$input['slug'] = Str::slug($input['title']);
        $input['updated_by'] = auth()->user()->id;
        $input['status'] = $input['status'] ?? 'pending';
        
        if ($offer->update($input)) {
            return $offer;
        }

        throw new GeneralException(
            __('exceptions.backend.offers.update_error')
        );
    }

    /**
     * @param \App\Models\Offer $offer
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Offer $offer)
    {
        if ($offer->delete()) {
            return true;
        }

        throw new GeneralException(__('exceptions.backend.offers.delete_error'));
    }
}
