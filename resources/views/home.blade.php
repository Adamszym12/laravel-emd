@extends('layouts.base')

@section('pageName', '')
@section('title', 'home')
@section('content')
    <h1>Welcome {{Auth::user()->name}} {{Auth::user()->surname}} </h1>
@endsection
@push('scripts')
    <script>window.location = "/profile/{{Auth::user()->id}}";</script>
@endpush
