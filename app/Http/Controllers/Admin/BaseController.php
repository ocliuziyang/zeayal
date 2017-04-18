<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{


    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth.admin');
    }
}
