<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Validator;

class PostController extends Controller
{
    public function index()
    {
        return view("posts");
        # code...
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "body" => 'required',
            "title" => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([

                "errors" => $validator->errors()->all()
            ]);

        }
        $post = Post::create([
            "title" => $request->title,
            "body" => $request->body,

        ]);

        return response()->json([
            "success" => $post,
        ]);
    }
}





