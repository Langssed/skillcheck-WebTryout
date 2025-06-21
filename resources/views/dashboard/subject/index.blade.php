@extends('dashboard/layouts.app')

@section('title', 'Data Mata Pelajaran')

@section('dashboardSubject', 'active')

@section('content')

    @livewire('subject.index')

@endsection