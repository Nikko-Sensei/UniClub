<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UniClub · Login</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com">
    </script>

    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap"
        rel="stylesheet" />

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest">
    </script>

    <style>
    /* ── Base ── */
    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: #F8FAFC;
        color: #0F172A;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* ── Glass Card ── */
    .glass-card {
        background: rgba(255, 255, 255, 0.72);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
    }

    /* ── Animations ── */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(16px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-8px);
        }
    }

    @keyframes pulseGlow {

        0%,
        100% {
            opacity: 0.3;
            transform: scale(1);
        }

        50% {
            opacity: 0.8;
            transform: scale(1.1);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.6s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animate-pulseGlow {
        animation: pulseGlow 4s ease-in-out infinite;
    }

    /* ── Button Shine ── */
    .btn-shine {
        position: relative;
        overflow: hidden;
    }

    .btn-shine::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .btn-shine:hover::before {
        left: 100%;
    }

    /* ── Input focus ── */
    .input-focus:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
    }

    /* ── Scrollbar ── */
    ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
    }

    ::-webkit-scrollbar-track {
        background: transparent;
    }

    ::-webkit-scrollbar-thumb {
        background: #CBD5E1;
        border-radius: 9999px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #94A3B8;
    }

    /* ── Focus states ── */
    *:focus-visible {
        outline: 2px solid #2563EB;
        outline-offset: 2px;
        border-radius: 4px;
    }

    /* ── Hero image overlay gradient ── */
    .hero-overlay {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.85) 0%, rgba(15, 23, 42, 0.4) 60%, rgba(15, 23, 42, 0.15) 100%);
    }
    </style>
</head>

