<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use zgldh\QiniuStorage\QiniuStorage;
class UploadController extends ApiController
{
    //
    public function upload(Request $request)
    {
        /**
         * [2017-04-20 19:13:57] local.ALERT: array (
        'files' =>
        Illuminate\Http\UploadedFile::__set_state(array(
        'test' => false,
        'originalName' => 'QQ20170420-1@2x.png',
        'mimeType' => 'application/octet-stream',
        'size' => 0,
        'error' => 1,
        'hashName' => NULL,
        )),
        )
         */

        $disk = QiniuStorage::disk('qiniu');
        $disk->downloadUrl('file.jpg');

//        $filename = Carbon::now()->toDateTimeString().'.'.$file->getClientOriginalExtension();
//        \Log::alert($file->getClientOriginalExtension());
        $file = $request->files;
        \Log::debug($file->getClientOriginalExtension());
        return $disk->imageInfo('file.jpg');
    }
}
