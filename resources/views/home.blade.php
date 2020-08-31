@extends('layouts.appLogin')

@section('content')
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
