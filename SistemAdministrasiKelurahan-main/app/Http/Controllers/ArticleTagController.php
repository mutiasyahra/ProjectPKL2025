<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleTag;
use App\ArticleComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleTagController extends Controller
{
    /**
     * Display a listing of tags (dashboard).
     */
    public function index()
    {
        $tags = ArticleTag::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.manajemen_artikel.tag.tag', compact('tags'));
    }

    /**
     * Show form create tag.
     */
    public function create()
    {
        return view('dashboard.manajemen_artikel.tag.tag-tambah');
    }

    /**
     * Store new tag.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_tag' => 'required|string|unique:article_tags,name_tag',
        ]);

        ArticleTag::create([
            'name_tag' => $request->name_tag,
            'slug' => \Str::slug($request->name_tag),
            'enabled' => 1,
        ]);

        Alert::success('Berhasil', 'Tag berhasil ditambahkan');
        return redirect()->route('manajemen-artikel.tag');
    }

    /**
     * Show all articles by tag (visitor/frontend).
     */
    public function show(ArticleTag $tag)
    {
        $all_articles = Article::where('enabled', 1)->latest()->get();
        $articles = $tag->articles()->where('enabled', 1)->latest()->paginate(6);
        $count = $articles->total(); // total semua artikel di tag ini
        $article_comments = ArticleComment::take(5)->latest()->get();

        return view('visitors.artikel.index', compact(
            'all_articles',
            'articles',
            'tag',
            'count',
            'article_comments'
        ));
    }

    /**
     * Show form edit tag.
     */
    public function edit(ArticleTag $articleTag)
    {
        return view('dashboard.manajemen_artikel.tag.tag-edit', compact('articleTag'));
    }

    /**
     * Update tag.
     */
    public function update(Request $request, ArticleTag $articleTag)
    {
        $request->validate([
            'name_tag' => 'required|string|unique:article_tags,name_tag,' . $articleTag->id,
        ]);

        $articleTag->update([
            'name_tag' => $request->name_tag,
            'slug' => \Str::slug($request->name_tag),
        ]);

        Alert::success('Berhasil', 'Tag berhasil diperbarui');
        return redirect()->route('manajemen-artikel.tag');
    }

    /**
     * Delete tag.
     */
    public function destroy(ArticleTag $articleTag)
    {
        $articleTag->articles()->detach(); // lepas relasi
        $articleTag->delete();

        Alert::success('Berhasil', 'Tag berhasil dihapus');
        return redirect()->route('manajemen-artikel.tag');
    }
}