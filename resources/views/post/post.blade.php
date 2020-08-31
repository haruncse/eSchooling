@extends('layouts.appLogin')
@section('content')
<style type="text/css">
    .lright{
        text-align: right;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    @if(Auth::user()->role=='Teacher')
                    <div class="alert alert-success">
                            Teacher
                    </div>
                    @endif

                    @if(Auth::user()->role=='Student')
                    <div class="alert alert-success">
                            Student
                    </div>
                    @endif
                    @if (session('flash_message'))
                        <div class="alert alert-success">
                            {{ session('flash_message') }}
                        </div>
                    @endif
                    <form method="post" action="{{route('save.post')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="question">Your Question Title</label>
                          <textarea name="title" class="form-control" rows="1" id="question"></textarea>
                          <label for="question">Your Question</label>
                          <textarea name="postData" class="form-control" rows="5" id="question"></textarea>
                          
                        </div>
                        <div class="form-group">
                            <button type="submit"  class="btn btn-info">POST</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
