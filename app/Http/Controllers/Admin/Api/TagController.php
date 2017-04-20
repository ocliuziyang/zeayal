<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Tag;
use App\Transformers\TagTransformer;
use Illuminate\Http\Request;

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
        //
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
         *[2017-04-20 11:33:29] local.INFO: 1
         * [2017-04-20 11:33:29] local.INFO: array (
         * '_method' => 'put',
         * 'tag' =>
         * array (
         * 'id' => 1,
         * 'fid' => 0,
         * 'name' => '人世间',
         * 'description' => '世间事，人世间。',
         * 'thumbnail' => '/images/tag_default.gif',
         * 'created_at' => '2017-04-19 07:32:39',
         * 'updated_at' => '2017-04-19 07:32:39',
         * ),
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
    }
}
