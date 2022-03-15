<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'contact_contact', 'contact_map', 'contact_img', 'contact_fanpage'
    ];
    protected $primaryKey = 'contact_id';
    protected $table = 'tbl_contact';
}
