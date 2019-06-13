<?php

namespace App\Http\Controllers\Wap;

use Log,Tree;
use Illuminate\Http\Request;
use App\Models\Nav;
use App\Http\Controllers\Wap\Controller as BaseController;
use App\Repositories\Eloquent\ProductRepositoryInterface;
use App\Repositories\Eloquent\ProductCategoryRepositoryInterface;

class ProductController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->product_repository = app(ProductRepositoryInterface::class);
        $this->product_category_repository = app(ProductCategoryRepositoryInterface::class);
        $this->view_prefix = 'product.';
    }
    public function index(Request $request)
    {
        $categories = $this->product_category_repository->categories();
        $category_id = $request->input('category_id',$categories[0]['id']);

        $products = $this->product_repository
            ->where(['category_id' => $category_id])
            ->orderBy('id','desc')
            ->paginate(12);

        return $this->response->title('产品中心')
            ->data([
                'products' => $products,
                'categories' => $categories,
                'category_id' => $category_id,
            ])
            ->view($this->view_prefix.'index', true)
            ->output();
    }
    public function show(Request $request,$id)
    {
        $product = $this->product_repository->find($id);
        return $this->response->title($product['name'])
            ->layout('product')
            ->view($this->view_prefix.'show')
            ->data(compact('product'))
            ->output();
    }
}
