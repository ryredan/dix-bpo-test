<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $news = $user->news()->get();
        return view('news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.editor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'headline' => ['required'],
            'subhead' => ['required'],
            'news_content' => ['required']
        ]);
        $news = new News();
        $news->user_id = Auth::user()->id;
        $news->headline = $validated['headline'];
        $news->subhead = $validated['subhead'];
        $news->content = $validated['news_content'];
        if($news->save())
        {
            return redirect(route('news.index'))->with('status', __('News published successfully'));
        }
        return redirect(route('news.index'))->withError(__('Publish fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news.show', ['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news.editor')->with('news', $news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validation = $request->validate([
            'headline' => ['required'],
            'subhead' => ['required'],
            'content' => ['required'],
        ]);

        $news->update([
            'headline' => $validation['headline'],
            'subhead' => $validation['subhead'],
            'content' => $validation['content'],
        ]);

        return redirect()->back()->with('status', __('User updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->back();
        
    }

    public function search(Request $req)
    {
        $news = News::where('headline', 'like', '%'. $req->query('search_news'). '%')
            ->where('user_id', Auth::user()->id)
            ->get();
            
        return view('news.search', ['news' => $news]);
    }
}
