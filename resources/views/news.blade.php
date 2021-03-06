@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">News</div>

                    <div class="panel-body">
                        <form method="post" action="{{ route('news.store') }}">
                            <div class="form-group">
                                <label for="name">Your name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="topic">Your topic</label>
                                <input type="text" class="form-control" id="topic" placeholder="topic" name="topic">
                            </div>
                            <div class="form-group">
                                <label for="content">Your content</label>
                                <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
