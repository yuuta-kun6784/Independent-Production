@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧画面</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/itemAdd') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>詳細</th>
                                <th>操作</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>
                                        @foreach( $types as $type)
                                            @if($value->type_id == $type->id)
                                                {{ $type->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $value->detail }}</td>
                                    <td><a href="items/itemEdit/{{$value->id}}">編集</a></td>
                                    <td>
                                        <form action="{{  url('items/itemDelete')  }}" method="POST"
                                            onsubmit="return confirm('削除します。よろしいですか？');">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $value->id }}">
                                            <input type="submit" value="削除" class="btn btn-danger">
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
