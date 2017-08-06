@extends('layouts/app')

@section('content')

    <div class="container">
        <div class="row">
                <div class="col-lg-12">

                            <div class="col-md-7">
                                <h3>{{ $place->title }}</h3>
                                <b>{{ $place->category->name }} </b><br>
                                {{ $place->description }}
                            </div>
                            <div class="col-md-5">
                                <img src="/files/{{ $place->photo }}" class="img img-responsive" style="height: 200px; width: auto; float: right;">
                            </div>
                        </div>
            </div>
        <div class="row">
            <h3>
                Gallery
            </h3>
            </div>
            <hr style="border-color: #000000">
            <h3>Ratings</h3>
            <hr style="border-color: #000000">
            <h3>Reviews</h3>
        <h3>Add review</h3>
        <div class="row">
            <form class="form-inline">
                <div class="form-group">
                    <div class="col-sm-10">
                        <textarea name="text" class="form-control" rows="4" cols="160"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-5" class="control-label">Rate This</label>
                    <input id="input-5" name="input-5" class="rating-loading" data-show-clear="false" data-show-caption="true">

                </div>
            </form>
        </div>

    </div>
    <script>
        $(document).on('ready', function(){
            $('#input-5').rating({clearCaption: 'No stars yet'});
        });
    </script>
@endsection