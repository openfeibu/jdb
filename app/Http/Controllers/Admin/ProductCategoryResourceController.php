<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Repositories\Eloquent\ProductCategoryRepositoryInterface;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Tree;
/**
 * Resource controller class for page.
 */
class ProductCategoryResourceController extends BaseController
{
    /**
     * Initialize category resource controller.
     *
     * @param type ProductCategoryRepositoryInterface $category
     *
     * @return null
     */
    public function __construct(ProductCategoryRepositoryInterface $category)
    {
        parent::__construct();
        $this->repository = $category;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request)
    {
        $categories = $this->repository
            ->orderBy('order','asc')
            ->orderBy('id','asc')
            ->all()
            ->toArray();
        if ($this->response->typeIs('json'))
        {
            return $this->response
                ->success()
                ->data($categories)
                ->output();
        }
        return $this->response->title(trans('page::category.names'))
            ->view('product.category.index', true)
            ->data(compact('categories'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('category.name')]))
                ->success()
                ->url(guard_url('product/category'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('product/category'))
                ->redirect();
        }
    }
    public function update(Request $request,ProductCategory $category)
    {
        try {
            $attributes = $request->all();
            $category->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('category.name')]))
                ->success()
                ->url(guard_url('product/category'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('product/category'))
                ->redirect();
        }
    }
    public function destroy(Request $request,ProductCategory $category)
    {
        try {
            $this->repository->forceDelete([$category->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('category.name')]))
                ->success()
                ->url(guard_url('product/category'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('product/category'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('category.name')]))
                ->success()
                ->url(guard_url('product/category'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('product/category'))
                ->redirect();
        }
    }
}