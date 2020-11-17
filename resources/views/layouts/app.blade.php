<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@lang('message.title')</title>
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('bower_components/lato-font/css/lato-font.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts.css') }}" rel='stylesheet' type='text/css'>
</head>

<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('users.index') }}">
                    @lang('user.list')
                </a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('tasks.index') }}">
                    @lang('task.list')
                </a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('tasks.create') }}">
                    @lang('task.newTask')
                </a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('users.create') }}">
                    @lang('user.newUser')
                </a>
            </div>
            <div class="navbar-header language-button">
                <a class="navbar-brand" href="{{ route('change-language', ['locale' => 'en']) }}">@lang('message.en')</a>
            </div>
            <div class="navbar-header language-button">
                <a class="navbar-brand" href="{{ route('change-language', ['locale' => 'vi']) }}">@lang('message.vi')</a>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>

</html>
