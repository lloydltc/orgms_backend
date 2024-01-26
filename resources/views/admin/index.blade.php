@extends('layouts.admin')

@section('content')
@if (session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    @livewire('admin.show-members')

@endsection
