@extends('adminlte::page')

@section('title', '商品編集・削除')

@section('content_header')
    <h1>商品登録</h1>
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

<body>
    <div style="width: 500px; margin: 100px auto;">
        <h1 class="text-center" style="margin-bottom: 50px;">商品編集画面 (登録者:{{$users->name}})</h1>
        <form action="{{ url('items/itemEdit/' . $items->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">名前</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$items->name}}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">種別(ドロップダウン)</label>
                    <select class="form-select" id="type" name="type">
                        @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">詳細</label>
                <input type="text" class="form-control" id="detail" name="detail" value="{{$items->detail}}">
            </div>

            <div class="d-grid gap-2 col-3 mx-auto" style="margin: 10px;">
            <button class="btn btn-secondary" type="submit">編集</button>
            </div>
        </form>

    </div>
</body>


@stop