<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function __construct() {
        $this->middleware('auth.jwt')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $Articles= Article::with('category')->get();
        return ArticleResource::collection($Articles);
        return $articles= Article::paginate(10);
        // return ArticleResource::collection($articles);

    

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
        $article = new Article();
        $article->title = $request->input('title');
        // or   $article->title = $request->title;
        $article->content = $request->input('content');
        $article->user_id = $request->input('user_id');
        $article->category_id = $request->input('category_id');
        $article->save();
        return $article ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        return new ArticleResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
        // or $article = Article::find($id);
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->save();
        return $article ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy( Article $article)
    {
        //
        // $article = Article::find($id);
        // $article->delete();
        // or
        $article->delete();
        return 'deleted' ;
    }
}
