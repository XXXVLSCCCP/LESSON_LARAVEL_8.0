@extends('layouts.app')
@section('title')

    @parent -Новости

@endsection
@section('content');
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Главная</div>

                <div class="card-body" style="display: flex; flex-direction: column; flex-wrap: wrap;">
                    @foreach($news as $item)

                        @if(!$item['image'])
                            <img src="http://placehold.it/300x300" style="float: left; padding: 10px; margin: 0; width: 300px" class="figure-img img-fluid rounded" alt="Фото">

                        @else

                            <img src="{{$item['image']}}" style="float: left; padding: 10px; margin: 0; width: 300px" class="figure-img img-fluid rounded" alt="Фото">

                        @endif

                        <h5 style="float: left" >{{$item['title']}}</h5>
                        <p style="float: left" >{{$item['text']}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
