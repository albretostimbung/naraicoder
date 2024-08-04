<?php

namespace App\Http\Controllers\Article;

use Exception;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->get();

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                if (!$request->hasFile('image')) {
                    Article::create($request->validated() + [
                        'user_id' => auth()->user()->id,
                        'slug' => Str::slug($request->title),
                    ]);

                    return;
                }

                $imagePath = $request->file('image')->store('article_images', 'public');

                Article::create(array_merge($request->validated(), [
                    'image' => $imagePath,
                    'user_id' => auth()->user()->id,
                    'slug' => Str::slug($request->title),
                ]));
            });

            return redirect()->route('admin.articles.index');
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        try {
            DB::transaction(function () use ($request, $article) {
                if (!$request->hasFile('image')) {
                    $article->update($request->validated() + [
                        'user_id' => auth()->user()->id,
                        'slug' => Str::slug($request->title),
                    ]);

                    return;
                }

                if (file_exists(storage_path('app/public/' . $article->image))) {
                    unlink(storage_path('app/public/' . $article->image));
                }

                $imagePath = $request->file('image')->store('article_images', 'public');

                $article->update(array_merge($request->validated(), [
                    'image' => $imagePath,
                    'user_id' => auth()->user()->id,
                    'slug' => Str::slug($request->title),
                ]));
            });

            return redirect()->route('admin.articles.index');
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.articles.index');
    }
}
