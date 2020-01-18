@extends('layouts.app')

@section('content')
    <profile-component :user="{{ auth()->user() }}" csrf="{{ csrf_token() }}" />
@endsection
