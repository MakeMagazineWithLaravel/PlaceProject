@extends('layouts/admin')

@section('content')
<style>
    * {
        box-sizing: border-box;
    }

    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        transition: opacity .3s ease;
    }

    .modal-container {
        width: 300px;
        margin: 40px auto 0;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }

    .modal-body {
        margin: 20px 0;
    }

    .text-right {
        text-align: right;
    }

    .form-label {
        display: block;
        margin-bottom: 1em;
    }

    .form-label > .form-control {
        margin-top: 0.5em;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 0.5em 1em;
        line-height: 1.5;
        border: 1px solid #ddd;
    }

    .modal-enter, .modal-leave {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>
    <div class="container" id="body">
        <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Categories
                        </div>
                        <div class="panel-body">
                                @foreach($categories as $category)

                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <h4>{{ $category->name }}</h4>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <a class="btn btn-info" href="{{ route('admin.categories.edit',$category->id) }}">Edit</a>
                                            <a class="btn btn-danger" v-on:click="DeleteEl()" href="{{ route('categories.destroy',$category->id) }}">Delete</a>
                                        </div>
                                        <br>

                                @endforeach
                        </div>
                        <center>
                        <div class="panel-footer">
                            <form class="form-inline" method="post" action="{{ route('admin.categories.store') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input id="name" type="text" class="form-control" name="name" required>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Add new category">
                            </form>
                        </div>
                        </center>
                    </div>

                </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/vue"></script>
    <script src="/js/vue.js"></script>
    <script>
        new Vue({
           el: '#body',
            methods: {
               DeleteEl: function () {
                   return window.confirm('Are you sure');
               }
            }
        });
    </script>

@endsection