<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Quickstart - Basic</title>

    <!-- Fonts -->
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{asset('css/layouts.css')}}" rel='stylesheet' type='text/css'>

</head>

<body id="app-layout">
    <nav class="navbar navbar-default"  >
        <div class="container" id="navbar">
            <div>
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ route('users.index') }}">
                        @lang('user.list')
                    </a>
                </div>
                <div class="navbar-header">

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ route('tasks.index') }}">
                        @lang('task.list')
                    </a>
                </div>
                <div class="navbar-header">

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ route('tasks.create') }}">
                        @lang('task.newTask')
                    </a>
                </div>
                <div class="navbar-header">

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ route('users.create') }}">
                        @lang('user.newUser')
                    </a>
                </div>
            </div>
            <div>
                <div class="navbar-header">

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{!!  route('change-language', ['locale' => 'en']) !!}">EN</a>
                </div>
                <div class="navbar-header">

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{!!  route('change-language', ['locale' => 'vi']) !!}">VI</a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>

</html>
