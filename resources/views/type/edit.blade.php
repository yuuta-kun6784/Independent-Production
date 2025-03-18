@extends('adminlte::page')

@section('title', '種別編集・削除')

@section('content_header')
    <h1>種別編集</h1>
@stop

@section('content')
<div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    <div style="width: 500px; margin: 100px auto;">
        <h1 class="text-center" style="margin-bottom: 50px;">種別編集画面</h1>
        <form action="{{ url('types/typeEdit/' . $types->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">名前</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$types->name}}">
            </div>

            <div class="d-grid gap-2 col-3 mx-auto" style="margin: 10px;">
            <button class="btn btn-secondary" type="submit">編集</button>
            </div>
        </form>

    </div>

</div>
@stop

@section('css')
@stop

@section('js')
@stop
