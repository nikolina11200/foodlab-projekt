<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Purifier;
use Image;
use App\Rating;
use DB;
//use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacija
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'ingridients' => 'required',
            'body' => 'required',
            'featured_image' => 'sometimes|image'
        ));

        //spremanje u bazu
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->ingridients = Purifier::clean($request->ingridients);
        $post->body = Purifier::clean($request->body);
        $post->user_id = auth()->user()->id;

        //spašavanje slike
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location); 
            
            $post->image = $filename;
        }

        $post->save();

        Session::flash('success', 'The recipe was succesfully saved!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    public function postStar (Request $request, Post $post) {
        

        $rating = new Rating;
        $rating->user_id = auth()->user()->id;
        $rating->rating = $request->input('star');
        $post->ratings()->save($rating);
        return redirect()->back();

        
  }

  public function avgRating ($avgRating) {
    $posts=DB::statement('UPDATE posts p
    SET p.avgRating=
        (SELECT ROUND(AVG(r.rating), 0)
        FROM ratings r
        WHERE p.id=r.rateable_id)');
        $posts = Post::all();
        
  }

}
