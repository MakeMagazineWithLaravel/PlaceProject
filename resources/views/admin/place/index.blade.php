@extends('layouts.admin')

@section('content')

    <div class="container" id="body">
        <div class="row">
                @foreach($places as $place)
                    <div class="col-md-3 col-sm-4 col-xs-4">

                           <div class="thumbnail">
                            <a data-toggle="modal" data-target="#{{ $place->id }}1">
                                <img src="/files/{{ $place->photo }}" class="img img-responsive">
                            </a>
                            <div class="caption">

                                    <h3>{{ $place->title }}</h3>


                                    <div >
                                        <div class="star-rating3" id="exampleInputName2" style="float: right">
                                            @for($i = 0; $i < $place->explain($place->id)['over']; $i++)
                                                <span class="fa fa-star" data-rating="{{ $i+1 }}"></span>
                                            @endfor
                                            @for($i = 0; $i < 5 - $place->explain($place->id)['over'];$i++)
                                                <span class="fa fa-star-o" data-rating="{{ $i+$place->explain($place->id)['over']+1 }}"></span>
                                            @endfor
                                        </div>
                                    </div>
                                <li><i>{{ $place->category->name }}</i></li>
                                    <br>{{ str_limit($place->description,50)}}
                                <a data-product_id="{{ $place->id }}" data-product_name="{{ $place->title }}" data-toggle="modal" data-target="#{{ $place->id }}">подробное</a>
                                <br>
                                <div class="">
                                    <b>{{ $place->created_at }}</b>
                                    <b style="float: right">{{ $place->user->name }}</b>
                                </div>

                            </div>
                            <div class="modal fade" id="{{ $place->id }}" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                    data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="favoritesModalLabel">{{ $place->title }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                            <div class="col-md-4">
                                                <img src="/files/{{ $place->photo }}" class="img img-responsive">
                                            </div>
                                            <div class="col-md-8">
                                                <div >
                                                    <div class="star-rating3" id="exampleInputName2" style="float: right">
                                                        @for($i = 0; $i < $place->explain($place->id)['over']; $i++)
                                                            <span class="fa fa-star" data-rating="{{ $i+1 }}"></span>
                                                        @endfor
                                                        @for($i = 0; $i < 5 - $place->explain($place->id)['over'];$i++)
                                                            <span class="fa fa-star-o" data-rating="{{ $i+$place->explain($place->id)['over']+1 }}"></span>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <li><i>{{ $place->category->name }}</i></li>

                                                <div class="">
                                                    <b>{{ $place->created_at }}</b>
                                                    <b style="float: right">{{ $place->user->name }}</b>
                                                </div>
                                                {{ $place->description }}

                                            </div>
                                            </div>
                                        </div>
                                    </div>
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
                <div class="modal fade" id="{{ $place->id }}1" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel1">
                    <div class="modal-dialog modal-lg" role="document">
                        <button type="button" class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <img src="/files/{{ $place->photo }}" class="img img-responsive" style="height: 600px">

                    </div>
                </div>
                @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('#favoritesModal').on("show.bs.modal", function (e) {
                $("#favoritesModalLabel").html($(e.relatedTarget).data('title'));
                $("#fav-title").html($(e.relatedTarget).data('title'));
            });
        });
    </script>
    <script src="/js/vue.js"></script>
    <script>
        new Vue({
            el: '#body',
            methods: {
                sure: function () {
                    return window.confirm('Are you sure?')
                }
            }
        });
    </script>
@endsection