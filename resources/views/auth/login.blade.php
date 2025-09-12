<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            width: 1100px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }

        .left {
            /* background: linear-gradient(135deg, #662d91, #912d73); */
            background: linear-gradient(135deg, #084c9d, #1e6bb8);
            color: #fff;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 60px;
        }

        .left h2 {
            margin: 0;
            font-size: 32px;
            font-weight: bold;
        }

        .left p {
            font-size: 20px;
            margin-top: 20px;
            text-align: center;
        }

        .left img {
            width: 341px;
            border-radius: 1rem;
        }

        .right {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right h3 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }

        .right p {
            font-size: 14px;
            margin-bottom: 30px;
            color: #555;
            text-align: center;
        }

        .right input[type="email"],
        .right input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .right input[type="checkbox"] {
            margin-right: 10px;
        }

        .right .forgot-password {
            float: right;
            color: #6c63ff;
            text-decoration: none;
            font-size: 14px;
        }

        .right button,
        .right .google-btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 20px;
            margin-left: 1rem;
        }

        .right button {
            /* background: linear-gradient(135deg, #662d91, #912d73); */
            background: linear-gradient(135deg, #084c9d, #1e6bb8);
            margin-top: 2rem;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <h2>Welcome Admin !</h2>

            <!-- <img src="" alt="AUIDFC Logo" width="300"> -->
        </div>
        <div class="right">
            <h3>Login</h3>
            <p>Please enter your details.</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <!-- @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif -->

                    <!-- <x-button class="">
                        {{ __('Log in') }}
                    </x-button> -->
                    <button type="submit">Log in </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
