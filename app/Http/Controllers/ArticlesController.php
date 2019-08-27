<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check())
        {
            $user = Auth::user();

            $reViewIds = Redis::zrevrange("user.{$user->id}.reView", 0, 2);

            $reView = collect($reViewIds)->map(function ($id){
                return Article::find($id);
            });
        }

        $articles = Article::paginate(5);

        return view('articles.index', compact('articles', 'reView'));
    }

    public function rank()
    {
        if (Auth::check()) {

            $user = Auth::user();

            $rankIds = Redis::zrevrange("user.{$user->id}.rank", 0, 2);

            $rank = collect($rankIds)->map(function ($id) {
                return Article::find($id);
            });
        }

        $articles = Article::paginate(5);

        return view('articles.rank', compact('articles', 'rank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        if (Auth::check()) {

            $user = Auth::user();

            Redis::zadd("user.{$user->id}.reView", time(), $article->id);

            Redis::zincrby("user.{$user->id}.rank", 1, $article->id);
        }

        return view('articles.show', compact('article'));
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
        //
    }

    /**
     * Favorite a particular post
     *
     * @param  Post $post
     * @return Response
     */
    public function favoritePost(Article $article)
    {
        Auth::user()->favorites()->attach($article->id);

        return back();
    }

    /**
     * Unfavorite a particular post
     *
     * @param  Post $post
     * @return Response
     */
    public function unFavoritePost(Article $article)
    {
        Auth::user()->favorites()->detach($article->id);

        return back();
    }
}
