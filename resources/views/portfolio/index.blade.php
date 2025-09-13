@extends('layouts.app')

@section('title','بورتفوليو الفريق')

@section('content')

@include('portfolio.partials.navbar')

@include('portfolio.partials.hero')

@include('portfolio.partials.team')

@include('portfolio.partials.projects')

@include('portfolio.partials.services')

@include('portfolio.partials.contact')

@include('portfolio.partials.footer')

@endsection
