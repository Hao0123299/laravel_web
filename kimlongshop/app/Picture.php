<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'picture_name', 'picture_image', 'product_id'
    ];
    protected $primaryKey = 'picture_id';
    protected $table = 'tbl_picture';
}
