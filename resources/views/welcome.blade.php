<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClinicBook</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f8fafc; }
        .hero-bg { background: linear-gradient(135deg, #f0fdf8 0%, #e6f7f2 50%, #f0f9ff 100%); }
        .btn-primary { background: #0d9488; color: white; padding: 14px 32px; border-radius: 10px; font-weight: 600; font-size: 16px; text-decoration: none; transition: background 0.2s; }
        .btn-primary:hover { background: #0f766e; }
        .btn-secondary { background: white; color: #374151; padding: 14px 32px; border-radius: 10px; font-weight: 600; font-size: 16px; text-decoration: none; border: 1.5px solid #e5e7eb; transition: all 0.2s; }
        .btn-secondary:hover { border-color: #0d9488; color: #0d9488; }
        .feature-card { background: white; border-radius: 16px; padding: 32px; border: 1px solid #f1f5f9; transition: box-shadow 0.2s; }
        .feature-card:hover { box-shadow: 0 8px 30px rgba(0,0,0,0.08); }
        .stat-card { background: white; border-radius: 12px; padding: 24px; text-align: center; border: 1px solid #f1f5f9; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav style="background: white; border-bottom: 1px solid #f1f5f9; padding: 16px 48px; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 100;">
        <div style="display: flex; align-items: center; gap: 10px;">
            <div style="width: 36px; height: 36px; background: #0d9488; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                <svg width="20" height="20" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
            </div>
            <span style="font-size: 20px; font-weight: 700; color: #0f766e;">ClinicBook</span>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="/login" style="color: #374151; font-weight: 500; text-decoration: none; padding: 10px 20px; border-radius: 8px; transition: color 0.2s;" onmouseover="this.style.color='#0d9488'" onmouseout="this.style.color='#374151'">Login</a>
            <a href="/register" class="btn-primary" style="padding: 10px 24px; font-size: 15px;">Get Started</a>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero-bg" style="padding: 80px 48px;">
        <div style="max-width: 1100px; margin: 0 auto; display: flex; align-items: center; gap: 80px;">
            <div style="flex: 1;">
                <span style="background: #ccfbf1; color: #0f766e; font-size: 13px; font-weight: 600; padding: 6px 14px; border-radius: 20px; letter-spacing: 0.5px;">ONLINE CLINIC BOOKING</span>
                <h1 style="font-size: 52px; font-weight: 700; color: #0f172a; margin: 20px 0 16px; line-height: 1.15;">Book Your Doctor<br><span style="color: #0d9488;">Appointment</span> Online</h1>
                <p style="color: #64748b; font-size: 18px; line-height: 1.7; margin-bottom: 36px; max-width: 480px;">Fast, simple, and secure appointment scheduling. Connect with top doctors and manage your health with ease.</p>
                <div style="display: flex; gap: 16px; flex-wrap: wrap;">
                    <a href="/register" class="btn-primary">Book an Appointment</a>
                    <a href="/login" class="btn-secondary">Login to Dashboard</a>
                </div>
                <div style="display: flex; gap: 32px; margin-top: 40px;">
                    <div>
                        <p style="font-size: 24px; font-weight: 700; color: #0f172a; margin: 0;">500+</p>
                        <p style="font-size: 13px; color: #94a3b8; margin: 4px 0 0;">Appointments Booked</p>
                    </div>
                    <div style="width: 1px; background: #e2e8f0;"></div>
                    <div>
                        <p style="font-size: 24px; font-weight: 700; color: #0f172a; margin: 0;">50+</p>
                        <p style="font-size: 13px; color: #94a3b8; margin: 4px 0 0;">Specialist Doctors</p>
                    </div>
                    <div style="width: 1px; background: #e2e8f0;"></div>
                    <div>
                        <p style="font-size: 24px; font-weight: 700; color: #0f172a; margin: 0;">98%</p>
                        <p style="font-size: 13px; color: #94a3b8; margin: 4px 0 0;">Patient Satisfaction</p>
                    </div>
                </div>
            </div>
            <div style="flex: 1; display: flex; justify-content: center;">
                <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?w=500&q=80" alt="Doctor" style="width: 100%; max-width: 460px; border-radius: 20px; object-fit: cover; height: 420px; box-shadow: 0 20px 60px rgba(0,0,0,0.12);">
            </div>
        </div>
    </section>

    <!-- Features -->
    <section style="padding: 80px 48px; max-width: 1100px; margin: 0 auto;">
        <div style="text-align: center; margin-bottom: 56px;">
            <h2 style="font-size: 36px; font-weight: 700; color: #0f172a; margin-bottom: 12px;">Why Choose ClinicBook?</h2>
            <p style="color: #64748b; font-size: 17px;">Everything you need for a seamless healthcare experience</p>
        </div>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
            <div class="feature-card">
                <div style="width: 52px; height: 52px; background: #f0fdf8; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                    <svg width="26" height="26" fill="none" stroke="#0d9488" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 style="font-size: 18px; font-weight: 600; color: #0f172a; margin-bottom: 10px;">Easy Booking</h3>
                <p style="color: #64748b; font-size: 15px; line-height: 1.6;">Book appointments in minutes with your preferred specialist doctor.</p>
            </div>
            <div class="feature-card">
                <div style="width: 52px; height: 52px; background: #f0fdf8; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                    <svg width="26" height="26" fill="none" stroke="#0d9488" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 style="font-size: 18px; font-weight: 600; color: #0f172a; margin-bottom: 10px;">Instant Confirmation</h3>
                <p style="color: #64748b; font-size: 15px; line-height: 1.6;">Get your appointment confirmed by your doctor quickly and reliably.</p>
            </div>
            <div class="feature-card">
                <div style="width: 52px; height: 52px; background: #f0fdf8; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                    <svg width="26" height="26" fill="none" stroke="#0d9488" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <h3 style="font-size: 18px; font-weight: 600; color: #0f172a; margin-bottom: 10px;">Secure & Private</h3>
                <p style="color: #64748b; font-size: 15px; line-height: 1.6;">Your medical data is fully encrypted and protected at all times.</p>
            </div>
            <div class="feature-card">
                <div style="width: 52px; height: 52px; background: #f0fdf8; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                    <svg width="26" height="26" fill="none" stroke="#0d9488" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h3 style="font-size: 18px; font-weight: 600; color: #0f172a; margin-bottom: 10px;">Top Specialists</h3>
                <p style="color: #64748b; font-size: 15px; line-height: 1.6;">Access a network of verified and experienced specialist doctors.</p>
            </div>
            <div class="feature-card">
                <div style="width: 52px; height: 52px; background: #f0fdf8; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                    <svg width="26" height="26" fill="none" stroke="#0d9488" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 style="font-size: 18px; font-weight: 600; color: #0f172a; margin-bottom: 10px;">24/7 Availability</h3>
                <p style="color: #64748b; font-size: 15px; line-height: 1.6;">Book appointments anytime, day or night, at your convenience.</p>
            </div>
            <div class="feature-card">
                <div style="width: 52px; height: 52px; background: #f0fdf8; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                    <svg width="26" height="26" fill="none" stroke="#0d9488" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <h3 style="font-size: 18px; font-weight: 600; color: #0f172a; margin-bottom: 10px;">Track History</h3>
                <p style="color: #64748b; font-size: 15px; line-height: 1.6;">Keep track of all your past and upcoming appointments in one place.</p>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section style="background: #0d9488; padding: 64px 48px; text-align: center; margin: 0 48px 80px; border-radius: 24px; max-width: 1004px; margin: 0 auto 80px;">
        <h2 style="font-size: 36px; font-weight: 700; color: white; margin-bottom: 12px;">Ready to Get Started?</h2>
        <p style="color: #ccfbf1; font-size: 17px; margin-bottom: 32px;">Join thousands of patients who trust ClinicBook for their healthcare needs.</p>
        <a href="/register" style="background: white; color: #0d9488; padding: 14px 36px; border-radius: 10px; font-weight: 600; font-size: 16px; text-decoration: none;">Create Free Account</a>
    </section>

    <!-- Footer -->
    <footer style="border-top: 1px solid #f1f5f9; padding: 32px 48px; text-align: center; color: #94a3b8; font-size: 14px;">
        © 2026 ClinicBook. All rights reserved.
    </footer>

</body>
</html>