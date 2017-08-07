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
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                    <img src="/files/60267.jpg" class="img img-responsive"/>
                </div>
                @foreach($place->image as $image)
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                        <img src="/images/{{ $image->name }}" class="img img-responsive"/>
                    </div>
                @endforeach
        </div>
            <hr style="border-color: #000000">
            <div class="row">
                <h3>Ratings</h3>
                <div class="panel panel-default">
                <div class="panel-body">
                    <div class="star-rating3" id="exampleInputName2">
                        <span class="">Overall: </span>
                        @for($i = 0; $i < $data['over']; $i++)
                            <span class="fa fa-star" data-rating="{{ $i+1 }}"></span>
                        @endfor
                        @for($i = 0; $i < 5 - $data['over'];$i++)
                            <span class="fa fa-star-o" data-rating="{{ $i+$data['over']+1 }}"></span>
                        @endfor

                        <span>
                            {{ $data['over'] }}
                        </span>
                    </div>
                    <div class="star-rating3 " id="exampleInputName2">
                        <span class="">Quality of food: </span>
                        @for($i = 0; $i < $data['food']; $i++)
                            <span class="fa fa-star" data-rating="{{ $i+1 }}"></span>
                        @endfor
                        @for($i = 0; $i < 5 - $data['food'];$i++)
                            <span class="fa fa-star-o" data-rating="{{ $i+$data['food']+1 }}"></span>
                        @endfor
                        <span>
                            {{ $data['food'] }}
                        </span>
                    </div>
                    <div class="star-rating3 " id="exampleInputName2">
                        <span class="">Service quality: </span>
                        @for($i = 0; $i < $data['ser']; $i++)
                            <span class="fa fa-star" data-rating="{{ $i+1 }}"></span>
                        @endfor
                        @for($i = 0; $i < 5 - $data['ser'];$i++)
                            <span class="fa fa-star-o" data-rating="{{ $i+$data['ser']+1 }}"></span>
                        @endfor

                        <span>
                            {{ $data['ser'] }}
                        </span>
                    </div>
                    <div class="star-rating3" id="exampleInputName2">
                        <span class="">Interior: </span>
                        @for($i = 0; $i < $data['inter']; $i++)
                            <span class="fa fa-star" data-rating="{{ $i+1 }}"></span>
                        @endfor
                        @for($i = 0; $i < 5 - $data['inter'];$i++)
                            <span class="fa fa-star-o" data-rating="{{ $i+$data['inter']+1 }}"></span>
                        @endfor

                        <span>
                            {{ $data['inter'] }}
                        </span>
                    </div>
                </div>
            </div>
            </div>
            <hr style="border-color: #000000">
        <div class="row">
            <h3>Reviews</h3>
            @foreach($place->rating as $rating)
                <div class="panel panel-default">
                    <div class="panel-body">
                <p>On {{ $rating->created_at }}, {{ $rating->user->name }} said: </p><br>
                <p>{{ $rating->comment }}</p><br>
                    <div class="star-rating3 " id="exampleInputName2">
                        <span class="">Quality of food: </span>
                        @for($i = 0; $i < $rating->q_of_food; $i++)
                            <span class="fa fa-star" data-rating="{{ $i+1 }}"></span>
                        @endfor
                        @for($i = 0; $i < 5 - $rating->q_of_food;$i++)
                            <span class="fa fa-star-o" data-rating="{{ $i+$rating->q_of_food+1 }}"></span>
                        @endfor
                    </div>
                    <div class="star-rating3 " id="exampleInputName2">
                        <span class="">Service quality: </span>
                        @for($i = 0; $i < $rating->service_q; $i++)
                            <span class="fa fa-star" data-rating="{{ $i+1 }}"></span>
                        @endfor
                        @for($i = 0; $i < 5 - $rating->service_q;$i++)
                            <span class="fa fa-star-o" data-rating="{{ $i+$rating->service_q+1 }}"></span>
                        @endfor
                    </div>
                    <div class="star-rating3" id="exampleInputName2">
                        <span class="">Interior: </span>
                        @for($i = 0; $i < $rating->interior; $i++)
                            <span class="fa fa-star" data-rating="{{ $i+1 }}"></span>
                        @endfor
                        @for($i = 0; $i < 5 - $rating->interior;$i++)
                            <span class="fa fa-star-o" data-rating="{{ $i+$rating->interior+1 }}"></span>
                        @endfor
                    </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <form class="form" method="get" action="{{ route('place.comment',$place->id) }}">
                {{ csrf_field() }}
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
        <hr style="border-color: #000000">
        <div class="row">
            <form method="post" action="{{ route('image.add',$place->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h3>Upload new photo</h3>
                <div class="form-group">
                    <label class="custom-file">
                        <input type="file" id="file" class="custom-file-input" multiple  name="images[]">
                        <span class="custom-file-control"></span>
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>

@endsection