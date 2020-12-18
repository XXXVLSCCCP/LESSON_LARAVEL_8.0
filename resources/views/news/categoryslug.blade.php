@extends('layouts.app')
@section('title')

    @parent -Новости первой категории

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Главная</div>


                    @foreach ($news as $newsCtegory)
                    <figure class="figure">
                        <h4>{{$newsCtegory['title']}}</h4>
                        <img src="{{$newsCtegory['image']}}" style="float: left; padding: 10px; margin: 0; width: 100px" class="figure-img img-fluid rounded" alt="Фото">
                        <figcaption style="text-overflow: clip; overflow: hidden; height: 160px" class="figure-caption">{{$newsCtegory['text']}}
                        </figcaption>


                    </figure>
                    <a style="float: right" href="/news/{{$newsCtegory['id']}}">Подробнее.....</a>

                    <hr>

                @endforeach

            </div>
        </div>
    </div>
</div>


@endsection


