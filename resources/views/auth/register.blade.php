<x-guest-layout>
    <h2 style="font-size: 22px; font-weight: 700; color: #0f172a; margin-bottom: 4px;">Create an account</h2>
    <p style="color: #64748b; font-size: 14px; margin-bottom: 28px;">Join ClinicBook to book appointments</p>

    <form method="POST" action="{{ route('register') }}" id="registerForm" enctype="multipart/form-data">
        @csrf

        <div style="margin-bottom: 16px;">
            <label style="display: block; font-size: 14px; font-weight: 500; color: #374151; margin-bottom: 6px;">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                style="width: 100%; border: 1.5px solid #e2e8f0; border-radius: 10px; padding: 10px 14px; font-size: 15px; outline: none; box-sizing: border-box;">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div style="margin-bottom: 16px;">
            <label style="display: block; font-size: 14px; font-weight: 500; color: #374151; margin-bottom: 6px;">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                style="width: 100%; border: 1.5px solid #e2e8f0; border-radius: 10px; padding: 10px 14px; font-size: 15px; outline: none; box-sizing: border-box;">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div style="margin-bottom: 16px;">
            <label style="display: block; font-size: 14px; font-weight: 500; color: #374151; margin-bottom: 6px;">Password</label>
            <input id="password" type="password" name="password" required
                style="width: 100%; border: 1.5px solid #e2e8f0; border-radius: 10px; padding: 10px 14px; font-size: 15px; outline: none; box-sizing: border-box;">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-size: 14px; font-weight: 500; color: #374151; margin-bottom: 6px;">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                style="width: 100%; border: 1.5px solid #e2e8f0; border-radius: 10px; padding: 10px 14px; font-size: 15px; outline: none; box-sizing: border-box;">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Doctor Application Toggle -->
        <div style="background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 10px; padding: 14px; margin-bottom: 20px;">
            <label style="display: flex; align-items: center; gap: 10px; font-size: 14px; color: #374151; font-weight: 500; cursor: pointer;">
                <input type="checkbox" id="isDoctor" name="is_doctor" value="1" style="accent-color: #0d9488; width: 16px; height: 16px;" onchange="document.getElementById('doctorFields').style.display = this.checked ? 'block' : 'none'">
                I want to register as a Doctor
            </label>

            <div id="doctorFields" style="display: none; margin-top: 14px;">
                <label style="display: block; font-size: 13px; font-weight: 500; color: #374151; margin-bottom: 6px;">Specialty</label>
                <input type="text" name="specialty" placeholder="e.g. Cardiology"
                    style="width: 100%; border: 1.5px solid #e2e8f0; border-radius: 8px; padding: 9px 12px; font-size: 14px; outline: none; box-sizing: border-box; margin-bottom: 10px;">

                <label style="display: block; font-size: 13px; font-weight: 500; color: #374151; margin-bottom: 6px;">Phone</label>
                <input type="text" name="phone" placeholder="Your phone number"
                    style="width: 100%; border: 1.5px solid #e2e8f0; border-radius: 8px; padding: 9px 12px; font-size: 14px; outline: none; box-sizing: border-box; margin-bottom: 10px;">

                <label style="display: block; font-size: 13px; font-weight: 500; color: #374151; margin-bottom: 6px;">Bio</label>
                <textarea name="bio" rows="2" placeholder="Brief professional bio"
                    style="width: 100%; border: 1.5px solid #e2e8f0; border-radius: 8px; padding: 9px 12px; font-size: 14px; outline: none; box-sizing: border-box;"></textarea>

                <p style="font-size: 12px; color: #94a3b8; margin-top: 8px;">Your doctor application will be reviewed by an admin before approval.</p>
            
                <label style="display: block; font-size: 13px; font-weight: 500; color: #374151; margin-bottom: 6px; margin-top: 10px;">Medical License / ID Card (نقابة الأطباء)</label>
                <input type="file" name="license" accept="image/*"
                    style="width: 100%; border: 1.5px solid #e2e8f0; border-radius: 8px; padding: 9px 12px; font-size: 13px; outline: none; box-sizing: border-box; background: white;">
                <p style="font-size: 11px; color: #94a3b8; margin-top: 4px;">Upload a clear photo of your medical license card</p>
            </div>
        </div>

        <button type="submit" style="width: 100%; background: #0d9488; color: white; padding: 12px; border-radius: 10px; font-size: 16px; font-weight: 600; border: none; cursor: pointer;">
            Register
        </button>

        <p style="text-align: center; margin-top: 20px; font-size: 14px; color: #64748b;">
            Already have an account? <a href="{{ route('login') }}" style="color: #0d9488; font-weight: 500; text-decoration: none;">Login</a>
        </p>
    </form>
</x-guest-layout>