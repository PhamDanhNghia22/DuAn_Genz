<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    //
    public function ShopProduct(Request $request){
        if($request->orderby){
            $orderby = $request->orderby;
            switch($orderby){
                case 'gia:tangdan':
                    $products= Product::where('status','=','0')->orderBy('price','ASC')->paginate(14);
                    return view('client.index.shop',compact('products'));

                    break;
                case 'gia:giamdan':
                    $products= Product::where('status','=','0')->orderBy('price','DESC')->paginate(14);
                    return view('client.index.shop',compact('products'));

                break;
                case 'moinhat':
                    $products= Product::where('status','=','0')->orderBy('id','DESC')->paginate(14);
                    return view('client.index.shop',compact('products'));

                break;
                case 'cunhat':
                    $products= Product::where('status','=','0')->orderBy('id','ASC')->paginate(14);
                    return view('client.index.shop',compact('products'));

                break;
                default:
                $products= Product::where('status','=','0')->paginate(14);
                return view('client.index.shop',compact('products'));


                break;
            }


        }elseif($request->start_price && $request->end_price){
            $price_start = $request->start_price;
            $price_end = $request->end_price;
            $products= Product::whereBetween('price',[$price_start, $price_end])->orderBy('id','DESC')->paginate(14);
            return view('client.index.shop',compact('products'));

        }
        else{
            $products= Product::where('status','=','0')->paginate(14);
            return view('client.index.shop',compact('products'));
        }

        // $products = Product::where('status','=','0')->paginate(14);
        // return view('client.index.shop',compact('products'));

    }

    public static  function countProductByIdCate($id) // id danh mục
    {
        return Product::where('category_id', $id)->count();
    }
    // public function ProductCate($idsp){
    //     $product= Product::where('category_id',$idsp)->get();
    //     // $product = Product::where('status','=','0')
    //     // ->join('categories','categories.id','=','products.category_id')
    //     // ->select('categories.name','products.id','products.title','products.slug','products.quantily','products.price','products.size','products.date','products.thumnail','products.saled','products.color','products.view','products.category_id','products.brand_id','products.description','products.status','products.tags')
    //     // ->where('category_id', $idsp )->first();

    //     return view('client.index.productCate',compact('product'));
    // }
    // public function ProductCate($idsp){
    //     // $category =Category::where('status','=','0')->where('id', $idsp)->first();
    //     $product = Product::where('status','=','0')->where('category_id', $idsp )->get();

    //     return view('client.index.shop', compact('product'));
    // }

}
