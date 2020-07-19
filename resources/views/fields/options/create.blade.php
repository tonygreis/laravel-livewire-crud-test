@extends('layouts.app')
@section('title', 'Create Fields')
@section('content')
    <div class="container mx-auto">
        <livewire:fields.options.create :field="$field" />
    </div>
@endsection
