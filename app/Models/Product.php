<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use App\Traits\Hashids\Hashids;
use App\Traits\Trans\Translatable;

class Product extends BaseModel
{
    use Filer, Hashids, Slugger, Translatable, LogsActivity;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'model.product.product';

    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'category_id');
    }

    public function getQrcode($distributor)
    {
        $id = $distributor['id'];
        $name = $distributor['name'];
        return $this->generateQrcode($id);
    }

    public function generateQrcode($id)
    {
        $size = 800;
        $url = config('app.url').'?product/id/'.$id;
        $file_name = $id.'-'.$size.'-'.md5($url).'.svg';
        $file = storage_path('uploads').DIRECTORY_SEPARATOR.'qrcode'.DIRECTORY_SEPARATOR.$file_name;
        if(!file_exists($file))
        {
            QrCode::size($size)->generate($url, $file);
        }
        return '/qrcode/'.$file_name;
    }
}
