@extends('layouts.app')

@section('title', 'Atualizar Usuário')

@section('content')
    <h1 class="text-2xl font-semibold leading-tigh py-2">Atualizar Usuário, {{$user->name}}</h1>

    @include('includes.validations-form')

    <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('users._partials.form')
    </form>
@endsection