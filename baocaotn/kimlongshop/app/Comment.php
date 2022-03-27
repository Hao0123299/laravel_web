<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'comment_name', 'comment_comment', 'comment_date', 'comment_product_id', 'comment_status', 'comment_comment_prarent'
    ];
    protected $primaryKey = 'comment_id';
    protected $table = 'tbl_comment';
    /*1 đánh giá 1 sản phẩm*/
    public function product()
    {
        return $this->belongsTo('App\Product','comment_product_id');
    }
    public function comment_allow(Request $request)
    {
        $data = $request->all();
        $comment = Comment::find($data['comment_id']);
        $comment->comment_status = $data['comment-status'];
        $comment->save();

    }

}
