<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\FilterProduct;
use App\Models\ProductDetailModel;
use App\Models\ProductImageModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function listProduct(Request $request)
    {
        $listProduct = ProductModel::orderBy('id_product', 'desc')->get();
        $getBrands = BrandModel::orderBy('id_brand', 'desc')->get();
        $listCategory = CategoryModel::whereNull('parent_category')->orderBy('id_category', 'desc')->get();
        return view('admin.layouts.products.list', compact('getBrands', 'listCategory', 'listProduct'));
    }

    public function apiListProduct(Request $request)
    {
        $listProduct = ProductModel::with('images')->get();
        return response()->json([
            'status' => 200,
            'data' => $listProduct
        ]);
    }

    public function addProduct(Request $request)
    {

    }

    public function editProduct(Request $request)
    {
        if ($request->id) {
            $a = ProductModel::where('id_product', '=', $request->id);
            $b = $a->FirstOrFail();
            $product = ProductModel::where('id_product', '=', $request->id)->with('brands', 'images', 'category', 'product_detail')->first();
            return response()->json([
                'status' => 200,
                'data' => $product
            ]);
        }
    }


    public function postAddProduct(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => "required|unique:product,name_product"
            ],
            [
                'name.required' => 'Tên sản phẩm không được bỏ trống',
                'name.unique' => 'Tên sản phảm đã tồn tại'
            ]
        );
        if ($validator->fails()) {
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

        $id_category = '';
        if($request->id_category){
            $id_category = $request->id_category;
            if($request->category_1){
                $id_category = $request->category_1;
                if($request->category_2){
                    $id_category = $request->category_2;
                }
            }
        }
        $p->id_category = $id_category;
        $p->product_SKU = $request->product_sku;
        $p->status = $request->status;
        $p->save();
        $get_last_product = ProductModel::orderBy('id_product', 'desc')->first();
        if ($request->image) {

            foreach ($request->image as $image) {

                $imageName = $image;
                $name_image = time() . '_' . $imageName->getClientOriginalName();
                $explode = explode('.', $name_image);
                $typeImage = end($explode);
                $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief', 'jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
                if (in_array($typeImage, $imageExtensions)) {
                    $p_image = new ProductImageModel();
                    $path = 'public/uploads/images/products/';
                    $imageName->move($path, $name_image);
                    $link_url = env('APP_URL') . '/' . $path . $name_image;
                    $p_image->link_img = $link_url;
                    $p_image->name_img = $name_image;
                    $p_image->id_product = $get_last_product->id_product;
                    $p_image->save();
                } else {
                    return response()->json(
                        [
                            'status' => 404,
                            'message' => ["image" =>  "Tệp phải là hình ảnh"]
                        ]
                    );
                }
            }
        }
        if (!empty($request->product_detail)) {
            $decoded = json_decode($request->product_detail);
            if (!is_null($decoded) && count($decoded) > 0) {
                foreach ($decoded as $item) {
                    $PDetail = new ProductDetailModel();
                    $PDetail->id_product = $get_last_product->id_product;
                    $PDetail->size = isset($item->SizeOfProductValue) ? $item->SizeOfProductValue : null;
                    $PDetail->color = isset($item->colorOfProductValue) ? $item->colorOfProductValue : null;
                    $PDetail->price = isset($item->product_price) ? $item->product_price : null;
                    $PDetail->price_sale = isset($item->product_price_old) ? $item->product_price_old : null;
                    $PDetail->quanlity = isset($item->product_stock) ? $item->product_stock : null;
                    $PDetail->product_sku = isset($item->product_type_sku) ? $item->product_type_sku : null;
                    $PDetail->save();
                }
            }
        }

        if ($request->option) {
            if (!empty($request->option)) {
                $explode_option = explode(',',$request->option);
                foreach ($explode_option as $o) {
                    $fp = new FilterProduct();
                    $fp->id_product = $get_last_product->id_product;
                    $fp->id_filter = $o;
                    $fp->save();
                }
            }
        }
        $produc_Data = ProductModel::all();
        return response()->json([
            'status' => 200,
            'request' => json_decode($request->product_detail),
            'product_detail' => $request->all(),
            'option' => $fp
        ]);
    }

    public function putEditProduct(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => "required|"
            ],
            [
                'name.required' => 'Tên sản phẩm không được bỏ trống',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => $validator->messages()
            ]);
        }
        $p = ProductModel::where('id_product','=',$request->id)->first();
        $p->name_product = $request->name;
        $p->slug = $request->slug;
        $p->p_desc_short = $request->desc_short;
        $p->p_desc = $request->desc;
        $p->id_brand = $request->idBrand;
        $p->id_category = $request->id_category;
        $p->product_SKU = $request->product_sku;
        $p->status = $request->status;

        $p->save();
        if ($request->image) {

            foreach ($request->image as $image) {

                $imageName = $image;
                $name_image = time() . '_' . $imageName->getClientOriginalName();
                $explode = explode('.', $name_image);
                $typeImage = end($explode);
                $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief', 'jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
                if (in_array($typeImage, $imageExtensions)) {
                    $p_image = new ProductImageModel();
                    $path = 'public/uploads/images/products/';
                    $imageName->move($path, $name_image);
                    $link_url = env('APP_URL') . '/' . $path . $name_image;
                    $p_image->link_img = $link_url;
                    $p_image->name_img = $name_image;
                    $p_image->id_product = $request->id;
                    $p_image->save();
                } else {
                    return response()->json(
                        [
                            'status' => 404,
                            'message' => ["image" =>  "Tệp phải là hình ảnh"]
                        ]
                    );
                }
            }
        }
        $a = [];
        if (!empty($request->product_detail)) {
            $decoded = json_decode($request->product_detail);
            if (!is_null($decoded) && count($decoded) > 0) {

                foreach ($decoded as $item) {
                    if(!empty($item->idProductDetail)){

                        $PDetail = ProductDetailModel::where('id_product_detail','=',$item->idProductDetail)->first();
                            // $PDetail->id_product = $request;
                             $PDetail->price = 3;
                            $PDetail->price_sale = $item->product_price_old;
                            $PDetail->quanlity = $item->product_stock;
                            $PDetail->product_sku = $item->product_type_sku;
                            $PDetail->save();
                    }
                    else{

                        $PDetail = new ProductDetailModel();
                        $PDetail->id_product = $request->id;
                        $PDetail->size =$item->colorOfProductValue;
                        $PDetail->color =$item->colorOfProductValue;
                        $PDetail->price =$item->product_price;
                        $PDetail->price_sale =$item->product_price_old;
                        $PDetail->quanlity =$item->product_stock;
                        $PDetail->product_sku =$item->product_type_sku;

                        $PDetail->save();
                    }

                }
            }
        }
        $produc_Data = ProductModel::all();
        return response()->json([
            'status' => 200,
            'product_detail' => $request->all(),
            'data' =>  json_decode($request->product_detail),
            'a' => $a
        ]);
    }

    public function deleteProduct(Request $request)
    {
        if ($request->data) {

            foreach ($request->data as $id) {
                $image = ProductImageModel::where('id_product', '=', $id);
                if (count($image->get()) > 0) {
                    foreach ($image as $i) {
                        if (File::exists("public/uploads/images/products/" . $image->link_img)) {
                            File::delete("public/uploads/images/products/" . $image->link_img);
                        }
                    }
                    $image->delete();
                }

                $productDetail = ProductDetailModel::where('id_product', '=', $id);
                if (count($productDetail->get()) > 0) {
                    foreach ($productDetail as $PD) {
                        if (File::exists('public/uploads/images/products/' . $PD->name_img)) {
                            File::delete('public/uploads/images/products/' . $PD->name_img);
                        }
                    }
                    $productDetail->delete();
                }

                ProductModel::where('id_product', '=', $id)->delete();
            }
            return response()->json([
                "status" => 200,
                "data" => $image->get()
            ]);
        }
    }

    public function deleteDetailProduct(Request $request){
        if($request->id){
            $check_productDetail = ProductDetailModel::where('id_product_detail','=',$request->id);
            if(count($check_productDetail->get()) > 0){
                $check_productDetail->delete();
            }
            return response()->json([
                'status' => 200,
                'message' => 'Đã xoá thành công'
            ]);
        }
    }

    public function deleteImageProduct(Request $request){
        if($request->id){
            $check_productImages = ProductImageModel::where('id_product_image','=',$request->id);
            if(count($check_productImages->get()) > 0){
                $check_productImages->delete();
            }
            return response()->json([
                'status' => 200,
                'message' => 'Đã xoá thành công'
            ]);
        }
    }
}
