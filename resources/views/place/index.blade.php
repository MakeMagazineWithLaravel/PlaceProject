@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">

                <h2 id="bir">All places</h2>
                <h4>Select category: <a href="{{ route('place.index') }}"> All</a>,
                    @foreach($categories as $category)
                        <a href="{{ route('categories.show',$category->id) }}"> {{ $category->name }}</a>,
                    @endforeach
                </h4>
                @foreach($places as $place)
                    @if ($place->active)
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                        <div class="thumbnail">
                            <a href="{{ route('place.show',$place->id) }}">
                                <img id="main_img" src="/files/{{ $place->photo }}" class="img img-responsive" style="height: 200px; width: auto">
                            </a>
                            <div class="caption">
                                <a href="{{ route('place.show',$place->id) }}">{{ $place->title }}</a><br>
                                <div class="star-rating3" id="exampleInputName2">
                                    @for($i = 0; $i < $place->explain($place->id)['over']; $i++)
                                        <span class="fa fa-star" data-rating="{{ $i+1 }}"></span>
                                    @endfor
                                    @for($i = 0; $i < 5 - $place->explain($place->id)['over'];$i++)
                                        <span class="fa fa-star-o" data-rating="{{ $i+$place->explain($place->id)['over']+1 }}"></span>
                                    @endfor
                                </div>
                                ({{ $place->reviews }} reviews)<br>

                                   <p> <span class="glyphicon glyphicon-camera"> </span>  {{ $place->image->count() }} photos</p>
                            </div>
                        </div>
                    </div>
                @endif
                @endforeach


        </div>

    </div>
    <script>
        var my_img = document.getElementById('#main');
        my_img.onclick = function () {
            var mySrc = my_img.getAttribute('src');
            console.log(mySrc);
        }
    </script>
@endsection

@section('javascript')

@endsection