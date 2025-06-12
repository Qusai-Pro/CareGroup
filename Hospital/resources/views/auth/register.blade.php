
<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f3f4f6;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        background-color: #ffffff;
        padding: 40px 30px;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        animation: swipeIn 0.5s ease-out forwards;
    }

    @keyframes swipeIn {
        0% {
            transform: translateX(100%);
            opacity: 0;
        }
        100% {
            transform: translateX(0%);
            opacity: 1;
        }
    }

    @keyframes swipeOut {
        0% {
            transform: translateX(0%);
            opacity: 1;
        }
        100% {
            transform: translateX(-100%);
            opacity: 0;
        }
    }

    .swipe-out {
        animation: swipeOut 0.5s ease-in forwards;
    }

    .auth-switch-btn {
        display: inline-block;
        margin-top: 20px;
        background-color: #2563eb;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        text-decoration: none;
        transition: background-color 0.3s ease;
        cursor: pointer;
        font-weight: 500;
        width: 100%;
        text-align: center;
        box-shadow: 0 4px 14px rgba(37, 99, 235, 0.3);
    }

    .auth-switch-btn:hover {
        background-color: #1d4ed8;
    }
</style>

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo"></x-slot>
         

        <div id="registerPage" class="card">
            <h2 style="text-align: center; font-size: 24px; color: #1e3a8a;">Register</h2>
            <x-validation-errors class="mb-4" />
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mt-4">
                    <x-label for="name" value="Name" />
                    <x-input id="name" name="name" type="text" class="block mt-1 w-full" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <x-label for="email" value="Email" />
                    <x-input id="email" name="email" type="email" class="block mt-1 w-full" :value="old('email')" required autocomplete="username" />
                </div>


                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" value="Password" />
                    <x-input id="password" name="password" type="password" class="block mt-1 w-full" required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" value="Confirm Password" />
                    <x-input id="password_confirmation" name="password_confirmation" type="password" class="block mt-1 w-full" required autocomplete="new-password" />
                </div>
                <!-- Phone -->
            <div class="mt-4">
                <x-label for="phone" value="Phone" />
                <x-input id="phone" name="phone" type="tel" class="block mt-1 w-full" :value="old('phone')" required autocomplete="tel" />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-label for="address" value="Address" />
                <x-input id="address" name="address" type="text" class="block mt-1 w-full" :value="old('address')" required autocomplete="street-address" />
            </div>

                <!-- Register Button -->
                <div class="mt-4">
                    <x-button class="w-full justify-center">
                        Register
                    </x-button>
                </div>
            </form>

            <div style="text-align: center;">
                <span class="auth-switch-btn" onclick="swipeToLogin()">Already registered? Login</span>
            </div>
        </div>

        <script>
            function swipeToLogin() {
                const page = document.getElementById('registerPage');
                page.classList.add('swipe-out');
                setTimeout(() => {
                    window.location.href = "{{ route('login') }}";
                }, 450);
            }
        </script>
    </x-authentication-card>
</x-guest-layout>


