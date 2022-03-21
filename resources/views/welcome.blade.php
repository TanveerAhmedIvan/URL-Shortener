<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('URL Shortener') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('home') }}" @submit.prevent="getShortURL">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="url" class="col-md-4 col-form-label text-md-end">{{ __('URL') }}</label>

                                        <div class="col-md-6">
                                            <input id="url" v-model="form.url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required autocomplete="URL" autofocus>

                                            @error('url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    @if($shorturl !='')
                                    <div class="row mb-3">
                                        <label for="shorturl" class="col-md-4 col-form-label text-md-end">{{ __('Short URL') }}</label>

                                        <div class="col-md-6">
                                            <span role="alert">
                                                <a href="{{$shorturl}}" target="_blank">{{$shorturl}}</a>
                                            </span>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Submit') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>