<style>
body {
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f3f4f6; /* Light gray background */
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

/* Existing swipe animations */
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
    <div class="card swipe-container" id="loginPage">
        <h2 style="text-align: center; font-size: 24px; color: #1e3a8a;">Login</h2>

        <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div class="mt-4">
        <x-label for="email" value="Email" />
        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-label for="password" value="Password" />
        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
    </div>

    <!-- Login Button -->
    <div class="mt-4">
        <x-button class="w-full justify-center">
            Log In
        </x-button>
    </div>
</form>

        <div style="text-align: center;">
            <span class="auth-switch-btn" onclick="swipeToRegister()">New here? Register</span>
        </div>
    </div>

    <script>
        function swipeToRegister() {
            const page = document.getElementById('loginPage');
            page.classList.add('swipe-out');
            setTimeout(() => {
                window.location.href = "{{ route('register') }}";
            }, 450);
        }
    </script>
    </x-authentication-card>
</x-guest-layout>


