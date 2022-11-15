@extends('layouts.main-layout')

@section('title', 'Панель администратора - видео')

@section('content')
    <section class="section">
        <div class="container">
            <header class="section-header">
                <h2 class="section-header__title">
                    Все статьи
                </h2>
            </header>


            <ul>
                @foreach($articles as $article)
                    <li>
                        <h2>{{ $article->title }}</h2>
                        <p>Автор: {{ $article->user->name }} ({{ $article->user->email }})</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
