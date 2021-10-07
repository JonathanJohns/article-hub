<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Post;
use App\Favourite;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::id();
        $posts = Post::where('user_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('dashboard.index')->with('articles', $posts);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string',],
      
            ]);

        $title = $request->title;
        $description =  $request->description;
        $user = Auth::id();


        $article = new Post;
        $article->title = $title;
        $article->description = $description;
        $article->user_id = $user;


        if ($article->save()) {
            return redirect('/home')->with('message');
        }

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

        $post = Post::find($id);

        $user = User::find(Auth::id());

        Gate::authorize('edit', $post);

        return view('dashboard.edit')->with('article', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $article)
    {
        //

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string',],
      
            ]);

        $title = $request->title;
        $description =  $request->description;
        $user = Auth::id();

        $article = Post::find($article);

        Gate::authorize('update',$article);
        $article->title = $title;
        $article->description = $description;
        $article->user_id = $user;


        if ($article->save()) {
            return redirect('/home')->with('message', 'Article Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $user = Auth::id();

        Gate::authorize('update', $post);
        $post->delete();

        return redirect('/home')->with('message', 'Article Deleted');
    }
}
