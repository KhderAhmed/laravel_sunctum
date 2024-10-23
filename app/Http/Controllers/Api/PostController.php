<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Post::paginate(5);
        return response()->json([
            "status" => 1,
            "message" => "Posts Fetched Successfully",
            "data" => $posts,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "body" => 'required',
            "title" => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => 0,
                "message" => "Validation Errors",
                "data" => $validator->errors()->all()
            ]);
        }
        $post = Post::create([
            "title" => $request->title,
            "body" => $request->body,

        ]);


        return response()->json([
            "status" => 1,
            "message" => "Post Created Successfully",
            "data" => $post,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $post = Post::find($id);

        return response()->json([
            "status" => 1,
            "message" => "Post show Successfully",
            "data" => $post,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            "body" => 'required',
            "title" => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => 0,
                "message" => "Validation Errors",
                "data" => $validator->errors()->all()
            ]);
        }

        $post = Post::find($id);

        $post->Update([
            "title" => $request->title,
            "body" => $request->body,

        ]);


        return response()->json([
            "status" => 1,
            "message" => "Post Updated Successfully",
            "data" => $post,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {

        $post = Post::find($id);

        $post->delete();

        return response()->json([
            "status" => 1,
            "message" => "Post Deleted Successfully",
            "data" => $post,
        ]);
    }
}
