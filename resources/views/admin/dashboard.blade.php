@extends('admin.layout')

@section('content')
    <h1>Dashboard</h1>
    <p>Welcome {{ auth()->user()->name }}</p>
@endsection