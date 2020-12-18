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
                        <div style="width: 100%; height: 50px">
                    <a href="category/{{$newsCtegory['slug']}}"  style="font-size: 18px; display: block; text-align: center" >{{$newsCtegory['title']}}</a>
                        </div>
                    @endforeach

            </div>
        </div>
    </div>
</div>


@endsection