<body>

    <main class="min-h-screen bg-slate-50 flex items-center justify-center p-4 sm:p-6">

        <div class="w-full max-w-6xl grid grid-cols-1 lg:grid-cols-[1.05fr_0.95fr] gap-6 lg:gap-0">

            <!-- ========================================================== -->
            <!-- LEFT – Hero Panel (hidden on mobile)                      -->
            <!-- ========================================================== -->
            <div class="hidden lg:block relative rounded-2xl overflow-hidden min-h-[580px] shadow-2xl">

                <!-- Background Image -->
                <img src="<?= BASE_URL ?>/Assets/images/campus-hero.jpg" alt="University Campus"
                    class="absolute inset-0 w-full h-full object-cover" loading="lazy" />

                <!-- Overlay -->
                <div class="absolute inset-0 hero-overlay"></div>

                <!-- Decorative glow orbs -->
                <div class="absolute top-10 right-10 w-48 h-48 bg-blue-500/20 rounded-full blur-3xl animate-pulseGlow">
                </div>
                <div class="absolute bottom-10 left-10 w-64 h-64 bg-indigo-500/20 rounded-full blur-3xl animate-pulseGlow"
                    style="animation-delay: 1.5s;"></div>

                <!-- Content -->
                <div class="relative z-10 flex h-full flex-col justify-between p-10 text-white">

                    <!-- Logo -->
                    <a href="<?= BASE_URL ?>/" class="inline-flex w-fit items-center gap-3 text-lg font-semibold group">
                        <span
                            class="grid h-11 w-11 place-items-center rounded-xl bg-white/10 backdrop-blur-sm text-white border border-white/20 transition-all group-hover:bg-white/20">
                            <i data-lucide="graduation-cap" class="h-6 w-6"></i>
                        </span>
                        <span class="text-white/90">UniClub</span>
                    </a>

                    <!-- Hero Text -->
                    <div class="max-w-xl animate-fadeInUp">
                        <p
                            class="mb-5 inline-flex rounded-full bg-white/10 backdrop-blur-sm px-4 py-2 text-sm font-semibold border border-white/10">
                            <span
                                class="w-1.5 h-1.5 rounded-full bg-emerald-400 inline-block mr-2 mt-1.5 animate-pulse"></span>
                            Campus life, organized
                        </p>
                        <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight">
                            Step back into your
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-indigo-200">club
                                community</span>.
                        </h1>
                        <p class="mt-4 text-lg leading-7 text-blue-100/80">
                            Track events, manage memberships, and stay connected with the groups that make university
                            feel alive.
                        </p>
                    </div>
                </div>

            </div>

            <!-- ========================================================== -->
            <!-- RIGHT – Login Form                                        -->
            <!-- ========================================================== -->
            <div class="flex items-center justify-center px-4 py-8 sm:px-6">

                <div class="w-full max-w-md">

                    <!-- Mobile Logo (visible only on small screens) -->
                    <div class="mb-8 lg:hidden text-center">
                        <a href="<?= BASE_URL ?>/"
                            class="inline-flex items-center gap-3 text-xl font-bold text-slate-800">
                            <span class="grid h-11 w-11 place-items-center rounded-xl bg-blue-600 text-white shadow-md">
                                <i data-lucide="graduation-cap" class="h-6 w-6"></i>
                            </span>
                            UniClub
                        </a>
                    </div>

                    <!-- ===== GLASS CARD ===== -->
                    <div class="glass-card rounded-2xl p-6 sm:p-8 animate-fadeInUp">

                        <!-- Header -->
                        <div class="mb-7">
                            <p class="text-xs font-semibold uppercase tracking-wider text-blue-600">Welcome Back</p>
                            <h2 class="mt-2 text-2xl font-bold text-slate-900">Sign in to continue</h2>
                            <p class="mt-1 text-sm text-slate-500">Manage clubs, events, and activities.</p>
                        </div>

                        <!-- Success Flash -->
                        <?php if (!empty($success)): ?>
                        <div
                            class="mb-4 rounded-xl bg-emerald-50 border border-emerald-200 px-4 py-3 text-sm text-emerald-700 flex items-center gap-2">
                            <i data-lucide="check-circle" class="h-4 w-4"></i>
                            <?= htmlspecialchars($success) ?>
                        </div>
                        <?php endif; ?>

                        <!-- Error Messages -->
                        <?php if (!empty($errors)): ?>
                        <div
                            class="mb-4 rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700 space-y-1">
                            <?php foreach ($errors as $error): ?>
                            <p class="flex items-center gap-2">
                                <i data-lucide="alert-circle" class="h-4 w-4"></i>
                                <?= htmlspecialchars(is_array($error) ? implode(', ', $error) : $error) ?>
                            </p>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                        <!-- Form -->
                        <form action="<?= BASE_URL ?>/login" method="POST" class="space-y-5">
                            <?= $csrf->hiddenField(); ?>
                            <input type="hidden" name="redirect" value="<?= htmlspecialchars($redirect) ?>">

                            <!-- Email -->
                            <label class="block">
                                <span class="text-sm font-medium text-slate-700">Email</span>
                                <span class="relative mt-1.5 block">
                                    <span class="absolute left-3 inset-y-0 flex items-center">
                                        <i data-lucide="mail" class="w-5 h-5 text-slate-400"></i>
                                    </span>

                                    <input type="email" name="email"
                                        value="<?= htmlspecialchars($old['email'] ?? '') ?>"
                                        class="peer h-12 w-full rounded-xl border border-slate-200/80 bg-white/50 pl-11 pr-4"
                                        placeholder="student@university.edu">
                                </span>
                            </label>

                            <!-- Password -->
                            <label class="block">
                                <span class="text-sm font-medium text-slate-700">Password</span>

                                <span class="relative mt-1.5 block">

                                    <!-- Left Icon -->
                                    <span class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                                        <i data-lucide="lock" class="w-5 h-5 text-slate-400"></i>
                                    </span>

                                    <!-- Input -->
                                    <input id="password" type="password" name="password"
                                        class="peer h-12 w-full rounded-xl border border-slate-200/80 bg-white/50 pl-11 pr-12 text-slate-900 placeholder:text-slate-400 input-focus transition"
                                        placeholder="Enter your password" required>

                                    <!-- Toggle Password -->
                                    <button type="button" onclick="togglePassword()"
                                        class="absolute inset-y-0 right-3 flex items-center text-slate-400 hover:text-slate-600 transition">
                                        <i id="passwordIcon" data-lucide="eye" class="w-5 h-5"></i>
                                    </button>

                                </span>
                            </label>

                            <!-- Remember me + Forgot password -->
                            <div class="flex items-center justify-between gap-4 text-sm">
                                <label
                                    class="inline-flex items-center gap-2 text-slate-600 cursor-pointer hover:text-slate-800 transition">
                                    <input type="checkbox"
                                        class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 focus:ring-2">
                                    Remember me
                                </label>
                                <a href="<?= BASE_URL ?>/forgot-password"
                                    class="font-semibold text-blue-600 hover:text-blue-700 transition">
                                    Forgot password?
                                </a>
                            </div>

                            <!-- Submit -->
                            <button type="submit"
                                class="inline-flex h-12 w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 px-5 font-semibold text-white transition-all duration-300 shadow-md shadow-blue-200/50 hover:shadow-xl hover:scale-[1.02] btn-shine">
                                <i data-lucide="log-in" class="h-5 w-5"></i>
                                Sign in
                            </button>
                        </form>

                        <!-- Register Link -->
                        <p class="mt-6 text-center text-sm text-slate-600">
                            New to UniClub?
                            <a href="<?= BASE_URL ?>/register"
                                class="font-semibold text-blue-600 hover:text-blue-700 transition">
                                Create an account
                            </a>
                        </p>
                    </div>

                    <!-- Footer note -->
                    <p class="mt-6 text-center text-xs text-slate-400">
                        &copy; <?= date('Y') ?> UniClub. All rights reserved.
                    </p>
                </div>

            </div>

        </div>

    </main>

    <!-- ── Scripts ── -->
    <script>
    // ── Toggle Password Visibility ──
    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.getElementById('passwordIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.setAttribute('data-lucide', 'eye-off');
        } else {
            input.type = 'password';
            icon.setAttribute('data-lucide', 'eye');
        }
        lucide.createIcons();
    }

    // ── Lucide Icons ──
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        // ── Auto-dismiss flash messages ──
        const flash = document.querySelector('.flash-success');
        if (flash) {
            setTimeout(() => {
                flash.style.transition = 'opacity 0.5s';
                flash.style.opacity = '0';
                setTimeout(() => flash.remove(), 500);
            }, 5000);
        }
    });
    </script>

</body>

</html>