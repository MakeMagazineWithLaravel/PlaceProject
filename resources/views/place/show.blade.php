@extends('layouts/app')

@section('content')
    <style>
        .star-rating {
            line-height:32px;
            font-size:1.25em;
        }
        .star-rating1 {
            line-height:32px;
            font-size:1.25em;
        }
        .star-rating2 {
            line-height:32px;
            font-size:1.25em;
        }

        .star-rating .fa-star{color: yellow;}
        .star-rating1 .fa-star{color: yellow;}
        .star-rating2 .fa-star{color: yellow;}

    </style>
    <div class="container">
        <div class="row">
                <div class="col-lg-12">

                            <div class="col-md-7">
                                <h3>{{ $place->title }}</h3>
                                <b>{{ $place->category->name }} </b><br>
                                {{ $place->description }}
                            </div>
                            <div class="col-md-5">
                                <img src="/files/{{ $place->photo }}" class="img img-responsive" style="height: 200px; width: auto; float: right;">
                            </div>
                        </div>
            </div>
        <div class="row">
            <h3>
                Gallery
            </h3>
            </div>
            <hr style="border-color: #000000">
            <h3>Ratings</h3>
            <hr style="border-color: #000000">
            <h3>Reviews</h3>

        <div class="row">
            <form class="form" method="get" action="{{ route('place.comment') }}">
                <div class="form-group">
                    <label for="text"><h3>Add review</h3></label>
                    <textarea name="comment" id="text" class="form-control" rows="4" ></textarea>
                </div>
                <div class="row" style="margin: 20px">
                <div class="form-group col-md-3">
                    <div class="star-rating " id="exampleInputName2">
                        <span class="">Quality of food: </span>
                        <span class="fa fa-star-o" data-rating="1"></span>
                        <span class="fa fa-star-o" data-rating="2"></span>
                        <span class="fa fa-star-o" data-rating="3"></span>
                        <span class="fa fa-star-o" data-rating="4"></span>
                        <span class="fa fa-star-o" data-rating="5"></span>
                        <input type="hidden" name="q_of_food" class="rating-value" value="2">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="star-rating1 " id="exampleInputName2">
                        <span class="">Service quality: </span>
                        <span class="fa fa-star-o" data-rating="1"></span>
                        <span class="fa fa-star-o" data-rating="2"></span>
                        <span class="fa fa-star-o" data-rating="3"></span>
                        <span class="fa fa-star-o" data-rating="4"></span>
                        <span class="fa fa-star-o" data-rating="5"></span>
                        <input type="hidden" name="service_q" class="rating-value" value="2">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <div class="star-rating2" id="exampleInputName2">
                        <span class="">Interior: </span>
                        <span class="fa fa-star-o" data-rating="1"></span>
                        <span class="fa fa-star-o" data-rating="2"></span>
                        <span class="fa fa-star-o" data-rating="3"></span>
                        <span class="fa fa-star-o" data-rating="4"></span>
                        <span class="fa fa-star-o" data-rating="5"></span>
                        <input type="hidden" name="interior" class="rating-value" value="2">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary" style="float: right">Enter review</button>
                </div>
                </div>
            </form>
        </div>
    </div>

@endsection