<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'product_id','category_id','product_name','product_desc'
        ,'product_content','product_price','product_image','product_sku','product_status'
    ];
    protected $table = 'tbl_product';
}
