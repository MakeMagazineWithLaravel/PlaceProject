@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">
            <center>
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Create category
                        </div>
                        <div class="panel-body">
                            <form class="form-inline" method="post" action="{{ route('categories.store') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Name: </label>
                                    <input id="name" type="text" class="form-control" name="name">
                                </div>
                                <input type="submit" class="btn btn-primary" value="Enter">
                            </form>
                        </div>

                    </div>
                </div>
            </center>
        </div>
    </div>

@endsection