@extends('layouts.app')
@section('title', 'Create Fields')
@section('content')
    <div class="container mx-auto">
        <livewire:fields.options.edit :field="$field" :option="$option" />
    </div>
@endsection
