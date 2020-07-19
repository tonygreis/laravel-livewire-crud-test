@extends('layouts.app')
@section('title', 'Edit Field')
@section('content')
    <div class="container mx-auto">
        <livewire:fields.edit :field="$field" />
    </div>
@endsection
