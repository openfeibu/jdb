<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\product;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\ProductRepositoryInterface;
use App\Repositories\Eloquent\ProductCategoryRepositoryInterface;

class ProductResourceController extends BaseController
{
    public function __construct(ProductRepositoryInterface $product,ProductCategoryRepositoryInterface $product_category)
    {
        parent::__construct();
        $this->repository = $product;
        $this->category_repository = $product_category;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request)
    {
        $limit = $request->input('limit',config('app.limit'));
        $categories = $this->category_repository->categories();

        $search = $request->input('search',[]);
        $category_id = isset($search['category_id']) ? $search['category_id'] : '';

        $products = $this->repository;
        if($category_id)
        {
            $products = $products->where(['category_id' => $category_id]);
        }
        $products = $products
            ->orderBy('id','desc')
            ->paginate($limit);

        foreach ($products as $key => $product)
        {
            $product->category_name = $product->category->name;
            $product->qrcode = app(Product::class)->generateQrcode($product->id,$product->name);
        }

        if ($this->response->typeIs('json')) {
            $data = $products ? $products->toArray()['data'] : [];
            return $this->response
                ->success()
                ->count($products->total())
                ->data($data)
                ->output();
        }

        return $this->response->title(trans('app.admin.panel'))
            ->view('product.index')
            ->data(compact('products','categories','category_id'))
            ->output();
    }
    public function create(Request $request)
    {
        $product = $this->repository->newInstance([]);

        $categories = $this->category_repository->categories();

        return $this->response->title(trans('app.admin.panel'))
            ->view('product.create')
            ->data(compact('product','categories'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $product = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('product.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('product/product'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('product/product'))
                ->redirect();
        }
    }
    public function show(Request $request,product $product)
    {
        if ($product->exists) {
            $view = 'product.show';
        } else {
            $view = 'product.create';
        }
        $categories = $this->category_repository->categories();
        return $this->response->title(trans('app.view') . ' ' . trans('product.name'))
            ->data(compact('product','categories'))
            ->view($view)
            ->output();
    }
    public function update(Request $request,product $product)
    {
        try {
            $attributes = $request->all();

            $product->update($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('product.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('product/product'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('product/product'))
                ->redirect();
        }
    }
    public function destroy(Request $request,product $product)
    {
        try {
            $this->repository->forceDelete([$product->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('product.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('product/product'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('product/product'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('product.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('product/product'))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('product/product'))
                ->redirect();
        }
    }
}
