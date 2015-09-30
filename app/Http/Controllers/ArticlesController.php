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
    /**
     * Create a new articles controller instance.
     */
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
     * @param ArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        $this->createArticle($request);

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
     * @param  ArticleRequest  $request 
     * @param  Article         $article      
     * @return Response                  
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');
    }


    /**
     * Sync up the list of tags in the database.
     * 
     * @param  Article        $article 
     * @param  array          $tags 
     */
    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }


    /**
     * Save a new article.
     * 
     * @param  ArticleRequest $request 
     * @return mixed
     */
    private function createArticle(ArticleRequest $request)
    {
        $article = \Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }

}
