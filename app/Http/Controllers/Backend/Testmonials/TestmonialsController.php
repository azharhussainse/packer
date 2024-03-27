<?php

namespace App\Http\Controllers\Backend\Testmonials;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Testmonials\CreateTestmonialsRequest;
use App\Http\Requests\Backend\Testmonials\DeleteTestmonialsRequest;
use App\Http\Requests\Backend\Testmonials\ManageTestmonialsRequest;
use App\Http\Requests\Backend\Testmonials\StoreTestmonialsRequest;
use App\Http\Requests\Backend\Testmonials\UpdateTestmonialsRequest;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Testimonial;
use App\Repositories\Backend\TestmonialsRepository;
use Illuminate\Support\Facades\View;

class TestmonialsController extends Controller
{
    /**
     * @var \App\Repositories\Backend\TestmonialsRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\TestmonialsRepository $testmonial
     */
    public function __construct(TestmonialsRepository $repository)
    {
        $this->repository = $repository;
        View::share('js', ['testmonials']);
    }

    /**
     * @param \App\Http\Requests\Backend\Testmonials\ManageTestmonialsRequest $request
     *
     * @return ViewResponse
     */
    public function index(ManageTestmonialsRequest $request)
    {
        return new ViewResponse('backend.testmonials.index');
    }

    /**
     * @param \App\Http\Requests\Backend\Testmonials\CreateTestmonialsRequest $request
     *
     * @return ViewResponse
     */
    public function create(CreateTestmonialsRequest $request)
    {
        return new ViewResponse('backend.testmonials.create');
    }

    /**
     * @param \App\Http\Requests\Backend\Testmonials\StoreTestmonialsRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreTestmonialsRequest $request)
    {
        $this->repository->create($request->except('_token'));

        return new RedirectResponse(route('admin.testmonials.index'), ['flash_success' => __('alerts.backend.testmonials.created')]);
    }

    /**
     * @param \App\Models\Testimonial $testmonial
     * @param \App\Http\Requests\Backend\Testmonials\ManagePageRequest $request
     *
     * @return ViewResponse
     */
    public function edit(Testimonial $testmonial, ManageTestmonialsRequest $request)
    {
        return new ViewResponse('backend.testmonials.edit', ['testmonial' => $testmonial]);
    }

    /**
     * @param \App\Models\Testimonial $testmonial
     * @param \App\Http\Requests\Backend\Testmonials\UpdateTestmonialsRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(Testimonial $testmonial, UpdateTestmonialsRequest $request)
    {
        $this->repository->update($testmonial, $request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.testmonials.index'), ['flash_success' => __('alerts.backend.testmonials.updated')]);
    }

    /**
     * @param \App\Models\Testimonial $testmonial
     * @param \App\Http\Requests\Backend\Pages\DeleteTestmonialRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Testimonial $testmonial, DeleteTestmonialsRequest $request)
    {
        $this->repository->delete($testmonial);

        return new RedirectResponse(route('admin.testmonials.index'), ['flash_success' => __('alerts.backend.testmonials.deleted')]);
    }
}
