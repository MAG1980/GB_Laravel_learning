<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsSourceRequest;
use App\Models\NewsSource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\View\View
     */
    public function index(): View
    {
        //Получаю все строки из таблицы, отсортированные по дате изменения в обратном порядке
        $newsSources = NewsSource::orderBy('updated_at', 'desc')->get();

        return view('admin.news_source.index', ['newsSources' => $newsSources]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Illuminate\View\View
     */
    public function create(): View
    {
        $newsSource = new NewsSource();
        return view('admin.news_source.create', ['newsSource' => $newsSource]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreNewsSourceRequest $request
     * @param  NewsSource $newsSource
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(StoreNewsSourceRequest $request, NewsSource $newsSource): RedirectResponse
    {
        $newsSource->fill($request->validated());
        $newsSource->save();
        $newsSources = NewsSource::orderBy('updated_at', 'desc')->get();
        return redirect()->route('admin.news_source.index', [
            'newsSources' => $newsSources,
            'success' => 'Источник новостей успешно добавлен!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  NewsSource  $newsSource
     * @return Illuminate\View\View
     */
    public function edit(NewsSource $newsSource): View
    {
        dump($newsSource);
        return view('admin.news_source.create')
            ->with('newsSource', $newsSource);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreNewsSourceRequest $request
     * @param  NewsSource $newsSource
     * @return Illuminate\Http\RedirectResponse
     */
    public function update(StoreNewsSourceRequest $request, NewsSource $newsSource):RedirectResponse
    {
        $newsSource->fill($request->validated());
        $newsSource->save();

        return redirect()->route('admin.news_source.index', ['success', 'Источник новостей изменён успешно!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  NewsSource $newsSource
     * @return RedirectResponse
     */
    public function destroy(NewsSource $newsSource):RedirectResponse
    {
        $newsSource->delete();
        return redirect()->route('admin.news_source.index', [
            'success', 'Источник новостей удалён успешно!'
        ]);
    }
}
