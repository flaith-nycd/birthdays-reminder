@extends('layouts.app')

@section('content')
    {{--@include('flash::message')--}}
    {{--@if($errors->any())--}}
        {{--<h4>{{$errors->first()}}</h4>--}}
    {{--@endif--}}
    <h1 class="text-center well">
        <small>Create a birthday to remember</small>
    </h1>
    {{--<form method="post" action="{{url('birthday')}}">--}}
    {{--<form method="post" action="/birthday">--}}
    <form method="post" action="{{route('birthday.store')}}">
        @include('birthday.form')
    </form>
@endsection