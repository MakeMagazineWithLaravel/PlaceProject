@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Edit place
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8  col-md-offset-2 col-sm-8  col-sm-offset-2 col-xs-8  col-xs-offset-2">
                             <form class="form" method="post" action="{{ route('place.update',$place->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Title: </label>
                                        <input id="name" type="text" class="form-control" name="title" value="{{ $place->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category: </label>
                                        <select id="category" class="form-control" name="categories_id">
                                            @foreach($categories as $category)
                                                @if($category->id == $place->categories_id)
                                                    <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name1">Description: </label>
                                        <textarea id="name1" class="form-control" name="description" rows="6">{{ $place->description }}</textarea>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name2">Main photo: </label>
                                        <img src="/files/{{ $place->photo}}" class="img img-responsive">
                                        <input id="name2" type="file" class="form-control" name="photo" value="{{ $place->photo }}">
                                    </div>
                                     <input type="submit" class="btn btn-primary" value="Edit place">
                                 </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection