<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Rating;
use Session;
use Purifier;
use Image;
use Storage;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('users')->orderBy('id', 'desc')->paginate(10);
        return view('admin_posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_posts.create');
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

        return redirect()->route('admin_posts.show', $post->id);
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
        return view('admin_posts.show')->withPost($post);
    }

    /** star rating system */
    public function postStar (Request $request, Post $post) {
        

        $rating = new Rating;
        $rating->user_id = auth()->user()->id;
        $rating->rating = $request->input('star');
        $post->ratings()->save($rating);
        return redirect()->back();
  }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //naći u bazi
        $post = Post::find($id);
        $users = User::all();

        return view('admin_posts.edit')->withPost($post);
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
        //validacija kao kod store
        $post = Post::find($id);
        
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug, $id",
            'ingridients' => 'required',
            'body' => 'required',
            'featured_image' => 'image'
        ));
    
        //kako da ponovo spremimo taj edit u bazu
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->ingridients = Purifier::clean($request->input('ingridients'));
        $post->body = Purifier::clean($request->input('body'));
        $post->user_id = auth()->user()->id;

        if($request->hasFile('featured_image')) {
            //dodat novu sliku
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location); 
            $oldFilename = $post->image;
            //update bazu
            $post->image = $filename;
            //delete staru sliku
            Storage::delete($oldFilename);
        }

        $post->save();
        //set sa flash
        Session::flash('success', 'This recipe is successfully saved!');
        //redirect sa flash
        return redirect()->route('admin_posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        Storage::delete($post->image);

        $post->delete();
        
        Session::flash('success', 'The recipe was successfully deleted!');
        return redirect()->route('admin_posts.index');
    }
}
