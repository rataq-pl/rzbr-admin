@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Zalogowano jako {{auth()->user()->email}}!</h1>
    </div>
@endsection
