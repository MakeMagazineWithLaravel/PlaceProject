@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Categories
                        </div>
                        <div class="panel-body">
                            <ul>
                                @foreach($categories as $category)
                                    <li>
                                        <div class="col-md-6">
                                            {{ $category->name }}
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-info" href="{{ route('categories.edit',$category->id) }}">Edit</a>
                                            <a class="btn btn-danger" href="{{ route('categories.destroy',$category->id) }}">Delete</a>
                                        </div>
                                        <br>
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                        <center>
                        <div class="panel-footer">

                            <a class="btn btn-primary" href="{{ route('categories.create') }}">Add</a>

                        </div>
                        </center>
                    </div>

                </div>
        </div>
    </div>

@endsection