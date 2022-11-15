@extends('layouts.main-layout')

@section('title', 'Авторизация в панели администратора')

@section('content')
<section class="section">
    <div class="container">
        <header class="section-header">
            <h2 class="section-header__title">
                Авторизация
            </h2>
        </header>

        <form action="{{ route('auth.signin') }}">
            @csrf

            <div class="control">
                <label for="email-input">
                    Электронная почта
                </label>

                <input type="email" id="email-input" value="{{ old('email') }}" name="email">
            </div>

            <div class="control">
                <label for="password-input">
                    Пароль
                </label>

                <input type="password" id="password-input" value="{{ old('password') }}" name="password">
            </div>

            <button class="button button--auth" type="submit">
                Войти
            </button>
        </form>
    </div>
</section>
@endsection