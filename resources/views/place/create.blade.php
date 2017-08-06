@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Create category
                        </div>
                        <div class="panel-body">
                            <form class="form-inline" method="post" action="{{ route('place.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Title: </label>
                                    <input id="name" type="text" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category: </label>
                                    <select id="category" class="form-control" name="category">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name1">Description: </label>
                                    <textarea id="name1" class="form-control" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name2">Main photo: </label>
                                    <input id="name2" type="file" class="form-control" name="photo">
                                </div>
                                <input type="submit" class="btn btn-primary" value="Submit new place">
                            </form>
                        </div>

                    </div>
                </div>
        </div>
    </div>

@endsection