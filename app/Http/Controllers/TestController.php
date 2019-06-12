<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    protected $ftp;
    public function __construct()
    {
        $this->ftp = ftpClient();
    }

    public function test(Request $request)
    {




        dd(trans('messages.test'));
    }
}
