@extends('dashboard.layouts.app')

@section('title', 'Data User')

@section('dashboardUser', 'active')

@section('content')

    @livewire('superadmin.user.index')

@endsection