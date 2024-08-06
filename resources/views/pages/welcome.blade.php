@extends('layouts.pages')

@section('content')
    <x-carausel />
    <livewire:availability-check />
    <div class="container mx-auto mt-20 sm:mt-22">

        <x-welcome-popup />
@endsection
