<?php

namespace App\Http\Controllers;

use App\Article;
use App\Author;
use App\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $articles = Article::with(['category', 'author'])->paginate(10);
        return view('cms.admin.articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::where('status', 'Visible')->get();
        $authors = Author::where('status', 'Active')->get();
        return view('cms.admin.articles.create', ['categories' => $categories, 'authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|min:3|max:20',
            'short_description' => 'required:string|min:10|max:100',
            'full_description' => 'required:string|min:50|max:200',
            'status' => 'string|in:Visible,InVisible',
            'category_id' => 'required|exists:categories,id|integer',
            'author_id' => 'required|exists:authors,id|integer',
        ]);

        $article = new Article();
        $article->title = $request->get('title');
        $article->short_description = $request->get('short_description');
        $article->full_description = $request->get('full_description');
        $article->image = 'IMAGE';
        $article->main_image = 'MAIN IMAGE';
        $article->status = $request->get('status');
        $article->category_id = $request->get('category_id');
        $article->author_id = $request->get('author_id');
        $isSaved = $article->save();

        if ($isSaved) {
            return response()->json(['icon' => 'success', 'title' => 'Article created successfully'], 200);
        } else {
            return response()->json(['icon' => 'success', 'title' => 'Article create failed'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        //
        $categories = Category::where('status', 'Visible')->get();
        $authors = Author::where('status', 'Active')->get();
        $article = Article::find($id);
        return view('cms.admin.articles.edit', ['article' => $article, 'categories' => $categories, 'authors' => $authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        //
        $request->request->add(['id' => $id]);
        $request->validate([
            'id' => 'required|exists:articles,id',
            'title' => 'required|string|min:3|max:20',
            'short_description' => 'required:string|min:10|max:100',
            'full_description' => 'required:string|min:50|max:200',
            'status' => 'string|in:Visible,InVisible',
            'category_id' => 'required|exists:categories,id|integer',
            'author_id' => 'required|exists:authors,id|integer',
        ]);

        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->short_description = $request->get('short_description');
        $article->full_description = $request->get('full_description');
        $article->image = 'IMAGE';
        $article->main_image = 'MAIN IMAGE';
        $article->status = $request->get('status');
        $article->category_id = $request->get('category_id');
        $article->author_id = $request->get('author_id');
        $isSaved = $article->save();

        if ($isSaved) {
            return response()->json(['icon' => 'success', 'title' => 'Article updated successfully'], 200);
        } else {
            return response()->json(['icon' => 'Failed', 'title' => 'Article update failed'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
        $isDestroyed = Article::destroy($id);
        if ($isDestroyed) {
            return response()->json([
                'icon' => 'success',
                'title' => 'Article deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => 'Article delete failed'
            ], 400);
        }
    }

    public function showCategoryArticles($categoryId)
    {
        $articles = Article::with(['category', 'author'])
            ->where('category_id', $categoryId)
            ->paginate(10);

        return view('cms.admin.articles.index', ['articles' => $articles]);
    }

    public function showAuthorArticles($authorId)
    {
        $articles = Article::with(['category', 'author'])
            ->where('author_id', $authorId)
            ->paginate(10);

        return view('cms.admin.articles.index', ['articles' => $articles]);
    }
}
