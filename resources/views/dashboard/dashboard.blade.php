@extends('dashboard.layouts.app')

@section('title', 'Dashboard')

@section('dashboard', 'active')

@section('content')
    @livewire('dashboard')
@endsection

@push('styles')
<style>
    .fc .fc-toolbar-title,
    .fc .fc-button,
    .fc .fc-col-header-cell-cushion,
    .fc .fc-daygrid-day-number,
    .fc .fc-daygrid-day {
        font-size: 1rem;
    }
</style>
@endpush