@extends('layouts.main')

@section('title', 'Show Post with Banners')

@section('content')
    <h1>{{ $postName }}</h1>

    {!! $postText !!}
@endsection
