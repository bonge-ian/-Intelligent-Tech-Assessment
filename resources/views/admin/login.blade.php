<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit-icons.min.js"></script>
</head>

<body>
    <main class="uk-container">
        <h1>Login</h1>

        @if (session('error'))
            <div class="uk-alert uk-alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <article class="uk-tile uk-tile-default">
            <div class="uk-container uk-container-small">
                <div class="uk-width-1-1">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="uk-margin">
                            <label class="uk-form-label">{{ __('Email') }}</label>

                            <div class="uk-width-1-1">
                                <div class="uk-inline uk-width-1-1">
                                    <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                    <input class="uk-input @error('email') uk-form-danger  @enderror " type="email"
                                        name="email" value="{{ old('email') }}" required autofocus />
                                </div>

                                @error('email')
                                <div class="uk-alert uk-alert-dange">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label">{{ __('Password') }}</label>
                            <div class="uk-width-1-1">
                                <div class="uk-inline uk-width-1-1">
                                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                    <input class="uk-input @error('email') uk-form-danger  @enderror" type="password"
                                        name="password" required autocomplete="current-password" />
                                </div>

                                @error('password')
                                <div class="uk-alert uk-alert-dange">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>



                        <div class="uk-margin uk-text-center ">
                            <button type="submit" class="uk-button uk-button-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </article>
    </main>
</body>

</html>
