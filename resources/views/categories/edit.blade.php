@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">
            <center>
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit category
                        </div>
                        <div class="panel-body">
                            <form class="form-inline" method="post" action="{{ route('categories.update',$category->id) }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Name: </label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $category->name }}">
                                </div>
                                <input type="submit" class="btn btn-primary" value="Edit">
                            </form>
                        </div>

                    </div>
                </div>
            </center>
        </div>
    </div>

@endsection