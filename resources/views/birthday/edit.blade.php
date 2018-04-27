@extends('layouts.app')

@section('content')
    @if($birthday)
    {{--<div class="container">--}}
        <h1 class="text-center well">
            <small>Update a birthday to remember</small>
        </h1>
        <form method="post" action="/birthday/{{ $birthday->id }}">
            @include('birthday.form_edit')
            {{--@include('errors')--}}
        </form>
    {{--</div>--}}
    @else
{{--

        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="alert alert-danger" role="alert">
                    <strong>WOOPS !!!</strong> This record does not exist
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                </div>
            </div>
        </div>
--}}
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-6 col-md-offset-3 text-center">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('birthday.index') }}">Cancel</a>
            </div>
        </div>
    @endif
@endsection