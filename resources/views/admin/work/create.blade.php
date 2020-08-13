@extends('layouts.work')
@section('title', '職務経歴作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>職務経歴作成</h2>
                <form action="{{ action('Admin\WorkController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">職歴・会社名</label>
                        <div class="col-md-10">
                            <input type="name" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">詳細</label>
                        <div class="col-md-10">
                            <input type="description" class="form-control" name="name" value="{{ old('description') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="file">参考資料</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection