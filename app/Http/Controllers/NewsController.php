<?php

namespace App\Http\Controllers;

use App\models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {

        $news = News::getNews();


        return view('news.index', ['title' => 'Cписок новостей', 'news' => $news,]);

    }

    public function show($id)
    {
        $news = News::getNewsById($id);


        return view('news.show', ['title' => 'Cписок новостей', 'news' => $news,]);

    }

    public function comments($id, $comment)
    {
        return view('news.show');

    }

    public function category($category_id)
    {

        $news = News::getNewsByCategoryId($category_id);

        return view('news.category', ['news' => $news]);

    }

    public function categorySlug($slug)
    {

        $news = News::getNewsByCategorySlug($slug);


        return view('news.categoryslug', ['news' => $news]);

    }


}
