<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{

    public function upload(Request $request)
    {
        return response()->json(['code' => 1]);
    }

}
