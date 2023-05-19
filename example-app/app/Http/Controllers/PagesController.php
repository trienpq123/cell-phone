<?php

namespace App\Http\Controllers;

use App\Models\PagesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller{

    public function listPages(Request $request)
    {
        $pages = PagesModel::orderBy('id_page','desc')->get();

        return view('admin.layouts.pages.list',compact('pages'));
    }

    public function apiListPages(Request $request)
    {
        $page = PagesModel::orderBy('id_page','desc')->get();
        return response()->json([
            'status' => 200,
            'data' => $page
        ]);
    }

    public function addPages(Request $request)
    {

    }

    public function editPages(Request $request)
    {
        if($request->id){
            $check_pages = PagesModel::find($request->id)->first();
            return response()->json([
                'status' => 200,
                'data' => $check_pages
            ]);

        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Trang không tồn tại'
            ]);
        }
    }

    public function putEditPages(Request $request){

        if($request->id){
            $check_pages = PagesModel::find($request->id)->first();
            if($check_pages){
                $check_pages->name_page = $request->name;
                $check_pages->slug = $request->slug;
                $check_pages->meta_description = $request->desc;
                $check_pages->meta_keyword = $request->keyword;
                $check_pages->meta_title = $request->title;
                $check_pages->status = $request->status;
                $check_pages->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Cập nhật thành công'
                ]);
            }
        }

    }

    public function postAddPages(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => "required|unique:pages,name_page",
                'slug' => "required|unique:pages,slug"
            ],
            [
                'name.required' => 'Tên trang không được bỏ trống',
                'name.unique' => 'Tên trang đã tồn tại',
                'slug.required' => 'Đường dẫn không được bỏ trống',
                'slug.unique' => 'Đường dẫn đã tồn tại'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 404,
                'message' => $validator->messages()
            ]);
        }
        $page = new PagesModel();
        $page->name_page = $request->name;
        $page->slug = $request->slug;
        $page->meta_description = $request->desc;
        $page->meta_keyword = $request->keyword;
        $page->meta_title = $request->title;
        $page->status = $request->status;
        $page->save();
        return response()->json([
            'status' => 200,
            'message' => $request->all()
        ]);
    }

    public function deletePages(Request $request)
    {
        if($request->data){
            foreach ($request->data as $id) {
                PagesModel::find($id)->delete();
            }

            return response()->json([
                'status' => 200,
                'message' => 'Xoá thành công'
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Trang xoá không tồn tại'
            ]);
        }
    }

    public function deleteDetailPages(Request $request){

    }

    public function deleteImagePages(Request $request){

    }

}
?>
