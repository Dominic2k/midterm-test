<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use  App\Models\Product;
use  App\Models\Type_product;
use  App\Models\Comment;
class PageController extends Controller
{
    public function getIndex(Request $request){

//        $search = $request->get('search');
//        $resultsSearch = Product::query()->where('name',operator: 'like' , value: "%" . $search . "%")->paginate(8);
//        $resultsSearch->appends(['search' => $search]);

        $slide = slide::all();
        $new_product= Product::where('new',1)->paginate(4);
        $promotion_product= Product::where('promotion_price',">",0)->orderBy('promotion_price','desc')->paginate(4);
        return view('Page.homepage',compact('slide','new_product','promotion_product'));
    }
//    public function getProduct(){
//        $products = product::all();
//        return view('Page.ShowProduct',compact('products'));
//    }
    public function getDetail($id){
        $product = Product::where('id',$id)->first();
        $related_products = Product::where('id_type',$product->id_type)->paginate(3);
        $comments = Comment::where('id_product',$id)->paginate(4);
        return view("Page.detail")->with(['product'=>$product,'related_products'=>$related_products,'comments'=>$comments]);
    }
    public function newComment($id, Request $request){
        $comment = new Comment;
        $comment->id_product = $id;
        $comment->username = "Đạt đẹp trai 9.5 điểm";
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->back();
    }
    public function getTypeProduct($type_id){
        $slide = slide::all();
        $exist = false;
        $type_products = type_product::all();
        foreach($type_products as $type){
            if($type->id==$type_id){
                $exist=true;
            }
        }
        if($exist){
            $new_product= Product::where('new',1)->where('id_type',$type_id)->paginate(4);
            $promotion_product= Product::where('promotion_price',">",0)->where('id_type',$type_id)->orderBy('promotion_price','desc')->paginate(4);
            return view('Page.type_of_product',compact('slide','type_products','new_product','promotion_product'));
        }
    }
    public function getAbout(){
        return view('Page.about');
    }
    public function getContact(){
        return view('Page.contact');
    }
}
