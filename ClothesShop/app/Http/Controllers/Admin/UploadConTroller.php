<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Common\UploadFilesService;
use Illuminate\Http\Request;
class UploadConTroller extends Controller
{
    protected $uploadFilesService;
    public function __construct() {
        $this->uploadFilesService = new UploadFilesService();
    }
    public function store(Request $request)
    {
        $url = $this->uploadFilesService->store($request);

        if($url!=false){
            return response()->json([
                'error'=>false,
                'url'=> $url,
            ]);
        }
        return response()->json([
            'error'=>true,
        ]) ;
    }
}
