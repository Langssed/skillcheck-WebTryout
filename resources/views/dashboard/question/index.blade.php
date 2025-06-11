@extends('dashboard/layouts.app')

@section('title', 'Data Soal')

@section('dashboardQuestion', 'active')

@section('content')

    @livewire('admin.question.index')

@endsection