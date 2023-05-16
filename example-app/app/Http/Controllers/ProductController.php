<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ProductImageModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function listProduct(Request $request){
        $listProduct = ProductModel::orderBy('id_product','desc')->get();
        $getBrands = BrandModel::orderBy('id_brand','desc')->get();
        $listCategory = CategoryModel::orderBy('id_category','desc')->get();
        return view('admin.layouts.products.list',compact('getBrands','listCategory','listProduct'));
    }

    public function apiListProduct(Request $request){
        $listProduct = ProductModel::with('images')->get();
        return response()->json([
            'status' => 200,
            'data' => $listProduct
        ]);
    }

    public function addProduct(Request $request){

    }

    public function editProduct(Request $request){
     
    }

    public function postAddProduct(Request $request){
        $validator = Validator::make($request->all(),
            [
                'name' => "required|unique:product,name_product"
            ],
            [
                'name.required' => 'Tên sản phẩm không được bỏ trống',
                'name.unique' => 'Tên sản phảm đã tồn tại'
            ]
        );
        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'message' => $validator->messages() 
            ]);
        }
        $p = new ProductModel();
        $p->name_product = $request->name;
        $p->slug = $request->slug;
        $p->p_desc_short = $request->desc_short;
        $p->p_desc = $request->desc;
        $p->id_brand = $request->idBrand;
        $p->id_category = $request->id_category;
        $p->product_SKU = $request->product_sku; 
        if($request->status != "undefined"){
            $p->status = $request->status;
        }
        $p->save();
        $get_last_product = ProductModel::orderBy('id_product','desc')->first();
        if($request->image){
           
            foreach($request->image as $image){
                
                $imageName = $image;
                $name_image = time().'_'.$imageName->getClientOriginalName();
                $explode = explode('.',$name_image);
                $typeImage = end($explode);
                $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
                if(in_array($typeImage,$imageExtensions)){
                    $p_image = new ProductImageModel();
                    $path = 'public/uploads/images/products/';
                    $imageName->move($path,$name_image);
                    $link_url = env('APP_URL').'/'.$path.$name_image;
                    $p_image->link_img = $link_url;
                    $p_image->name_img = $name_image;
                    $p_image->id_product = $get_last_product->id_product;
                    $p_image->save();
                }else{
                    return response()->json(
                     [
                        'status' => 404,
                        'message' => ["image" =>  "Tệp phải là hình ảnh"]
                     ]
                    );
                }
            }
           
        }

        if($request->size){
            foreach ($request->size as $item) {
                // LAY SIZE RA : let size = new SIZEMODEL()
                // PUSH SIZE CỦA SẢN PHẨM ĐÓ VÀO: $size->* = $item
                // Lấy ra các size vừa tạo
                if($request->color){
                    if(count($request->color) > 0){
                        foreach ($request->color as $cl) {
                            
                        }
                    }
                }
            }
        }
        return response()->json([
            'status' => 200,
            'data' => $request->all()
        ]);
    }

    public function putEditProduct(Request $request){
        

    }
}
