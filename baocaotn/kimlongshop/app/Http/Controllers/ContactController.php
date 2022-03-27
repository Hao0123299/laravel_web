<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Contact;
use App\Slider;
use File;
use Illuminate\Support\Facades\Redirect;
session_start();

class ContactController extends Controller
{
    public function lien_he(Request $request)
    {

        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc = "Liên hệ với chúng tôi";
        $meta_keywords = "Liên hệ với chúng tôi";
        $meta_title = "Liên hệ với chúng tôi";
        $url_canonical = $request->url();
        //--seo

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(6);
        $contact = Contact::where('contact_id', 2)->get();


        // return view('pages.home')->with(compact('cate_product','brand_product','all_product')); //2
        return view('pages.contact.contact')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider)
            ->with('contact', $contact); //1;
    }
    public function contact_admin()
    {
        $contact = Contact::where('contact_id', 2)->get();

        return view('admin.contact.add_contact')->with('contact', $contact);
    }
    public function contact_save(Request $request)
    {
        $data = $request->all();
        $contact = new Contact();
        $contact->contact_contact = $data['contact_conatct'];
        $contact->contact_map = $data['contact_map'];
        $contact->contact_fanpage = $data['contact_fanpage'];

        $path ='public/uploads/contact/';
        $get_image = $request->file('contact_img');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $contact->contact_img = $new_image;
        }
        $contact->save();
        return redirect()->back()->with('message','Thêm thông tin liên hệ của cửa hàng thành công');
    }
    public function update_save(Request $request, $contact_id)
    {
        $data = $request->all();
        $contact = Contact::find($contact_id);
        $contact->contact_contact = $data['contact_conatct'];
        $contact->contact_map = $data['contact_map'];
        $contact->contact_fanpage = $data['contact_fanpage'];
       /* $contact->contact_slogan = $data['contact_slogan'];*/

      /*  $path ='public/uploads/contact/';
        $get_image = $request->file('contact_img');
        if($get_image){
            unlink($path.$contact->contact_img);/*xóa ảnh cũ khỏi thư mục
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $contact->contact_img = $new_image;
        }*/
        $contact->save();
        return redirect()->back()->with('message','Cập nhật thông tin liên hệ của cửa hàng thành công');
    }
}
