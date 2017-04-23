<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Tag;
use App\Transformers\TagTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->responseWithCollection(Tag::all(), new TagTransformer());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取 tag 数组
        $tag = $request->get('tag');
        // 验证 tag 是否完整
        $validator = Validator::make($tag, [
            'name' => 'required'
        ]);
        // 不完整返回错误信息
        if ($validator->fails()) {
            return $this->responseWithArray([
                'status' => -1,
                'errors' => $validator->errors()->all()
            ]);
        }

        $model = Tag::create($tag);
        if ($model instanceof Model) {
            // 新建成功
            return $this->responseWithSuccessMsg();
        }

        return $this->responseWithErrorMsg();



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $tag = Tag::whereId($id)->first();
        return $this->responseWithData($tag, new TagTransformer());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /**
        [2017-04-21 20:08:54] local.DEBUG: array (
        'id' => 2,
        'fid' => 0,
        'name' => '技术',
        'description' => 'technology',
        'thumbnail' => 'http://ocehld7p7.bkt.clouddn.com/20170421200852-QQ20170421-2@2x.png?imageView2/0/w/350',
        'created_at' => '2017-04-19 07:32:39',
        'updated_at' => '2017-04-20 15:26:34',
        )
        )
         * )
         */
        $res = Tag::whereId($id)->first()->update($request['tag']);
        if ($res) {
            return $this->responseWithSuccessMsg();
        }

        return $this->responseWithErrorMsg();

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tag = Tag::find($id);

        if ($tag->posts()->count() == 0) {
            if (Tag::destroy($id) > 0) {
                return $this->responseWithSuccessMsg('删除成功');
            } else {
                return $this->responseWithSuccessMsg('删除失败');
            }
        } else {
            return $this->responseWithErrorMsg('分类下仍有文章，不能删除!');
        }


    }
}
