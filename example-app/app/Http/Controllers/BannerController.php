<?php

namespace App\Http\Controllers;

use App\Models\BannerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function listBanner(Request $request)
    {

        $banner = BannerModel::orderBy('id_banner', 'desc')->get();
        return view('admin.layouts.banner.list', compact('banner'));
    }

    public function apiListBanner(Request $request)
    {
        $banner = BannerModel::orderBy('id_banner', 'desc')->get();
        return response()->json([
            'status' => 200,
            'data' => $banner
        ]);
    }

    public function addBanner(Request $request)
    {
    }

    public function editBanner(Request $request)
    {
        if($request->id){
            $banner = BannerModel::find($request->id);
            return response()->json([
                'status' => 200,
                'data' => $banner
            ]);
        }
    }

    public function putEditbanner(Request $request)
    {
        if($request->id){
            $c_banner = BannerModel::find($request->id);
            if($c_banner){

                if ($request->image) {

                    $imageName = $request->image;
                    $name_image = time() . '_' . $imageName->getClientOriginalName();
                    $explode = explode('.', $name_image);
                    $typeImage = end($explode);
                    $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief', 'jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
                    if (in_array($typeImage, $imageExtensions)) {
                        $path = 'public/uploads/images/banner/';
                        if(File::exists($path.$c_banner->name_img)){
                            File::delete($path.$c_banner->name_img);
                        }
                        $imageName->move($path, $name_image);
                        $link_url = env('APP_URL') . '/' . $path . $name_image;

                        $c_banner->link_img = $link_url;
                        $c_banner->name_img = $name_image;
                        $c_banner->alt = $request->name;
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
            $c_banner->save();
            return response()->json([
                'status' => 200,
                'message' => 'Cập nhật thành công'
            ]);
        }

    }

    public function postAddbanner(Request $request)
    {

            $c_banner = new BannerModel();
            $c_banner->alt = $request->name;
                if ($request->image) {

                    $imageName = $request->image;
                    $name_image = time() . '_' . $imageName->getClientOriginalName();
                    $explode = explode('.', $name_image);
                    $typeImage = end($explode);
                    $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief', 'jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
                    if (in_array($typeImage, $imageExtensions)) {
                        $path = 'public/uploads/images/banner/';
                        $imageName->move($path, $name_image);
                        $link_url = env('APP_URL') . '/' . $path . $name_image;

                        $c_banner->link_img = $link_url;
                        $c_banner->name_img = $name_image;

                    } else {
                        return response()->json(
                            [
                                'status' => 404,
                                'message' => ["image" =>  "Tệp phải là hình ảnh"]
                            ]
                        );
                    }
                }

            $c_banner->save();
            return response()->json([
                'status' => 200,
                'message' => 'Thêm thành công'
            ]);

    }

    public function deletebanner(Request $request)
    {
        if($request->data){
            foreach($request->data as $id){
                $banner = BannerModel::find($id);
                if($banner){
                    $path = 'public/uploads/images/banner/';
                    if(File::exists($path.$banner->name_img)){
                        File::delete($path.$banner->name_img);
                    }
                    $banner->delete();
                }
            }
            return response()->json([
                'status' => 200,
                'message' => 'Xoá thành công'
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Banner không tồn tại'
            ]);
        }
    }

    public function deleteDetailNews(Request $request)
    {
    }

    public function deleteImageNews(Request $request)
    {
    }
}
