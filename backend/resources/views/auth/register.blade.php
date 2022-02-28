<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- 名前 -->
            <div>
                <x-label for="name" :value="__('auth.name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-label for="email" :value="__('auth.email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('auth.password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('auth.password-confirm')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            {{-- プロフィール写真 --}}
            <div class="mt-4">
                <x-label for="img" :value="__('auth.photo')" />

                <x-input id="img" class="block mt-1 w-full" type="text" name="img" :value="old('img')" required />
            </div>

            {{-- プロフィール文 --}}
            <div class="mt-4">
                <x-label for="profile" :value="__('auth.profile')" />

                <x-textarea id="profile" class="block mt-1 w-full" name="profile" :value="old('profile')" required />
            </div>

            {{-- 性別 --}}
            {{-- TODO: セレクトボックスになるように記述する --}}
            <div class="mt-4">
                <x-label for="gender" :value="__('auth.gender')" />

                <select name="gender" id="gender" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option value="1">{{App\Models\MasterGender::MALE_USER}}</option>
                    <option value="2">{{App\Models\MasterGender::FEMALE_USER}}</option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
