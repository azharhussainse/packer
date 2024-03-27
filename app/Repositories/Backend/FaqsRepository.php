<?php

namespace App\Repositories\Backend;

use App\Exceptions\GeneralException;
use App\Models\Testmonial;
use App\Repositories\BaseRepository;

class TestmonialsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Testmonial::class;

    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = [
        'id',
        'question',
        'answer',
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
            ->select([
                'id',
                'question',
                'answer',
                'created_at',
                'status',
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
        $input['status'] = $input['status'] ?? 0;

        if ($testmonial = Testmonial::create($input)) {
            return $testmonial;
        }

        throw new GeneralException(__('exceptions.backend.testmonials.create_error'));
    }

    /**
     * @param \App\Models\Testmonial $testmonial
     * @param array $input
     */
    public function update(Testmonial $testmonial, array $input)
    {
        $input['updated_by'] = auth()->user()->id;
        $input['status'] = $input['status'] ?? 0;

        if ($testmonial->update($input)) {
            return $testmonial->fresh();
        }

        throw new GeneralException(__('exceptions.backend.testmonials.update_error'));
    }

    /**
     * @param \App\Models\Testmonial $testmonial
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Testmonial $testmonial)
    {
        if ($testmonial->delete()) {
            return true;
        }

        throw new GeneralException(__('exceptions.backend.testmonials.delete_error'));
    }
}
