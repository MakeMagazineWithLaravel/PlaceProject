@extends('layouts.admin')

@section('content')

    <div class="container" id="body">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Comments
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Accept</th>

                                    <th style="width: 350px">Comment</th>

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
                                            <a title="Неактивный"   href="{{ route('admin.comment.accept',$comment->id) }}">
                                                <span class="fa fa-square-o" style="margin-left: 20px; margin-top: 20px; "></span>
                                            </a>
                                        @else
                                            <a title="Активный" href="{{ route('admin.comment.accept',$comment->id) }}">
                                                <span class="fa fa-check-square-o" style="margin-left: 20px; margin-top: 20px; "></span>
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
                </div>

            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="/js/vue.js"></script>
    <script src="/js/main_vue.js"></script>
@endsection