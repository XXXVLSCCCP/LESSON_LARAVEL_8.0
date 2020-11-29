@extends('layouts.app')
@section('title')

    @parent -{{$title}}

@endsection
@section('content');
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$title}}</div>

                <div class="card-body">

                    @if(@empty($news))

                        Новостей нет


                        @else

                        @forelse($news as $item)

                            @if(!$item['is_private'])

                            <ul>
                                <li><a href="/news/{{$item['id']}}">{{$item['title']}}</a></li>
                            </ul>

                            @endif

                        @empty

                            Новостей нет

                        @endforelse
                        @endif



                        <ul>

                       <li><a href="/news/category/1">Новости относящие к первой категории</a></li>
                       <li><a href="/news/category/2">Новости относящие ко второй категории</a></li>

                        </ul>


                        <ul>

                        <li><a href="/news/category/sport">Новости относящие к спорту</a></li>
                        <li><a href="/news/category/games">Новости относящие играм</a></li>
                        <li><a href="/news/category/programming">Новости относящие программирвоанию</a></li>
                        <li><a href="/news/category/sity">Новости относящие к городу</a></li>

                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

