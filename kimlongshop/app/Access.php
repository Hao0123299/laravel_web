<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'access_ip_address', 'access_visit'
    ];
    protected $primaryKey = 'access_id';
    protected $table = 'tbl_access';
}
