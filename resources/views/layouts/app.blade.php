<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ trans('messages.title') }}</title>

    <!-- Styles -->
    {!! Html::style(mix('/css/app.css')) !!}
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ route('task.index') }}">
                    {{ trans('messages.heading') }}
                </a>
            </div>

        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    <!-- JavaScripts -->
    {!! Html::script(mix('/js/app.js')) !!}
</body>
</html>
