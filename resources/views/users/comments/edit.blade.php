@extends('layouts.app')

@section('title', 'Editar Comentário')

@section('content')
    <h1 class="text-2xl font-semibold leading-tigh py-2">Editar Comentário de {{$user->name}}</h1>

    @include('includes.validations-form')

    <form action="{{ route('comments.update', ['user_id' => $user->id, 'comment_id' => $comment->id]) }}" method="POST">
        @method('PUT')
        @include('users.comments._partials.form')
    </form>
@endsection