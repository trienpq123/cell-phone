<?php

namespace App\Http\Controllers;

use App\Models\FilterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilterController extends Controller
{
    public function listFilter(Request $request){
        $lfilter = FilterModel::whereNull('_parent')->with('childrentFilter')->get();
        // $lfilter_child = FilterModel::whereNotNull('_parent')->get();
        $listFilter = FilterModel::all();
        return view('admin.layouts.filter.list',compact('lfilter','listFilter'));
        
    }
    public function addFilter(Request $request){
        
    }
    public function postAddFilter(Request $request){
        $request->validate(
          [  'name' => 'required']
        ,[
            'name.required' => '123'
        ]);
        $filter = new FilterModel();
        $filter->filter_name =  $request->name;
        $filter->slug =  $request->slug;
        if($request->_parent){
            $filter->_parent = $request->_parent;
        };
        $filter->save();
        // $validator = Validator::make($request->all(),[
        //     'name' => 'required'
        // ],[
        //     'name.required' => 'Khong6 duoc975 bo3 trong'
        // ]);
        // if($validator->fails()){
        //     return response()->json(['errors' => $validator->messages()]);
        // }
        return back();
    }

    public function editFilter(Request $request){
        $filter = FilterModel::where('filter_id','=',$request->id)->first();
        
        return response()->json([
            'filter' => $filter,
            'status' => 200,
            'id' => $request->id
        ]);
    }
    public function putEditFilter(Request $request){
        $validator = Validator::make($request->all(),
        [
            'name' => 'required'
        ]
        );
        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'message' => $validator->messages()
            ]);
        };
       $filter = FilterModel::where('filter_id','=',$request->id)->first();
        $filter->filter_name = $request->name;
        $filter->slug = $request->slug;
        if($request->_parent) $filter->_parent = $request->_parent;   
        $filter->save();
        return response()->json([
            'filter' => $filter,
            'status' => 200,
            'id' => $request->id,
            'name' => $request->name,
            'slug' => $request->slug,
            '_parent' => $request->_parent,
        ]);
    }

    public function deleteFilter(Request $request){
        if($request->data){
            foreach ($request->data as $item) {
                # code...
                FilterModel::find($item)->delete();   
            }
        }
        return response()->json(
           [ 
            "status" => 200,
            "messages" => "Xoá thành công",
            "data" => $request->data          
           ]
        );
    }

    public function apiListFilter(Request $reuqest){
        $listFilter = FilterModel::all();
    //     $i = 1;
    //     $output="";
    //     $output.="<table id='table'>
                
    //     <tr>
    //         <th>STT</th>
    //         <th>Iconls</th>
    //         <th>Tên Bộ lọc</th>
    //         <th>slug</th>
    //         <th></th>
    //         <th></th>   
    //     </tr>
    //     ";
    //    foreach ($listFilter as $item) {
      
    //     $output.='<tr>
    //             <td>'.$i++.'</td>
    //             <td></td>
    //             <td>'.$item->filter_name.'</td>
    //             <td>'.$item->slug.'</td>
    //             <td><a class="btn-edit" data-name="edit-product" data-id="'.$item->filter_id.'">Chỉnh sửa</a></td>
    //             <td><a  class="btn-delete">Xoá</a></td>
    //         </tr>';
    //    }
   
    //     $output.= "</table>";
        return response()->json([
            'status' => 200,
            'data' => $listFilter
        ]);
        
    }
}
