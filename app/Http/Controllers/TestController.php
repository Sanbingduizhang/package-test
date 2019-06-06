<?php

namespace App\Http\Controllers;

use Anchu\Ftp\Ftp;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TestController extends Controller
{

    protected $ftp;
    public function __construct(Ftp $ftp)
    {
        $this->ftp = $ftp;
    }

    public function test(Request $request)
    {
        $ftp = new Ftp(array(
            'host'   => '10.10.10.111',
            'port'  => 21,
            'username' => 'yijiaof',
            'password'   => 'yijiaof',
            'passive'   => false,
        ));
        $dirs = $ftp->getDirListing();
        dd($dirs);

        $dirs = $this->ftp->connect(array(
            'host'   => '10.10.10.111',
            'port'  => 21,
            'username' => 'yijiaof',
            'password'   => 'yijiaof',
            'passive'   => false,
        ));
//        $dirs = \Anchu\Ftp\Facades\Ftp::getDirListing();

        dd($dirs);
//        $headerFile = $request->file('file', '');
//        $img = Image::make($headerFile)->resize(300, null, function ($constraint) {
//            $constraint->aspectRatio();
//        })->save('aa.jpg');
//        dd($img);


        dd(trans('messages.test'));
    }
}
