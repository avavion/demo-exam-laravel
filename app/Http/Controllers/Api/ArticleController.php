<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Helper for get Auth User
     *
     * @return Authenticatable|null
     */
    public function getUser(): ?Authenticatable
    {
        return Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ArticleResource::collection(Article::query()->orderByDesc('created_at')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return ArticleResource
     */
    public function store(ArticleRequest $request): ArticleResource
    {
        $validated = $request->validated();

        /** @var Article $article */
        $article = $this->getUser()->articles()->create($validated);

        $article->upload_image($request->file('image_file'));

        return ArticleResource::make($article);
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return ArticleResource
     */
    public function show(Article $article): ArticleResource
    {
        return ArticleResource::make($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return ArticleResource
     */
    public function destroy(Article $article): ArticleResource
    {
        $article->delete();

        return ArticleResource::make($article);
    }
}
