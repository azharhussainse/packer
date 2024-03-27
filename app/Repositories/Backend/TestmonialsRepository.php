<?php

namespace App\Repositories\Backend;

use App\Exceptions\GeneralException;
use App\Models\Testimonial;
use App\Repositories\BaseRepository;

class TestmonialsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Testimonial::class;

    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = [
        'id',
        'testmonial',
        'author',
        'show_on_home',
        'image',
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
            ->select([
                'id',
                'testmonial',
                'author',
                'created_at',
                'show_on_home',
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
        $input['created_by'] = auth()->user()->id;
        $input['show_on_home'] = $input['show_on_home'] ?? 0;

        if ($testmonial = Testimonial::create($input)) {
            return $testmonial;
        }

        throw new GeneralException(__('exceptions.backend.testmonials.create_error'));
    }

    /**
     * @param \App\Models\Testimonial $testmonial
     * @param array $input
     */
    public function update(Testimonial $testmonial, array $input)
    {
        $input['updated_by'] = auth()->user()->id;
        $input['show_on_home'] = $input['show_on_home'] ?? 0;

        if ($testmonial->update($input)) {
            return $testmonial->fresh();
        }

        throw new GeneralException(__('exceptions.backend.testmonials.update_error'));
    }

    /**
     * @param \App\Models\Testimonial $testmonial
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Testimonial $testmonial)
    {
        if ($testmonial->delete()) {
            return true;
        }

        throw new GeneralException(__('exceptions.backend.testmonials.delete_error'));
    }
}
