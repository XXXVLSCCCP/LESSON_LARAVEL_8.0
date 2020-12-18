@extends('admin.layouts.app')

@section('content');
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавить новость</div>

                <div class="card-body">
                    <a href="/admin/news/add" style="margin: 30px; " class="btn btn-success">Добавить новость</a>

                    @if(@empty($news))

                        Новостей нет


                    @else

                        @forelse($news as $item)

                            @if(!$item['is_private'])

                                <figure class="figure" style="display: block">
                                    <h4>{{$item['title']}}</h4>
                                    @if(!$item['image'])
                                        <img src="http://placehold.it/100x100" style="float: left; padding: 10px; margin: 0" class="figure-img img-fluid rounded" alt="Фото">

                                    @else

                                        <img src="{{$item['image']}}" style="float: left; padding: 10px; margin: 0" class="figure-img img-fluid rounded" alt="Фото">

                                    @endif
                                    <figcaption style="text-overflow: clip; overflow: hidden; height: 160px" class="figure-caption">{{$item['text']}}
                                    </figcaption>


                                </figure>
                            <div style="display: inline-block">
                                <a type="button" class="btn btn-primary">Редактировать</a>
                                <a href="/admin/news/delete/{{$item['id']}}" class="btn btn-danger">Удалить</a>
                                <a style=" margin-left: 50px" href="/news/{{$item['id']}}">Подробнее.....</a>

                                <hr>

                            </div>

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


