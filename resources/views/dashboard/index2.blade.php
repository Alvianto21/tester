@extends('layouts\user')
@section('container')
<h1>Welcome, {{ Auth::user()->name }}</h1>
@endsection

