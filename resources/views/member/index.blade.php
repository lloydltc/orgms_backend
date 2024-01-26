@extends('layouts.member')

@section('content')
@if (session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    @livewire('member.show-finances')

@endsection
