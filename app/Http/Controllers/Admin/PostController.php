<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('backend.admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts',

            'image'=>'required|mimes:jpg,png,bmp,jpeg',
            'description' => 'required',
//            'section' => 'required',
//            'type' => 'required',
//            'url' => 'required',
//            'publish' => 'required',
        ]);


        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->url = $request->url;

        if($request->publish)
        {
            $post->publish = true;
        }else {
            $post->publish = false;
        }

        if($request->section)
        {
            $post->section = true;
        }else {
            $post->section = false;
        }
        if($request->type)
        {
            $post->type = true;
        }else {
            $post->type = false;
        }
        $post->description = $request->description;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //resize image
            $proImage = Image::make($image)->resize(818, 461)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/post/' . $imagename, $proImage);
        }else {
            $imagename = "default.png";
        }
        $post->image = $imagename;
        $post->save();

        Toastr::success('Post Created Successfully', 'Success');
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        //delete old image.....
        if(Storage::disk('public')->exists('uploads/post/'.$post->image))
        {
            Storage::disk('public')->delete('uploads/post/'.$post->image);
        }
        $post->delete();
        Toastr::success('Post Deleted Successfully', 'Success');

        return redirect()->route('admin.post.index');

    }
}
