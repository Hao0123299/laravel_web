<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'product_name', 'product_slug','category_id','brand_id','product_desc','product_content',
        'product_price','product_image','product_status', 'product_view', 'product_price_cost'
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'tbl_product';
    /*1 sản phẩm có nhiều đánh giá*/
    public function product($method, $parameters)
    {
        return $this->hasMany('App\Comment');
    }
}
