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
    public function product()
    {
        return $this->hasMany('App\Comment');
    }
    public function category()
    {
        /*sản phẩm thuộc danh mục*/
        return $this->belongsTo('App\CategoryProductModel','category_id');
    }
    public function brand()
    {
        /*sản phẩm thuộc danh mục*/
        return $this->belongsTo('App\Brand','brand_id');
    }
}
