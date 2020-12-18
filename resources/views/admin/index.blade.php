@extends('admin.layouts.app')
@section('title')

    @parent -Главная страница

@endsection
@section('content');
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Главная Админки</div>

                <div class="card-body">
                    <a href="admin/news/edit">Редактировать новости</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
