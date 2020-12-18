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

                            <figure class="figure">
                                <h4>{{$item['title']}}</h4>
                                @if(!$item['image'])
                                <img src="http://placehold.it/100x100" style="float: left; padding: 10px; margin: 0" class="figure-img img-fluid rounded" alt="Фото">

                                @else

                                    <img src="{{$item['image']}}" style="float: left; padding: 10px; margin: 0" class="figure-img img-fluid rounded" alt="Фото">

                                  @endif
                                    <figcaption style="text-overflow: clip; overflow: hidden; height: 160px" class="figure-caption">{{$item['text']}}
                                </figcaption>


                            </figure>
                                <a style="display: block" href="/news/{{$item['id']}}">Подробнее.....</a>

                                <hr>



                            @endif

                        @empty

                            Новостей нет

                        @endforelse
                        @endif




                </div>
            </div>
        </div>
    </div>
</div>
@endsection

