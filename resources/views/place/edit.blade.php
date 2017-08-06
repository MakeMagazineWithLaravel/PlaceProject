@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Edit place
                    </div>
                    <div class="panel-body">
                        <form class="form-inline" method="post" action="{{ route('place.update',$place->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
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
                                <textarea id="name1" class="form-control" name="description">{{ $place->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="name2">Main photo: </label>
                                <input id="name2" type="file" class="form-control" name="photo" value="{{ $place->photo }}">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Edit place">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection