<?php

namespace App\Http\Controllers\Backend\Testmonials;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Testmonials\ManageTestmonialsRequest;
use App\Repositories\Backend\TestmonialsRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class TestmonialsTableController extends Controller
{
    /**
     * @var \App\Repositories\Backend\TestmonialsRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\TestmonialsRepository $testmonials
     */
    public function __construct(TestmonialsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Http\Requests\Backend\Testmonials\ManageTestmonialsRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTestmonialsRequest $request)
    {
        return Datatables::of($this->repository->getForDataTable())
            ->escapeColumns(['testmonial'])
            ->filterColumn('show_on_home', function ($query, $keyword) {
                if (in_array(strtolower($keyword), ['active', 'inactive'])) {
                    $query->where('testmonials.show_on_home', (strtolower($keyword) == 'active') ? 1 : 0);
                }
            })
            ->editColumn('created_at', function ($testmonials) {
                return Carbon::parse($testmonials->created_at)->toDateString();
            })
            ->addColumn('actions', function ($testmonials) {
                return $testmonials->action_buttons;
            })
            ->make(true);
    }
}
