<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //

    public function upload(Request $request)
    {
        //


        $random = Str::random(20);


        if ($files = $request->file('image_slide')) {
            $destinationPath = 'public/product/'; // upload path
            $profileImage = date('YmdHis').$random. "." . $files->getClientOriginalExtension();

            $files->move($destinationPath, $profileImage);
        }







        return response()->json([
            'data' => $profileImage
        ], 200);
    }
}
