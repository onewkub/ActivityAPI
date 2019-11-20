<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\ArticleCollectionResource;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show(Article $article) : ArticleResource{
        // dd($article);
        return new ArticleResource($article);
    }
    public function index(){
        return new ArticleCollectionResource(Article::all());
    }
    public function store(Request $request)
    {
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
