<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_attr extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id','size_id','timber_id','product_id','price','storge'
    ];
    protected $primaryKey = 'id';
    protected $table = 'tbl_product_attr';
}
