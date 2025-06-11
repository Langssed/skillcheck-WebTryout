@extends('dashboard.layouts.app')

@section('title', 'Data Role')

@section('dashboardRole', 'active')

@section('content')

    @livewire('superadmin.role.index')

@endsection