<?php

namespace App\Http\Services\Common;

class UploadFilesService {
    public function store($request){
        try {


            if($request->hasFile('file')){ // nếu request tồn tại file
                $request->validate(['file'=>'required|mimes:jpg,png,jpeg|max:10000']);
                $name = $request->file('file')->getClientOriginalName();
                $fullname = 'image_'.date("H_i_s").'.'.$request->file('file')->extension();
                $pathFull = 'uploads/'.date("Y/m/d");
                $path = $request->file('file')
                ->storeAs('public/'.$pathFull,$name); // upload file vào trong thư mục
                return '/storage/'.$pathFull.'/'.$name;
            }
        }
        catch(\Exception $error){
            return false;
        }

    }
}
