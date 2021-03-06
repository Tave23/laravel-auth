<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // per prendere i dati dello user
        $loggedUser = Auth::user();

        $posts = Post::orderBy('id','desc')->paginate(5);

        return view('admin.posts.index', compact('posts', 'loggedUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title_post' => 'required|min:2|max:255',
                'content' => 'required|min:5'
            ],
            [
                'title_post.required' => "Inserire un titolo",
                'title_post.min' => "Inserire almeno :min caratteri",
                'title_post.max' => "Inserire meno di :max caratteri",
                'content.required' => "Inserire il contenuto del post",
                'content.min' => "Inserire almeno :min caratteri"
            ]
        );

        $created_post = $request->all();
        // dd($created_post);
        $new_post = new Post();

        // vado a riempire $new_post
        $new_post->fill($created_post);

        // aggiungo lo slug usando la funzione 
        $new_post->slug = Post::createSlug($new_post->title_post);

        // salvo
        $new_post->save();

        // redirect a show
        return redirect()->route('admin.posts.show', $new_post);

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

        if ($post) {
            return view('admin.posts.show', compact('post'));
        }

        abort(404, 'Post non presente nel database');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if ($post) {
            return view('admin.posts.edit', compact('post'));
        }

        abort(404, 'Post non presente nel database');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'title_post' => 'required|min:2|max:255',
                'content' => 'required|min:5'
            ],
            [
                'title_post.required' => "Inserire un titolo",
                'title_post.min' => "Inserire almeno :min caratteri",
                'title_post.max' => "Inserire meno di :max caratteri",
                'content.required' => "Inserire il contenuto del post",
                'content.min' => "Inserire almeno :min caratteri"
            ]
        );

        $edit_data = $request->all();

        if ($edit_data['title_post'] != $post->title_post) {
            $edit_data['slug'] = Post::createSlug($edit_data['title_post']);
        }

        $post->update($edit_data);

        return redirect()->route('admin.posts.index', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted_post', "Il post: $post->title_post ?? stato eliminato.");
    }
}
