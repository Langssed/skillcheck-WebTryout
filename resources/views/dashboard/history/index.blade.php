@extends('dashboard.layouts.app')

@section('title', 'Histori Saya')

@section('dashboardHistory', 'active')

@section('content')

    @livewire('history.index')

@endsection