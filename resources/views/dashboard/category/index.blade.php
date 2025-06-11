@extends('dashboard/layouts.app')

@section('title', 'Data Kategori Soal')

@section('dashboardCategory', 'active')

@section('content')

    @livewire('admin.category.index')

@endsection