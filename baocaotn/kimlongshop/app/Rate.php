<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'product_id','rate_rate'
    ];
    protected $primaryKey = 'rate_id';
    protected $table = 'tbl_rate';
}
