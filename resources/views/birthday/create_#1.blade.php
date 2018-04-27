@extends('NOT_USED_layout')

@section('content')
    <h1 class="text-center well">
        <small>Create a birthday to remember</small>
    </h1>
    {{--<form method="post" action="{{url('birthday')}}">--}}
    <form method="post" action="{{route('birthday.store')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-2">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" id="date">
            </div>

            <div class="form-group col-md-1">
                <input type="text" class="form-control" name="day" id="day" placeholder="Day">
            </div>
            <div class="form-group col-md-1">
                <input type="text" class="form-control" name="month" id="month" placeholder="Month">
            </div>
            <div class="form-group col-md-1">
                <input type="text" class="form-control" name="year" id="year" placeholder="Year">
            </div>
        </div>

        <hr>

        <div class="row text-center">
            <div class="form-group col-md-12">
                <a class="btn btn-default" href="{{ route('birthday.index') }}">Cancel</a>
                <button class="btn btn-success">Add Birthday</button>
            </div>
        </div>
        @if (count($errors))
            <div class="row alert alert-danger" role="alert">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </form>
@endsection
