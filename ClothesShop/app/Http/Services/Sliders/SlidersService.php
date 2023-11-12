<?php
namespace App\Http\Services\Sliders;
use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;// tên đường dẫn của file này
use Illuminate\Support\Facades\Storage;

class SlidersService{
    public function getSlider(){
        $sliders = Slider::orderByDesc('id')->paginate(10);
        return $sliders;
        }
    public function show(){
        return Slider::where('active',1)->orderByDesc('id')->get();
    }

    public function insert($request){
        try {
            //code...
            Slider::create($request->input());
            Session::flash('success','Thêm Slider Thành công');
        } catch (\Exception $error) {
            Session::flash("error", 'Lỗi thêm slider');
            Log::info($error->getMessage());
            return false;
        }
        return true;

    }
    public function update($request,$slider){
        try {
            //code...
            $thumb=$slider->thumb;
            $path = str_replace('storage','public',$thumb);
            $slider->fill($request->input());
            $slider->save();
            if($thumb!=$request->input('thumb')){
                Storage::delete($path);
            }

            Session::flash('success','Chỉnh sửa slider thành công ');
        } catch (\Exception $error) {
            Session::flash('error', 'chỉnh sửa slider bị lỗi');
            Log::info($error->getMessage());
            return false;
        }
        return true;
    }
    public function delete($sliderID){
       $slider = Slider::where('id',$sliderID)->first();// kiểm tra có hay không ?
       if($slider){
        $path = str_replace('storage','public',$slider->thumb);
        $slider->delete();
        Storage::delete($path);
        return true;
       }
       return false;

    }
 }
