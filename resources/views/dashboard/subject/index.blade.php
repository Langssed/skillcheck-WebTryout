@extends('dashboard/layouts.app')

@section('title', 'Data Mata Pelajaran')

@section('dashboardSubject', 'active')

@section('content')

    @livewire('admin.subject.index')

@endsection