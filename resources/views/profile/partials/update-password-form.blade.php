<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6 flex flex-col items-center w-full max-w-md">
        @csrf
        @method('put')

        <div class="form-basic w-full">
            <div class="form-group mb-25">
                <label for="current-password">Current Password</label>
                <input id="current-password" class="form-control form-control-lg w-full" type="password" name="current_password" autocomplete="current-password">
                @error('current_password')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-25">
                <label for="new-password">New Password</label>
                <input id="new-password" class="form-control form-control-lg w-full" type="password" name="password" autocomplete="new-password">
                @error('password')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-25">
                <label for="confirm-password">Confirm Password</label>
                <input id="confirm-password" class="form-control form-control-lg w-full" type="password" name="password_confirmation" autocomplete="new-password">
                @error('password_confirmation')
                <span class="text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group mb-0 w-full">
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
