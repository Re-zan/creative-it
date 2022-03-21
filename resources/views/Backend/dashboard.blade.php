@extends('layouts.backendapp')

@section('content')
    <h2>{{ Auth::user()->name }} Welcome to our dashboard</h2>
@endsection
