<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Slider;
use App\Http\Requests;
use App\Picture;
use App\Comment;
use File;
use Illuminate\Support\Facades\Redirect;
session_start();

class CommentController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function comment(Request $request)
    {
        $this->AuthLogin();
        $comment = Comment::with('product')->orderBy('comment_status', 'DESC')->get();
        return view('admin.comment.comment_list')->with('comment',  $comment);
    }
    public function comment_allow(Request $request)
    {
        $data = $request->all();
        $comment = Comment::find($data['comment_id']);
        $comment->comment_status = $data['comment_status'];
        $comment->save();
    }
    public function comment_reply(Request $request)
    {
        $data = $request->all();
        $comment = new Comment();
        $comment->comment_name = 'admin';
        $comment->comment_comment = $data['comment'];
        $comment->comment_product_id = $data['comment_product_id'];
        $comment->comment_status = 0; /*hiện thị*/
        $comment->comment_comment_prarent = $data['comment_id']; /*trả lời đánh giá dựa trên comment_id*/
        $comment->save();
    }

}
