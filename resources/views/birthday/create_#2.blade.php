@extends('NOT_USED_layout')

@section('content')
    <h1 class="text-center well">
        <small>Create a birthday to remember</small>
    </h1>
    {{--<form method="post" action="{{url('birthday')}}">--}}
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method="post" action="{{route('birthday.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                </div>

                <div class="col-md-12 col-md-offset-0">
                    <div class="form-group col-md-5">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>

                    <div class="form-group col-md-2">
                        <input type="text" class="form-control" name="day" id="day" placeholder="DD">
                    </div>
                    <div class="form-group col-md-2">
                        <input type="text" class="form-control" name="month" id="month" placeholder="MM">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" name="year" id="year" placeholder="YYYY">
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <hr>
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('birthday.index') }}">Cancel</a>
                        <button class="btn btn-success">Add Birthday</button>
                    </div>
                </div>
                <div class="col-md-12">
                    @if (count($errors))
                        <div class="row alert alert-danger" role="alert">
                            <div class="form-group">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection

