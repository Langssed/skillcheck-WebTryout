@extends('dashboard.layouts.app')

@section('title', 'Data Permission')

@section('dashboardPermission', 'active')

@section('content')

    @livewire('superadmin.permission.index')

@endsection