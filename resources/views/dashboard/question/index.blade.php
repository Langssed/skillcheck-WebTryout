@extends('dashboard/layouts.app')

@section('title', 'Data Soal')

@section('dashboardQuestion', 'active')

@section('content')

    @livewire('question.index')

@endsection