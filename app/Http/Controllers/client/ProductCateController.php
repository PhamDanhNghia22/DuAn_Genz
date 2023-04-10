<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductCateController extends Controller
{
    // use WithPagination;
    //
    // public function productCate(){
    //     $products = Product::where('status','=','0')->get();
    //     return view('client.index.shop',compact('products'));

    // }
    // public $orderBy="Default sorting";
    // public function OrderByPrice($order){
    //     $this->orderBy = $order;

    // }
    public function ProductCate(Request $request, $idsp){
        // if($this->orderBy == "Sản phẩm tăng dần theo giá"){
        //     $product= Product::where('status','=','0')->orderBy('price', 'ASC')->where('category_id',$idsp)->paginate(14);
        // }else if($this->orderBy == "Sản phẩm giảm dần theo giá"){
        //     $product= Product::where('status','=','0')->orderBy('price', 'DESC')->where('category_id',$idsp)->orderBy('price', 'ASC')->paginate(14);
        // }else{

        // }

        if($request->orderby){
            $orderby = $request->orderby;
            switch($orderby){
                case 'gia:tangdan':
                    $product= Product::where('status','=','0')->orderBy('price','ASC')->where('category_id',$idsp)->paginate(14);
                    return view('client.index.productCategory',compact('product'));

                    break;
                case 'gia:giamdan':
                    $product= Product::where('status','=','0')->orderBy('price','DESC')->where('category_id',$idsp)->paginate(14);
                    return view('client.index.productCategory',compact('product'));

                break;
                case 'moinhat':
                    $product= Product::where('status','=','0')->orderBy('id','DESC')->paginate(14);
                    return view('client.index.productCategory',compact('product'));

                break;
                case 'cunhat':
                    $product= Product::where('status','=','0')->orderBy('id','ASC')->paginate(14);
                    return view('client.index.productCategory',compact('product'));

                break;
                default:
                $product= Product::where('status','=','0')->where('category_id',$idsp)->paginate(14);
                return view('client.index.productCategory',compact('product'));


                break;
            }


        }elseif($request->start_price && $request->end_price){
            $price_start = $request->start_price;
            $price_end = $request->end_price;
            $product= Product::where('status','=','0')->whereBetween('price',[$price_start, $price_end])->where('category_id',$idsp)->paginate(14);
            return view('client.index.productCategory',compact('product'));

        }
        else{
            $product= Product::where('status','=','0')->where('category_id',$idsp)->paginate(14);
            return view('client.index.productCategory',compact('product'));
        }



    }

}
