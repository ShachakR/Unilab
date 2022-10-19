@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            Home page of {{ $university->name }}
        </div>
    </div>
@endsection
