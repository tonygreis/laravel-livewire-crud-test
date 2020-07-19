@extends('layouts.app')
@section('title', 'Field Show')
@section('content')
    <div class="container mx-auto">
        <livewire:fields.view :field="$field" />
    </div>
@endsection
