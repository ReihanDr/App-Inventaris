@extends('layout')
@section('konten')

<div class="container">
    <h2>Selamat Datang Administrator</h2>
    <form action="/logout" method="post">
    @csrf
    <button type="submit" class="btn btn-primary">Logout</button>
    </form>
</div>

@endsection