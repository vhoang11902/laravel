<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'attr_name','value'
    ];
    protected $primaryKey = 'attr_id';
    protected $table = 'tbl_attribute';
}
