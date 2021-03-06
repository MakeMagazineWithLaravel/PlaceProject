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
    <div class="container" id="body">
        <div class="row">
                <div class="col-lg-12">

                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <h3>{{ $place->title }}</h3>
                                <b>{{ $place->category->name }} </b><br>
                                {{ $place->description }}
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <a data-toggle="modal" data-target="#{{ $place->id }}1">
                                    <img src="/files/{{ $place->photo }}" class="img img-responsive img-thumbnail" style="height: 250px; width: auto; float: right;">
                                </a>
                            </div>
                </div>
                @if (Auth::user() !== null and Auth::user()->place_id($place->id) !== null)
                    <div class="">
                        <a href="{{ route('place.edit',$place->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('place.destroy',$place->id) }}" class="btn btn-danger">Delete</a>
                    </div>
                @endif
            </div>
        @if (!$place->image->isEmpty())
        <div class="row">
            <h3>
                Gallery
            </h3>
            {{--<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">--}}
                {{--<img src="/files/{{ $place->photo }}" class="img img-responsive img-thumbnail">--}}
            {{--</div>--}}
                @foreach($place->image as $image)
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                        <a data-toggle="modal" data-target="#{{ $image->id }}">
                            <img src="/images/{{ $image->name }}" class="img img-responsive img-thumbnail"/>
                            <div style="margin-top: 10px">
                                @if (Auth::user() !== null and $image->user->id === Auth::user()->id)
                                    <a href="{{ route('image.edit',$image->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('image.delete',$image->id) }}" class="btn btn-danger">Delete</a>
                                @endif
                            </div>
                        </a>
                    </div>
                <div class="modal fade" id="{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel1">
                    <div class="modal-dialog modal-lg modal-md modal-sm" role="document">
                        <button type="button" class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <img src="/images/{{ $image->name }}" class="img img-responsive">

                    </div>
                </div>
                @endforeach
        </div>
        @endif
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
                @if($rating->accept)
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
                @endif
            @endforeach
        </div>

        <div class="row">
            @if(Auth::user() !== null and !Auth::user()->rating->isEmpty()  and Auth::user()->comment($place->id) !== null)
                <form class="form" method="get" action="{{ route('place.comment.update',Auth::user()->comment($place->id)->id) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="text"><h3>Add review</h3></label>

                        <textarea name="comment" id="text" class="form-control" rows="4" >
                                    {{ Auth::user()->comment($place->id)->comment }}
                        </textarea>
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
                            <input type="hidden" name="q_of_food" class="rating-value" value="{{ Auth::user()->comment($place->id)->q_of_food }}">
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
                            <input type="hidden" name="service_q" class="rating-value" value="{{ Auth::user()->comment($place->id)->service_q }}">
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
                            <input type="hidden" name="interior" class="rating-value" value="{{ Auth::user()->comment($place->id)->interior }}">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-danger" style="float: right">Update review</button>
                    </div>
                    </div>
                </form>
                @else
                <form class="form" method="get" action="{{ route('place.comment',$place->id) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="text"><h3>Add review</h3></label>

                        <textarea name="comment" id="text" class="form-control" rows="4" required></textarea>
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
            @endif
        </div>
        <hr style="border-color: #000000">
        <div class="row">
            <form method="post" action="{{ route('image.add',$place->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h3>Upload new photo</h3>
                <div class="form-group">
                    <label class="custom-file">
                        <input type="file" id="file" class="custom-file-input" multiple  name="images[]" required>
                        <span class="custom-file-control"></span>
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>

            </form>
        </div>
    </div>
    <div class="footer">
        <div class="row">
            <div class="">

            </div>
        </div>
    </div>
    <div class="modal fade" id="{{ $place->id }}1" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel1">
        <div class="modal-dialog modal-lg modal-md modal-sm" role="document">
            <button type="button" class="close"
                    data-dismiss="modal"
                    aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <img src="/files/{{ $place->photo }}" class="img img-responsive">

        </div>
    </div>

@endsection
@section('script')
    <script src="https://unpkg.com/vue"></script>
    <script>
       var a =  new Vue({
            el: '#body',
            data: {
                image:'',
                element:'square'
            },
           components:{
               square: {
                   template: '#square-template'
               }
           },
            methods: {
                changeImage: function (name,event){
                  this.image = event.srcElement.src;
                    console.log(event.srcElement.src)
                }
            }
        });
    </script>
@endsection