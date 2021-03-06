<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'admin_email', 'admin_password', 'admin_name','admin_phone', 'admin_reset_password'
    ];
    protected $primaryKey = 'admin_id';
 	protected $table = 'tbl_admin';

 	public function roles(){
 	    /*admin có nhiều quyền*/
 		return $this->belongsToMany('App\Roles');
 	}
 	public function getAuthPassword()
    {
        return $this->admin_password;
    }
    public function hasAnyRoles($roles){
 	    /*nhiều quyền vd: admin, nhân viên*/
        return null !==  $this->roles()->whereIn('name',$roles)->first();
    }
    public function hasRole($role){
        /*chỉ 1 quyền quyền chỉ admin*/
        return null !==  $this->roles()->where('name',$role)->first();
    }


}
