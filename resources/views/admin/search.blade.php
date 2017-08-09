@extends('layouts.admin')

@section('content')

    <div class="container" id="body">
        <div class="row">
            @foreach($places as $place)
                <div class="col-md-3 col-sm-4 col-xs-4">
                    <div class="thumbnail">

                        <img src="/files/{{ $place->photo }}" class="img img-responsive">
                        <div class="caption">
                            <h3>{{ $place->title }}</h3>
                            <div style="float: right">
                                <div class="star-rating3" id="exampleInputName2">
                                    @for($i = 0; $i < $place->explain($place->id)['over']; $i++)
                                        <span class="fa fa-star" data-rating="{{ $i+1 }}"></span>
                                    @endfor
                                    @for($i = 0; $i < 5 - $place->explain($place->id)['over'];$i++)
                                        <span class="fa fa-star-o" data-rating="{{ $i+$place->explain($place->id)['over']+1 }}"></span>
                                    @endfor
                                </div>
                            </div>
                            <li><i>{{ $place->category->name }}</i></li>
                            <br>{{ $place->description }}<br>
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
            @foreach($categories as $category)
                @foreach($category->place as $place)
                    <div class="col-md-3 col-sm-4 col-xs-4">
                        <div class="thumbnail">

                            <img src="/files/{{ $place->photo }}" class="img img-responsive">
                            <div class="caption">
                                <h3>{{ $place->title }}</h3>
                                <li><i>{{ $place->category->name }}</i></li>
                                <br>{{ $place->description }}<br>
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
                @endforeach
        </div>
    </div>

@endsection