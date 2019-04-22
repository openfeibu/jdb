<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\ProductRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function model()
    {
        return config('model.product.product.model');
    }
    public function getProducts($limit=10,$category_id=0)
    {
        $products =  $this;
        if($category_id)
        {
            $products = $products->where(['category_id' => $category_id]);
        }
        $products = $products->orderBy('id','desc')->limit($limit)->all();
        return $products;
    }
}