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
    
        <form method="POST" action="{{ route('register') }}">
        @csrf

        <h4 style="text-align: center;">REGISTER</h4>

        <!-- Name -->
        <div>
            <label for="name" class="form-label">Name</label>
            <input 
                    name="name" 
                    type="text" 
                    id="name" 
                    placeholder="Name" 
                    value="{{ old('name') }}" 
                    class="form-control" 
                    required 
                    autofocus 
                    autocomplete="name">
    
                <!-- Display validation error messages -->
                @if ($errors->has('name'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('name') }}
                    </div>
                @endif
        </div>


        <!-- Email Address -->
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
        

        <!-- Password -->
        <div>
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input 
                name="password" 
                type="password" 
                id="password" 
                placeholder="Password" 
                value=""
                class="form-control" 
                required 
                autofocus 
                autocomplete="new-passwaord">
            
            <!-- Display validation error messages -->
            @if ($errors->has('password'))
                <div class="text-danger mt-2">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>


        <!-- Confirm Password -->
        <div>
            <label for="confirm_password" class="form-label">{{ __('Confirm Password') }}</label>
            <input 
                 name="password_confirmation"
                type="password" 
                id="password_confirmation"
                placeholder="Confirm Password" 
                value=""
                class="form-control" 
                required 
                autocomplete="new-passwaord">
              
            <!-- Display validation error messages -->
            @if ($errors->has('confirm_password'))
                <div class="text-danger mt-2">
                    {{ $errors->first('confirm_password') }}
                </div>
            @endif
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <div>
            <button type="submit" id="form-submit">Register</button>
        </div>
    </form>
</body>
</html>
