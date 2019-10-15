<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use App\Traits\Hashids\Hashids;
use App\Traits\Trans\Translatable;
use QrCode;

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
        return $this->generateQrcode($id,$name);
    }

    public function generateQrcode($id,$name)
    {
        $size = 800;
        $url = config('app.url').'?product/id/'.$id;
        $file_name = $id.'-'.$size.'-'.md5($url).'.png';
        $file = storage_path('uploads').DIRECTORY_SEPARATOR.'qrcode'.DIRECTORY_SEPARATOR.$file_name;
//        if(!file_exists($file))
//        {
            QrCode::format('png')->size($size)->merge(storage_path('uploads').'/logo.png',0.1,true)->encoding('UTF-8')->generate($url, $file);
        //}
        return '/qrcode/'.$file_name;
    }
}
