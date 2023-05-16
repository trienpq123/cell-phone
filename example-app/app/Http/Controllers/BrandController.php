<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\Constraint\FileExists;

class BrandController extends Controller
{


        public function listBrand(Request $request){
            return view('admin.layouts.brand.list');
        }
    
        public function apiListBrand(Request $request){
            $brand = BrandModel::orderBy('id_brand','desc')->get();
          return response()->json([
            'status' => 200,
            'data' => $brand
          ]);
        }
    
        public function addBrand(Request $request){
            
        }
    
        public function editBrand(Request $request){
            $c_brand = BrandModel::where('id_brand','=',$request->id)->first();
            if($c_brand){
                  return response()->json([
                      "status" => 200,
                      "data" => $c_brand
                  ]);
            }
        }
    
        public function postAddBrand(Request $request){
            $validator = Validator::make($request->all(),
            [
                'name' => "required|max:255|unique:brand,name_brand",
                'slug' => "required|unique:brand,slug"
            ],
            [
                'name.required' => "Tên thương hiệu không được bỏ trống",
                'name.max' => "Tên thương hiệu không được quá 255 ký tự",
                'name.unique' => "Tên thương hiệu đã tồn tại",
                'slug.required' => "Slug không được bỏ trống",
                'slug.unique' => "Đường dẫn đã tồn tại."
            ]
            );
            if($validator->fails()){
                return response()->json([
                    'status' => 404,
                    'message' => $validator->messages()
                ]);
            }

            $brand = new BrandModel();
            $brand->name_brand = $request->name;
            $brand->slug = $request->slug;
            if($request->image != "undefined"){
                $imageName = $request->image;
                $name_image = time().'_'.$imageName->getClientOriginalName();
                $explode = explode('.',$name_image);
                $typeImage = end($explode);
                $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
                if(in_array($typeImage,$imageExtensions)){
                    $path = 'public/uploads/images/brands/';
                    $imageName->move($path,$name_image);
                    $link_url = env('APP_URL').'/'.$path.$name_image;
                    $brand->logo_brand = $link_url;
                    $brand->name_logo = $name_image;    
                }else{
                    return response()->json(
                     [
                        'status' => 404,
                        'message' => ["image" =>  "Tệp phải là hình ảnh"]
                     ]
                    );
                }
            }
            $brand->status = $request->status;
            $brand->save();
            return response()->json([
                'status' => 200,
                'data' => $request->all()
            ]);
        }
    
        public function putEditBrand(Request $request){
            if($request->id){
                $c_brand = BrandModel::where('id_brand','=',$request->id)->first();

                if($c_brand){
                    $validator = Validator::make($request->all(),
                    [
                        'name' => "required|max:255",
                        'slug' => "required"
                    ],
                    [
                        'name.required' => "Tên thương hiệu không được bỏ trống",
                        'name.max' => "Tên thương hiệu không được quá 255 ký tự",
                        'name.unique' => "Tên thương hiệu đã tồn tại",
                        'slug.required' => "Slug không được bỏ trống",
                    ]
                    );
                    if($validator->fails()){
                        return response()->json([
                            'status' => 404,
                            'message' => $validator->messages()
                        ]);
                    }
        

               
                   $c_slug_brand = BrandModel::whereNot('id_brand','=',$request->id)->where('slug','=',$request->slug)->first();
                   if($c_slug_brand){
                    return response()->json([
                        'status' => 404,
                        'message' => ["slug" => "Đường dẫn đã tồn tại"]
                    ]);
                   }else{
                       $c_brand->slug = $request->slug;
                   }
                   $c_name_brand = BrandModel::whereNot('id_brand','=',$request->id)->where('name_brand','=',$request->name)->first();
                   if($c_name_brand){
                    return response()->json([
                        'status' => 404,
                        'message' => ["name" => "Tên thương hiệu đã tồn tại"]
                    ]);
                   }else{
                    $c_brand->name_brand = $request->name;
                   }
                    if($request->image != "undefined"){
                        $imageName = $request->image;
                        $name_image = time().'_'.$imageName->getClientOriginalName();
                        $explode = explode('.',$name_image);
                        $typeImage = end($explode);
                        $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
                        if(in_array($typeImage,$imageExtensions)){
                            $path = 'public/uploads/images/brands/';
                            $imageName->move($path,$name_image);
                            $link_url = env('APP_URL').'/'.$path.$name_image;
                           $c_brand->logo_brand = $link_url;
                           $c_brand->name_logo = $name_image;    
                        }else{
                            return response()->json(
                             [
                                'status' => 404,
                                'message' => ["image" =>  "Tệp phải là hình ảnh"]
                             ]
                            );
                        }
                    }
                   $c_brand->status = $request->status;
                   $c_brand->save();
                    return response()->json([
                        'status' => 200,
                        'data' => $request->all()
                    ]);
                }
            }
    
        }

        public function deleteBrand(Request $request){
            if($request->data){
                foreach($request->data as $item) {
                   $c_brand =  BrandModel::where('id_brand','=',$item);
                   $get_brand = $c_brand->first();
                   if($get_brand){
                        if(File::exists('public/uploads/images/brands/'.$get_brand->name_logo)){
                            File::delete('public/uploads/images/brands/'.$get_brand->name_logo);
                        }
                   }
                   $c_brand->delete();
                }
            }
                return response()->json([
                    "status" => 200,
                    "message" => "Xoá thành công",
                    'id' => $request->id
                ]);
    
        }
}
