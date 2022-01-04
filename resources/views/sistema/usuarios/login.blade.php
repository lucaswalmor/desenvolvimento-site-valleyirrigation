<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <?php session_start(); ?>
    @include('_layouts._includes._login')
</head>

<body>

    <form action="{{ route('signin') }}" class="box" method="POST" autocomplete="off">
        @csrf
        <img src="{{ asset('img/ValleyCheckPivot1a_login.png') }}" style="width: 250px" />
        <img src="{{ asset('img/ValleyCheckPivot2_login.png') }}" style="width: 250px" />
        @if (Session::has('error'))
            <div class="alert-error">
                {!! Session::get('error') !!}
            </div>
        @endif
        <input type="email" name="email" placeholder="@lang('login.email')">
        <input type="password" name="password" placeholder="@lang('login.senha')">
        <input type="submit" name="enviar" value="@lang('login.entrar')">
        {{-- <a href="#" name="rememberPassword">@lang('login.lembrar_minha_senha')</a> --}}
    </form>
    <div class="text">
        <p>Copyright © Valmont Industries Inc. All Rights reserved.</p>
    </div>
</body>

</html>
