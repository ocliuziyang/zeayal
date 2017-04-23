<?php

namespace App\Presenters;

use Carbon\Carbon;

interface DateFormatPresentInterface {

    public function showDateFormat(Carbon $date) : string;
    
}