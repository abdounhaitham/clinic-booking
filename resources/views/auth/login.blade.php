<x-guest-layout>
    <h2 style="font-size: 22px; font-weight: 700; color: #0f172a; margin-bottom: 4px;">Welcome back</h2>
    <p style="color: #64748b; font-size: 14px; margin-bottom: 28px;">Login to your ClinicBook account</p>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div style="margin-bottom: 16px;">
            <label style="display: block; font-size: 14px; font-weight: 500; color: #374151; margin-bottom: 6px;">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                style="width: 100%; border: 1.5px solid #e2e8f0; border-radius: 10px; padding: 10px 14px; font-size: 15px; outline: none; box-sizing: border-box; transition: border 0.2s;"
                onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='#e2e8f0'">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div style="margin-bottom: 16px;">
            <label style="display: block; font-size: 14px; font-weight: 500; color: #374151; margin-bottom: 6px;">Password</label>
            <input id="password" type="password" name="password" required
                style="width: 100%; border: 1.5px solid #e2e8f0; border-radius: 10px; padding: 10px 14px; font-size: 15px; outline: none; box-sizing: border-box; transition: border 0.2s;"
                onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='#e2e8f0'">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <label style="display: flex; align-items: center; gap: 8px; font-size: 14px; color: #64748b;">
                <input type="checkbox" name="remember" style="accent-color: #0d9488;">
                Remember me
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="font-size: 14px; color: #0d9488; text-decoration: none; font-weight: 500;">Forgot password?</a>
            @endif
        </div>

        <button type="submit" style="width: 100%; background: #0d9488; color: white; padding: 12px; border-radius: 10px; font-size: 16px; font-weight: 600; border: none; cursor: pointer; transition: background 0.2s;"
            onmouseover="this.style.background='#0f766e'" onmouseout="this.style.background='#0d9488'">
            Login
        </button>

        <p style="text-align: center; margin-top: 20px; font-size: 14px; color: #64748b;">
            Don't have an account? <a href="{{ route('register') }}" style="color: #0d9488; font-weight: 500; text-decoration: none;">Register</a>
        </p>
    </form>
</x-guest-layout>