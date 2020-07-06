<?php

namespace App\Http\Controllers\Frontend;



use App\Post;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FrontendController extends Controller
{

    public function index()
    {
        $post_one = Post::take(1)->get();
        $post_two = Post::skip(1)->take(10000000000)->get();
        $post_three = Post::latest()->get();
        return view('master',compact('post_one','post_two','post_three'));
    }

    public function detail($slug)
    {
        $post =Post::where('slug',$slug)->first();;
        return view('single_page',compact('post'));
    }


}
