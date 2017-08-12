@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Create category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-md-8  col-md-offset-2 col-sm-8  col-sm-offset-2 col-xs-8  col-xs-offset-2">
                            <form class="form" method="post" action="{{ route('place.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-lg-6">
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
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name2">Main photo: </label>
                                        <input id="name2" type="file" class="form-control" name="photo">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Submit new place">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection