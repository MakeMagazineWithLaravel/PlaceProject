@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">

                <h2>All places</h2>
                <h4>Select category: <a href="{{ route('place.index') }}"> All</a>,
                    @foreach($categories as $category)
                        <a href="{{ route('categories.show',$category->id) }}"> {{ $category->name }}</a>,
                    @endforeach
                </h4>
                @foreach($places as $place)
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">

                <div class="thumbnail">
                    <a href="{{ route('place.show',$place->id) }}">
                        <img src="/files/{{ $place->photo }}" class="img img-responsive" style="height: 200px; width: auto">
                    </a>
                    <div class="caption">
                        <a href="{{ route('place.show',$place->id) }}">{{ $place->title }}</a><br>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <br>
                        ({{ $place->reviews }} reviews)<br>
                        <span class="glyphicon glyphicon-camera"></span> photos
                    </div>
                </div>
                </div>
                @endforeach


        </div>

    </div>

@endsection