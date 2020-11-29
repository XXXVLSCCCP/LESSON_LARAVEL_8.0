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

                <div class="card-body">
                    @foreach($news as $item)
                      <h7>{{$item['title']}}</h7>
                        <p>{{$item['text']}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
