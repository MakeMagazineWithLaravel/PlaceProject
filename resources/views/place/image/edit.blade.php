@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    Edit image
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8  col-md-offset-2 col-sm-8  col-sm-offset-2 col-xs-8  col-xs-offset-2">
                            <form class="form" method="post" action="{{ route('image.update',$image->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="name2">New image: </label>
                                        <img src="/images/{{ $image->name}}" class="img img-responsive">
                                        <input id="name2" type="file" class="form-control" name="image" value="{{ $image->name }}">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Update image">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection