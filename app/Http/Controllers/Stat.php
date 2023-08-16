<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Stat extends Controller
{
    public function uploaderB64(){
        $img = request()->file('file')->store('up');
        return response()->json([
            'location' => str_replace('../up/', '/up/', asset($img))
        ]);
    }

}
