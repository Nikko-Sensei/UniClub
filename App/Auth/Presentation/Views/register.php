<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>University Club Registration</title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <script src="https://unpkg.com/lucide@latest">
    </script>
</head>


<body>


    <main class="min-h-screen flex items-center justify-center px-4 py-4">

        <div class="w-full max-w-2xl">

            <div class="bg-white rounded-2xl shadow border border-slate-200 overflow-hidden">

                <!-- Header -->
                <div
                    class="px-6 py-5 text-center bg-gradient-to-br from-slate-50 to-blue-50/50 border-b border-slate-200">
                    <div
                        class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-white shadow-md">
                        <i data-lucide="graduation-cap" class="h-6 w-6"></i>
                    </div>
                    <h1 class="mt-2 text-xl font-bold text-slate-800 tracking-tight">
                        Join your university club community
                    </h1>
                    <p class="mt-0.5 text-xs text-slate-500 flex items-center justify-center gap-1.5">
                        <span class="inline-block w-1 h-1 rounded-full bg-blue-500"></span>
                        UniClub Computer University Portal
                    </p>
                </div>

                <!-- ============================================================ -->
                <!--  FORM — each field now shows its own error directly underneath -->
                <!-- ============================================================ -->
                <form action="<?= BASE_URL ?>/register" method="POST" class="px-6 py-5 space-y-3.5">

                    <?= $csrf->hiddenField(); ?>

                    <!-- ======== FULL NAME ======== -->
                    <div>
                        <label class="text-xs font-semibold text-slate-700 flex items-center gap-1.5">
                            <i data-lucide="user" class="h-3.5 w-3.5 text-blue-500"></i>
                            Full Name
                        </label>
                        <input type="text" name="name" value="<?= htmlspecialchars($old['name'] ?? '') ?>"
                            placeholder="Enter your full name"
                            class="mt-1 w-full h-10 rounded-lg border border-slate-300 px-3.5 text-sm bg-white outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 <?= isset($errors['name']) ? 'border-red-500 focus:border-red-500 focus:ring-red-100' : '' ?>" />

                        <!-- error for "name" -->
                        <?php if (isset($errors['name'])): ?>
                        <p class="mt-1 text-xs text-red-600 flex items-center gap-1">
                            <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>
                            <?= htmlspecialchars(is_array($errors['name']) ? implode(', ', $errors['name']) : $errors['name']) ?>
                        </p>
                        <?php endif; ?>
                    </div>

                    <!-- ======== STUDENT ID + PHONE ======== -->
                    <div class="grid md:grid-cols-2 gap-4">

                        <!-- Student ID -->
                        <div>
                            <label class="text-xs font-semibold text-slate-700 flex items-center gap-1.5">
                                <i data-lucide="id-card" class="h-3.5 w-3.5 text-blue-500"></i>
                                Student ID
                            </label>
                            <input type="text" name="student_id"
                                value="<?= htmlspecialchars($old['student_id'] ?? '') ?>" placeholder="CST-1 or 2CS-1"
                                class="mt-1 h-10 w-full rounded-lg border border-slate-300 px-3.5 text-sm bg-white outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 <?= isset($errors['student_id']) ? 'border-red-500 focus:border-red-500 focus:ring-red-100' : '' ?>" />

                            <?php if (isset($errors['student_id'])): ?>
                            <p class="mt-1 text-xs text-red-600 flex items-center gap-1">
                                <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>
                                <?= htmlspecialchars(is_array($errors['student_id']) ? implode(', ', $errors['student_id']) : $errors['student_id']) ?>
                            </p>
                            <?php endif; ?>
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="text-xs font-semibold text-slate-700 flex items-center gap-1.5">
                                <i data-lucide="phone" class="h-3.5 w-3.5 text-blue-500"></i>
                                Phone
                            </label>
                            <input type="text" name="phone" value="<?= htmlspecialchars($old['phone'] ?? '') ?>"
                                placeholder="09xxxxxxxxx"
                                class="mt-1 h-10 w-full rounded-lg border border-slate-300 px-3.5 text-sm bg-white outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 <?= isset($errors['phone']) ? 'border-red-500 focus:border-red-500 focus:ring-red-100' : '' ?>" />

                            <?php if (isset($errors['phone'])): ?>
                            <p class="mt-1 text-xs text-red-600 flex items-center gap-1">
                                <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>
                                <?= htmlspecialchars(is_array($errors['phone']) ? implode(', ', $errors['phone']) : $errors['phone']) ?>
                            </p>
                            <?php endif; ?>
                        </div>

                    </div>

                    <!-- ======== ACADEMIC YEAR + DEPARTMENT ======== -->
                    <div class="grid md:grid-cols-2 gap-4">

                        <!-- Academic Year -->
                        <div>
                            <label class="text-xs font-semibold text-slate-700 flex items-center gap-1.5">
                                <i data-lucide="calendar" class="h-3.5 w-3.5 text-blue-500"></i>
                                Academic Year
                            </label>
                            <select name="academic_year_id"
                                class="mt-1 h-10 w-full rounded-lg border border-slate-300 px-3.5 text-sm bg-white outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 <?= isset($errors['academic_year_id']) ? 'border-red-500 focus:border-red-500 focus:ring-red-100' : '' ?>">
                                <option value="">Select Year</option>
                                <?php foreach ($academicYears as $year): ?>
                                <option value="<?= $year['id'] ?>"
                                    <?= ($old['academic_year_id'] ?? '') == $year['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($year['name']) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>

                            <?php if (isset($errors['academic_year_id'])): ?>
                            <p class="mt-1 text-xs text-red-600 flex items-center gap-1">
                                <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>
                                <?= htmlspecialchars(is_array($errors['academic_year_id']) ? implode(', ', $errors['academic_year_id']) : $errors['academic_year_id']) ?>
                            </p>
                            <?php endif; ?>
                        </div>

                        <!-- Department -->
                        <div>
                            <label class="text-xs font-semibold text-slate-700 flex items-center gap-1.5">
                                <i data-lucide="building" class="h-3.5 w-3.5 text-blue-500"></i>
                                Department
                            </label>
                            <select name="department_id"
                                class="mt-1 h-10 w-full rounded-lg border border-slate-300 px-3.5 text-sm bg-white outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 <?= isset($errors['department_id']) ? 'border-red-500 focus:border-red-500 focus:ring-red-100' : '' ?>">
                                <option value="">Select Department</option>
                                <?php foreach ($departments as $dept): ?>
                                <option value="<?= $dept['id'] ?>"
                                    <?= ($old['department_id'] ?? '') == $dept['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($dept['name']) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>

                            <?php if (isset($errors['department_id'])): ?>
                            <p class="mt-1 text-xs text-red-600 flex items-center gap-1">
                                <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>
                                <?= htmlspecialchars(is_array($errors['department_id']) ? implode(', ', $errors['department_id']) : $errors['department_id']) ?>
                            </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- ======== EMAIL ======== -->
                    <div>
                        <label class="text-xs font-semibold text-slate-700 flex items-center gap-1.5">
                            <i data-lucide="mail" class="h-3.5 w-3.5 text-blue-500"></i>
                            Email
                        </label>
                        <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>"
                            placeholder="student@university.edu"
                            class="mt-1 h-10 w-full rounded-lg border border-slate-300 px-3.5 text-sm bg-white outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 <?= isset($errors['email']) ? 'border-red-500 focus:border-red-500 focus:ring-red-100' : '' ?>" />

                        <?php if (isset($errors['email'])): ?>
                        <p class="mt-1 text-xs text-red-600 flex items-center gap-1">
                            <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>
                            <?= htmlspecialchars(is_array($errors['email']) ? implode(', ', $errors['email']) : $errors['email']) ?>
                        </p>
                        <?php endif; ?>
                    </div>

                    <!-- ======== PASSWORD + CONFIRM ======== -->
                    <div class="grid md:grid-cols-2 gap-4">

                        <!-- Password -->
                        <div>
                            <label class="text-xs font-semibold text-slate-700 flex items-center gap-1.5">
                                <i data-lucide="lock" class="h-3.5 w-3.5 text-blue-500"></i>
                                Password
                            </label>
                            <input type="password" name="password" placeholder="Min 8 chars, 1 letter, 1 number"
                                class="mt-1 h-10 w-full rounded-lg border border-slate-300 px-3.5 text-sm bg-white outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 <?= isset($errors['password']) ? 'border-red-500 focus:border-red-500 focus:ring-red-100' : '' ?>" />

                            <?php if (isset($errors['password'])): ?>
                            <p class="mt-1 text-xs text-red-600 flex items-center gap-1">
                                <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>
                                <?= htmlspecialchars(is_array($errors['password']) ? implode(', ', $errors['password']) : $errors['password']) ?>
                            </p>
                            <?php endif; ?>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label class="text-xs font-semibold text-slate-700 flex items-center gap-1.5">
                                <i data-lucide="check-circle" class="h-3.5 w-3.5 text-blue-500"></i>
                                Confirm Password
                            </label>
                            <input type="password" name="password_confirmation" placeholder="Repeat your password"
                                class="mt-1 h-10 w-full rounded-lg border border-slate-300 px-3.5 text-sm bg-white outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 <?= isset($errors['password_confirmation']) ? 'border-red-500 focus:border-red-500 focus:ring-red-100' : '' ?>" />

                            <?php if (isset($errors['password_confirmation'])): ?>
                            <p class="mt-1 text-xs text-red-600 flex items-center gap-1">
                                <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>
                                <?= htmlspecialchars(is_array($errors['password_confirmation']) ? implode(', ', $errors['password_confirmation']) : $errors['password_confirmation']) ?>
                            </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- ======== SUBMIT ======== -->
                    <button type="submit"
                        class="h-10 w-full rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow transition focus:ring-4 focus:ring-blue-200 flex items-center justify-center gap-2 text-sm">
                        <span>Create Account</span>
                        <i data-lucide="arrow-right" class="h-4 w-4"></i>
                    </button>

                </form>

                <!-- Footer -->
                <div class="border-t bg-slate-50 py-3 text-center text-xs text-slate-600">
                    Already have an account?
                    <a href="<?= BASE_URL ?>/login"
                        class="ml-1 font-semibold text-blue-700 hover:text-blue-900 transition">
                        Sign In
                    </a>
                </div>

            </div>
        </div>

    </main>

    <script>
    lucide.createIcons();
    </script>

</body>

</html>