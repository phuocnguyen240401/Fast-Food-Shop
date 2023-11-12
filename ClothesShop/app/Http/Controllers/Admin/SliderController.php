<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Sliders\SlidersService;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $sliderService;
    public function __construct(SlidersService $slidersService){
        $this->sliderService = $slidersService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.sliders.list',[
            'title'=> 'Danh sách slider mới nhất',
            'sliders'=>$this->sliderService->getSlider(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.add',[
            'title'=> 'Thêm Slider',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'thumb'=> 'required',
            'url'=> 'required',
        ]);
        $result = $this->sliderService->insert($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
        return view('admin.sliders.edit',[
            'title'=>'Chỉnh sửa slider',
            'slider'=> $slider,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $result = $this->sliderService->update($request, $slider);
        if($result){
        return redirect('admin/sliders/list');
        }
        else{
            redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sliderId)
    {
       //
       $result = $this->sliderService->delete($sliderId);
       if($result){
        return response()->json([
            'error'=> false,
            'message'=> 'Xóa slider thành công',

        ]);

    }
    else{
        return response()->json([
            'error'=> true,
        ]);
    }
    }
}
