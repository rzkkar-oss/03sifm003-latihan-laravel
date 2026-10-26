@extends('layouts.app')

@section('title', 'Halaman Home')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body">
        <h1 class="text-center mb-4">Dashboard</h1>
        <p>Selamat datang di halaman home</p>
        <a href="{{ url('/profile') }}" class="btn btn-success">Lihat Halaman Profile</a>
    </div>
@endsection