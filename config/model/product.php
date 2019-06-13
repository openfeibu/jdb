<?php
return [
    /*
     * Package .
     */
    'package'  => 'product',

    /*
     * Modules .
     */
    'modules'  => ['product'],


    /*
     * Views for the page  .
     */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

    'product'     => [
        'model'        => 'App\Models\Product',
        'table'        => 'products',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'dates'        => ['deleted_at'],
        'fillable'     => ['category_id','name','image','content', 'price','company','created_at','updated_at'],
        'translate'    => ['category_id','name','image','content', 'price','company','created_at','updated_at'],
        'upload_folder' => '/product/',
        'encrypt'      => ['id'],
        'revision'     => ['name'],
        'perPage'      => '20',
        'search'        => [
            'name'  => 'like',
        ],
    ],
    'category'     => [
        'model'        => 'App\Models\ProductCategory',
        'table'        => 'product_categories',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        'dates'        => ['deleted_at'],
        'fillable'     => ['name','order'],
        'translate'    => ['name','order'],
        'upload_folder' => '/product/',
        'encrypt'      => ['id'],
        'revision'     => ['name'],
        'perPage'      => '20',
        'search'        => [
            'name'  => 'like',
        ],
    ],
];