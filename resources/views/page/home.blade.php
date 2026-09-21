@extends('layouts.app')

@section('titlr', 'home')

@section('content')

  <div class="container mt-5">
        <h1 class="text-center mb-4">Dashboard</h1>
        <p>selamat datang dihalaman home</p>
        <a class="btn btn-succes btn-lg" href="{{ url('/profile') }}"> Lihat halaman profile</a>
    </div>

@endsection