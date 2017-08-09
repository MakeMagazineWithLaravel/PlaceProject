@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel-info">
                <div class="panel-heading">
                    Новые заведение
                </div>
                <div class="panel-body">
                    @foreach($places as $place)
                        <div class="col-md-3 col-sm-4 col-xs-4">
                            <div class="thumbnail">

                                <img src="/files/{{ $place->photo }}" class="img img-responsive">
                                <div class="caption">
                                    <h3>{{ $place->title }}</h3>
                                    <li><i>{{ $place->category->name }}</i></li>
                                        {{ $place->description }}
                                    <div class="">
                                        <b>{{ $place->created_at }}</b>
                                        <b style="float: right">{{ $place->user->name }}</b>
                                    </div>
                                </div>
                                <div class="footer">
                                    <a href="{{ route('admin.place.delete',$place->id) }}"  v-on:click="sure" type="button" class="btn btn-danger" style="float: right">Удалить</a>
                                    @if(!$place->active)
                                        <a href="{{ route('admin.place.active',$place->id) }}" type="button" class="btn btn-primary">Активировать</a>
                                    @else
                                        <a href="{{ route('admin.place.active',$place->id) }}" type="button" class="btn btn-default" >Неактивировать</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="panel-footer">
                    <a href="{{ route('admin.place.index') }}" class="btn btn-primary">Все заведении</a>
                </div>
            </div>
            <hr>
            <div class="panel-success">
                <div class="panel-heading">
                    Новые комментарии
                </div>
                <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Accept</th>

                                    <th>Comment</th>

                                    <th>User</th>

                                    <th>Place</th>

                                    <th>Rating</th>

                                    <th>Data</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>
                                            @if(!$comment->accept)
                                                <a title="Неактивный" type="button" class="btn btn-default" href="{{ route('admin.comment.accept',$comment->id) }}">
                                                    <span class="fa fa-black-tie"></span>
                                                </a>
                                            @else
                                                <a title="Активный" type="button" class="btn btn-success" href="{{ route('admin.comment.accept',$comment->id) }}">
                                                    <span class="fa fa-black-tie"></span>
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{ $comment->comment }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>
                                            {{ $comment->place->title }}<br>
                                            <li><i>{{ $comment->place->category->name }}</i></li>
                                        </td>
                                        <td>
                                            <div class="star-rating3" id="exampleInputName2">
                                                @for($i = 0; $i < $comment->q_of_food; $i++)
                                                    <span class="fa fa-star" data-rating="{{ $i+1 }}"></span>
                                                @endfor
                                                @for($i = 0; $i < 5 - $comment->q_of_food;$i++)
                                                    <span class="fa fa-star-o" data-rating="{{ $i+$comment->q_of_food+1 }}"></span>
                                                @endfor
                                            </div>
                                            <div class="star-rating3" id="exampleInputName2">
                                                @for($i = 0; $i < $comment->service_q; $i++)
                                                    <span class="fa fa-star" data-rating="{{ $i+1 }}"></span>
                                                @endfor
                                                @for($i = 0; $i < 5 - $comment->service_q;$i++)
                                                    <span class="fa fa-star-o" data-rating="{{ $i+$comment->service_q+1 }}"></span>
                                                @endfor
                                            </div>
                                            <div class="star-rating3" id="exampleInputName2">
                                                @for($i = 0; $i < $comment->interior; $i++)
                                                    <span class="fa fa-star" data-rating="{{ $i+1 }}"></span>
                                                @endfor
                                                @for($i = 0; $i < 5 - $comment->interior;$i++)
                                                    <span class="fa fa-star-o" data-rating="{{ $i+$comment->interior+1 }}"></span>
                                                @endfor
                                            </div>
                                        </td>
                                        <td>
                                            {{ $comment->created_at }}
                                        </td>
                                        <td>
                                            <a title="Удалить" href="{{ route('admin.comment.delete',$comment->id) }}" type="button" v-on:click="sure" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
                <div class="panel-footer">
                    <a href="{{ route('admin.comment.index') }}" class="btn btn-primary">Все комментарии</a>
                </div>
            </div>
        </div>
    </div>
    
@endsection