@extends('layouts.app')

@section('content')
    <h1>My Profile</h1>

    <p><strong>First Name:</strong> {{ Auth::user()->first_name }}</p>
    <p><strong>Last Name:</strong> {{ Auth::user()->last_name }}</p>
    <p><strong>Phone Number:</strong> {{ Auth::user()->phone_number }}</p>
@endsection
