<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 flex flex-col items-center justify-center">
        @csrf
        @method('patch')

        <div class="form-basic w-full max-w-md">
            <div class="form-group mb-25">
                <label for="name">Name</label>
                <input id="name" class="form-control form-control-lg w-full" type="text" name="name" placeholder="Your Name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                @error('name')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-25">
                <label for="email">Email</label>
                <input id="email" class="form-control form-control-lg w-full" type="email" name="email" placeholder="name@example.com" value="{{ old('email', $user->email) }}" required autocomplete="username">
                @error('email')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="text-center">
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
 <div class="form-group mb-0 w-full max-w-md">
 <button type="submit" class="btn btn-lg btn-primary btn-submit w-full">Save</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400 mt-2 text-center"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
