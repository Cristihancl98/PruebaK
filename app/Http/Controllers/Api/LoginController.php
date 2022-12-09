<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        if($request->usuario != "" && $request->contra != ""){
            if($request->usuario == "admin" && $request->contra == "admin123"){
                return response()->json([
                    'status' => 'success',
                    'message' => '',
                ],200);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => '',
                ],200);
            }
        }else{
            return response()->json([
                'status' => 'error',
                'message' => '',
            ],200);
        }
    }
}
