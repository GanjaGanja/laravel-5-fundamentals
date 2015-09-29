<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Show all articles.
     * 
     * @return Response
     */
    public function index()
    {
    	$articles = Article::latest('published_at')->published()->get();

    	return view('articles.index', compact('articles'));
    }


    /**
     * Show a single article.
     * 
     * @param  Article $article
     * @return Response
     */
    public function show(Article $article)
    {
    	return view('articles.show', compact('article'));
    }


    /**
     * Show the page to create a new article.
     * 
     * @return Response
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');

    	return view('articles.create', compact('tags'));
    }


    /**
     * Save a new article.
     *
     * @param CreateArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        $article = \Auth::user()->articles()->create($request->all());

        $article->tags()->attach($request->input('tag_list'));

        // Option 1: overlay flash messages
        flash()->overlay('Your article has been successfully created!', 'Good job');

        // Option 2: simple flash messages
        // flash()->success('Your article has been successfully created!');        

        return redirect('articles');
    }


    /**
     * Edit an existing article.
     * 
     * @param  Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }


    /**
     * Update an article
     * 
     * @param  Article         $article      
     * @param  ArticleRequest  $request 
     * @return Response                  
     */
    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        return redirect('articles');
    }

}
