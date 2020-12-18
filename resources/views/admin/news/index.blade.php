@extends('admin.layouts.app')

@section('content');
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавить новость</div>

                <div class="card-body">

                    @if(session()->has('errors1'))
                        @foreach(session()->get('errors1') as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>

                        @endforeach
                    @endif

                    <form method="POST" action="{{route ('admin.news.add')}}" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Заголовок" name="title" value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="category_id" id="">


                                @if(!empty($errors))

                                    <div class="alert alert-danger"></div>

                                @endif

                                @foreach($categories as $category)

                                    <option value="{{$category['id']}}" @if(old('category_id')== $category['id']) selected @endif>{{$category['title']}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="text">{{old('text')}}</textarea>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Приватная</label>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="file" name="image" value="Картинка">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="submit" value="Отправить">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


