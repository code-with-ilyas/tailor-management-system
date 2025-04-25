<x-layout></x-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa; /* Optional: adds a light background */
        }
        form {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional: adds a shadow for better appearance */
        }
        .form-label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }
        .form-control {
            width: 100%;
            padding: 8px 12px;
            margin-bottom: 16px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        .text-danger {
            font-size: 14px;
        }
        #form-submit {
            width: 100%;
            padding: 10px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        #form-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <h4 style="text-align: center;">LOGIN</h4>

        <br>

        <div>
            <label for="email" class="form-label">Email</label>
            <input 
                name="email" 
                type="email" 
                id="email" 
                placeholder="Email" 
                value="{{ old('email') }}" 
                class="form-control" 
                required 
                autofocus 
                autocomplete="username">
            
            <!-- Display validation error messages -->
            @if ($errors->has('email'))
                <div class="text-danger mt-2">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        
        <div>
            <label for="password" class="form-label">Password</label>
            <input 
                name="password" 
                type="password" 
                id="password" 
                placeholder="Password" 
                class="form-control" 
                required
                autocomplete="current-password">
            
            <!-- Display validation error messages -->
            @if ($errors->has('password'))
                <div class="text-danger mt-2">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>
         <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

        <div>
            <button type="submit" id="form-submit">Login</button>
        </div>
    </form>
</body>
</html>


