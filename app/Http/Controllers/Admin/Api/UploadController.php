<?php

namespace App\Http\Controllers\Admin\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use zgldh\QiniuStorage\QiniuStorage;
class UploadController extends ApiController
{
    //
    public function upload(Request $request)
    {

        if ($request->file('thumbnail')->getError() > 0) {
            \Log::debug($request->file('thumbnail')->getError());
            \Log::debug($request->file('thumbnail')->getErrorMessage());
            return $this->responseWithErrorMsg('上传失败'.$request->file('thumbnail')->getError().'个错误'.'
            '.$request->file('thumbnail')->getErrorMessage());
        } else {
             \Log::debug('文件符合规定,可以上传');
            $disk = QiniuStorage::disk('qiniu');
            $res = false;
            $file = $request->file('thumbnail');
            if ($request->hasFile('thumbnail')) {
                $now = Carbon::now();
                $timeStr = $now->format('YmdHis');
                $name = $timeStr.'-'.$file->getClientOriginalName();
                $content = file_get_contents($file->getRealPath());
                $res = $disk->put($name, $content);
            }
            if ($res) {
                $url = $disk->downloadUrl($name);
//                $url = $disk->imagePreviewUrl($name, 'imageView2/0/w/350');
                return $this->responseWithSuccessMsg($url);
            }
            return $this->responseWithErrorMsg('上传失败');
        }



    }
}
