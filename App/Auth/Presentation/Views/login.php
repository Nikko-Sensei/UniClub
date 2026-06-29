<main class="min-h-screen bg-[#eef4f1] text-slate-900">
    <section class="grid min-h-screen lg:grid-cols-[1.05fr_0.95fr]">
        <aside class="relative hidden overflow-hidden lg:block">
            <img src="<?= BASE_URL ?>/Assets/images/campus-hero.jpg" alt="Campus students"
                class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute inset-0 bg-slate-950/45"></div>

            <div class="relative z-10 flex h-full flex-col justify-between p-12 text-white">
                <a href="<?= BASE_URL ?>/" class="inline-flex w-fit items-center gap-3 text-lg font-semibold">
                    <span class="grid h-11 w-11 place-items-center rounded-md bg-white text-blue-600">
                        <i data-lucide="graduation-cap" class="h-6 w-6"></i>
                    </span>
                    UniClub
                </a>

                <div class="max-w-xl">
                    <p class="mb-5 inline-flex rounded-md bg-white/15 px-4 py-2 text-sm font-semibold backdrop-blur">
                        Campus life, organized
                    </p>
                    <h1 class="text-5xl font-bold leading-tight">
                        Step back into your club community.
                    </h1>
                    <p class="mt-5 text-lg leading-8 text-blue-50">
                        Track events, manage memberships, and stay connected with the groups that make university feel
                        alive.
                    </p>
                </div>
            </div>
        </aside>

        <section class="flex items-center justify-center px-5 py-10 sm:px-8">
            <div class="w-full max-w-md">
                <div class="mb-8 lg:hidden">
                    <a href="<?= BASE_URL ?>/" class="inline-flex items-center gap-3 text-lg font-semibold">
                        <span class="grid h-11 w-11 place-items-center rounded-md bg-blue-600 text-white">
                            <i data-lucide="graduation-cap" class="h-6 w-6"></i>
                        </span>
                        UniClub
                    </a>
                </div>

                <div class="mb-8">
                    <p class="text-sm font-semibold uppercase text-slate-600">Welcome Back</p>
                    <h2 class="mt-3 text-4xl font-bold text-slate-950">Sign in to continue</h2>
                    <p class="mt-3 text-slate-600">Sign in with your UniClub account to manage clubs, events, and
                        activities.</p>
                </div>

                <?php if (!empty($errors)): ?>
                <div class="mb-5 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    <?php foreach ($errors as $error): ?>
                    <p><?= htmlspecialchars(is_array($error) ? implode(', ', $error) : $error) ?></p>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <form action="<?= BASE_URL ?>/login" method="POST" class="space-y-5">
                    <?= $csrf->hiddenField(); ?>

                    <input type="hidden" name="redirect" value="<?= htmlspecialchars($redirect) ?>">

                    <label class="block">
                        <span class="text-sm font-semibold text-slate-700">Email</span>
                        <span class="relative mt-2 block">
                            <i data-lucide="mail"
                                class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"></i>
                            <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>"
                                class="h-12 w-full rounded-md border border-slate-300 bg-white pl-11 pr-4 text-slate-900 outline-none transition focus:border-blue-700 focus:ring-4 focus:ring-blue-100"
                                placeholder="student@university.edu" required>
                        </span>
                    </label>

                    <label class="block">
                        <span class="text-sm font-semibold text-slate-700">Password</span>
                        <span class="relative mt-2 block">
                            <i data-lucide="lock"
                                class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"></i>
                            <input id="password" type="password" name="password"
                                class="h-12 w-full rounded-md border border-slate-300 bg-white pl-11 pr-12 text-slate-900 outline-none transition focus:border-blue-700 focus:ring-4 focus:ring-blue-100"
                                placeholder="Enter your password" required>
                            <button type="button" onclick="togglePassword()"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-500 hover:text-lueb-600"
                                aria-label="Show password">
                                <i data-lucide="eye" class="h-5 w-5"></i>
                            </button>
                        </span>
                    </label>

                    <div class="flex items-center justify-between gap-4 text-sm">
                        <label class="inline-flex items-center gap-2 text-slate-600">
                            <input type="checkbox" class="rounded border-slate-300 text-blue-600 focus:ring-blue-600">
                            Remember me
                        </label>
                        <a href="#" class="font-semibold text-blue-600 hover:text-blue-700">Forgot password?</a>
                    </div>

                    <button type="submit"
                        class="inline-flex h-12 w-full items-center justify-center gap-2 rounded-md bg-blue-600 px-5 font-semibold text-white transition hover:bg-blue-700">
                        <i data-lucide="log-in" class="h-5 w-5"></i>
                        Sign in
                    </button>
                </form>

                <p class="mt-8 text-center text-sm text-slate-600">
                    New to UniClub?
                    <a href="<?= BASE_URL ?>/register" class="font-semibold text-blue-600 hover:text-blue-700">
                        Create an account
                    </a>
                </p>
            </div>
        </section>
    </section>
</main>

<script>
function togglePassword() {
    const input = document.getElementById('password');
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>