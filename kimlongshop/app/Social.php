<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    public $timestamps = false;
    protected $fillable = [
          'provider_user_id',  'provider',  'user', 'provider_user_email'
    ];

    protected $primaryKey = 'user_id';
 	protected $table = 'tbl_social';

 	public function customer(){
 		return $this->belongsTo('App\Customer', 'user');
 	}

}
