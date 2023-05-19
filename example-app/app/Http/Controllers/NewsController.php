<?php

namespace App\Http\Controllers;

use App\Models\NewsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{


    public function listNews(Request $request)
    {

        $news = NewsModel::orderBy('id_new', 'desc')->get();
        return view('admin.layouts.news.list', compact('news'));
    }

    public function apiListNews(Request $request)
    {
        $news = NewsModel::orderBy('id_new', 'desc')->get();
        return response()->json([
            'status' => 200,
            'data' => $news
        ]);
    }

    public function addNews(Request $request)
    {
    }

    public function editNews(Request $request)
    {

        if ($request->id) {
            $c_new = NewsModel::find($request->id);
            if ($c_new) {
                return response()->json([
                    'status' => 200,
                    'data' => $c_new
                ]);
            }
        }
    }

    public function putEditNews(Request $request)
    {

        if ($request->id) {
            $news = NewsModel::find($request->id);
            $news->title = $request->name;
            $news->slug = $request->slug;
            $news->description = $request->desc;
            $news->meta_keyword = $request->keyword;
            $news->meta_description = $request->meta_description;
            $news->meta_title = $request->meta_title;
            if ($request->image) {

                $imageName = $request->image;
                $name_image = time() . '_' . $imageName->getClientOriginalName();
                $explode = explode('.', $name_image);
                $typeImage = end($explode);
                $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief', 'jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
                if (in_array($typeImage, $imageExtensions)) {
                    $path = 'public/uploads/images/news/';
                    if(File::exists($path.$news->name_img)){
                        File::delete($path.$news->name_img);
                    }
                    $imageName->move($path, $name_image);
                    $link_url = env('APP_URL') . '/' . $path . $name_image;

                    $news->link_img = $link_url;
                    $news->name_img = $name_image;
                } else {
                    return response()->json(
                        [
                            'status' => 404,
                            'message' => ["image" =>  "Tệp phải là hình ảnh"]
                        ]
                    );
                }
            }
            $news->save();
            return response()->json([
                'status' => 200,
                'message' => 'Cập nhật thành công'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Bài viết này không tồn tại'
            ]);
        }
    }

    public function postAddNews(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => "required|unique:news,title",
                'slug' => "required|unique:news,slug"
            ],
            [
                'name.required' => 'Tiêu đề không được bỏ trống',
                'name.unique' => 'Tiêu đề đã tồn tại',
                'slug.required' => 'Đường dẫn không được bỏ trống',
                'slug.unique' => 'Đường dẫn đã tồn tại'
            ]
        );

        $news = new NewsModel();
        $news->title = $request->name;
        $news->slug = $request->slug;
        $news->description = $request->desc;
        $news->meta_keyword = $request->keyword;
        $news->meta_description = $request->meta_description;
        $news->meta_title = $request->meta_title;
        if ($request->image) {
            $imageName = $request->image;
            $name_image = time() . '_' . $imageName->getClientOriginalName();
            $explode = explode('.', $name_image);
            $typeImage = end($explode);
            $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief', 'jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
            if (in_array($typeImage, $imageExtensions)) {
                $path = 'public/uploads/images/news/';
                $imageName->move($path, $name_image);
                $link_url = env('APP_URL') . '/' . $path . $name_image;
                $news->link_img = $link_url;
                $news->name_img = $name_image;
            } else {
                return response()->json(
                    [
                        'status' => 404,
                        'message' => ["image" =>  "Tệp phải là hình ảnh"]
                    ]
                );
            }
        }
        $news->save();
        return response()->json([
            'status' => 200,
            'message' => 'Thêm thành công'
        ]);
    }

    public function deleteNews(Request $request)
    {
        if($request->data){
            foreach($request->data as $id){
                $news = NewsModel::find($id);
                if($news){
                    $path = 'public/uploads/images/news/';
                    if(File::exists($path.$news->name_img)){
                        File::delete($path.$news->name_img);
                    }
                    $news->delete();
                }
            }
            return response()->json([
                'status' => 200,
                'message' => 'Xoá thành công'
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Bài viết đã tồn tại'
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
