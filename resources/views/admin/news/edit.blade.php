@extends('layouts.admin')
@section('title') Редактировать новость -  @parent @stop
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Редактировать новость</h1>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Редактировать новость</li>
            </ol>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <div>
                <form method="post" action="{{ route('admin.news.update', ['news' => $news])  }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="category">Категория</label>
                        <select class="form-control" name="category_id" id="category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @if($news->category_id === $category->id) selected @endif>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
                    </div><br>
                    <div class="form-group">
                        <label for="image">Изображение</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div><br>
                    <div class="form-group">
                        <label for="status">Статус</label>
                        <select class="form-control" name="status" id="status">
                            <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                            <option @if($news->status === 'PUBLISHED') selected @endif>PUBLISHED</option>
                            <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea class="form-control" id="description" name="description">{!! $news->description !!}</textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <br>
                </form><br>
            </div>
        </div>
@endsection