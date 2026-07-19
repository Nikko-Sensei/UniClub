<?php
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']); // clear after showing once
?>

<div class="max-w-7xl mx-auto px-4 md:px-6 py-8 w-full bg-mesh min-h-screen">

    <!-- ========================================================== -->
    <!-- BACK BUTTON – Glass with slide-in                         -->
    <!-- ========================================================== -->
    <div class="animate-slideInLeft">
        <a href="<?= BASE_URL ?>/profile"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Profile</span>
        </a>
    </div>

    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border mt-5 border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">
        <div class="flex items-center gap-4">
            <div
                class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center shadow-lg shadow-blue-200">
                <i data-lucide="square-pen" class="w-6 h-6"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Edit Profile</h1>
                <p class="text-sm text-slate-500">Update your personal information and profile picture</p>
            </div>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- MAIN CARD – Sidebar + Form                               -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light mt-5 rounded-2xl border border-slate-100/60 shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <div class="grid grid-cols-1 lg:grid-cols-3">

            <!-- ========================================================== -->
            <!-- SIDEBAR – User info                                      -->
            <!-- ========================================================== -->
            <aside class="bg-white/40 backdrop-blur-sm p-6 border-b lg:border-b-0 lg:border-r border-slate-100/60">

                <div class="flex flex-col items-center text-center">

                    <!-- Avatar with ring -->
                    <div class="relative">
                        <div
                            class="w-28 h-28 rounded-full p-1 bg-gradient-to-br from-blue-500 via-indigo-500 to-purple-500 shadow-xl shadow-blue-200/40">
                            <div class="w-full h-full rounded-full overflow-hidden bg-white/10 backdrop-blur-sm">
                                <?php if (!empty($user->getProfileImage())): ?>
                                <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars($user->getProfileImage()) ?>"
                                    class="w-full h-full object-cover" alt="Profile">
                                <?php else: ?>
                                <div
                                    class="w-full h-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center text-blue-700 text-3xl font-bold">
                                    <?php
                                        $name = trim($user->getName());
                                        $words = preg_split('/\s+/', $name);
                                        if (count($words) >= 2) {
                                            $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
                                        } else {
                                            $initials = strtoupper(substr($words[0], 0, 1));
                                        }
                                        echo htmlspecialchars($initials);
                                    ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Status dot -->
                        <span
                            class="absolute bottom-1 right-1 w-4 h-4 bg-emerald-500 border-2 border-white rounded-full shadow-md animate-pulse"></span>
                    </div>

                    <h2 class="mt-4 text-lg font-bold text-slate-800">
                        <?= htmlspecialchars($user->getName()) ?>
                    </h2>

                    <p class="text-sm text-slate-500">
                        <?= htmlspecialchars($roleName ?? 'Student') ?>
                    </p>

                    <div class="mt-3 text-sm text-slate-600 space-y-1">
                        <p class="flex items-center justify-center gap-2">
                            <i data-lucide="mail" class="w-3.5 h-3.5 text-slate-400"></i>
                            <?= htmlspecialchars($user->getEmail()) ?>
                        </p>
                        <p class="flex items-center justify-center gap-2">
                            <i data-lucide="id-card" class="w-3.5 h-3.5 text-slate-400"></i>
                            <?= htmlspecialchars($user->getStudentId()) ?>
                        </p>
                    </div>

                    <hr class="my-5 w-full border-slate-200/60">

                    <div class="w-full text-sm space-y-3 text-slate-600">
                        <div class="flex justify-between">
                            <span class="text-slate-500">Department</span>
                            <span class="font-medium text-slate-800">
                                <?= htmlspecialchars($departmentName ?? '-') ?>
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Academic Year</span>
                            <span class="font-medium text-slate-800">
                                <?= htmlspecialchars($academicYearName ?? '-') ?>
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-slate-500">Status</span>
                            <span class="px-3 py-1 rounded-full text-xs font-semibold border
                                <?= $user->getStatus() === 'active'
                                    ? 'bg-emerald-50 text-emerald-700 border-emerald-200/50'
                                    : 'bg-red-50 text-red-700 border-red-200/50' ?>">
                                <?= ucfirst($user->getStatus()) ?>
                            </span>
                        </div>
                    </div>

                </div>

            </aside>

            <!-- ========================================================== -->
            <!-- FORM – Glass card                                        -->
            <!-- ========================================================== -->
            <main class="lg:col-span-2 p-6 md:p-8">

                <h2 class="text-xl font-semibold text-slate-800 mb-6 flex items-center gap-2">
                    <i data-lucide="square-pen" class="w-5 h-5 text-blue-600"></i>
                    Update Information
                </h2>

                <form action="<?= BASE_URL ?>/profile/update" method="POST" enctype="multipart/form-data"
                    class="space-y-5">

                    <!-- Full Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 peer-focus:text-blue-500 transition-colors">
                                <i data-lucide="user" class="w-4 h-4"></i>
                            </span>
                            <input type="text" id="name" name="name" value="<?= htmlspecialchars($user->getName()) ?>"
                                class="w-full pl-10 pr-4 py-2.5 border rounded-xl bg-white/50 backdrop-blur-sm peer
                                    <?= isset($errors['name']) ? 'border-red-500' : 'border-slate-200/80' ?>
                                    focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                    transition hover:border-blue-200 text-sm">
                        </div>
                        <?php if (!empty($errors['name'])): ?>
                        <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                            <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i>
                            <?= $errors['name'] ?>
                        </p>
                        <?php endif; ?>
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-slate-700 mb-1.5">
                            Phone Number
                        </label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 peer-focus:text-blue-500 transition-colors">
                                <i data-lucide="phone" class="w-4 h-4"></i>
                            </span>
                            <input type="text" id="phone" name="phone"
                                value="<?= htmlspecialchars($user->getPhone() ?? '') ?>" class="w-full pl-10 pr-4 py-2.5 border rounded-xl bg-white/50 backdrop-blur-sm peer
                                    <?= isset($errors['phone']) ? 'border-red-500' : 'border-slate-200/80' ?>
                                    focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                    transition hover:border-blue-200 text-sm">
                        </div>
                        <?php if (!empty($errors['phone'])): ?>
                        <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                            <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i>
                            <?= $errors['phone'] ?>
                        </p>
                        <?php endif; ?>
                    </div>

                    <!-- Profile Image -->
                    <div>
                        <label for="profile_image" class="block text-sm font-medium text-slate-700 mb-1.5">
                            Profile Image
                        </label>
                        <div class="relative">
                            <input type="file" id="profile_image" name="profile_image" class="w-full px-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm
                                    focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                    transition hover:border-blue-200 text-sm
                                    file:mr-4 file:py-1.5 file:px-4 file:rounded-lg file:border-0
                                    file:bg-blue-50 file:text-blue-700 file:text-sm file:font-medium
                                    hover:file:bg-blue-100">
                        </div>
                        <?php if (!empty($errors['profile_image'])): ?>
                        <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                            <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i>
                            <?= $errors['profile_image'] ?>
                        </p>
                        <?php endif; ?>
                        <p class="text-xs text-slate-400 mt-1">
                            Recommended: Square image, max 2MB (JPEG, PNG, GIF)
                        </p>
                    </div>

                    <!-- Readonly Department & Year -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                Department
                            </label>
                            <input type="text" value="<?= htmlspecialchars($departmentName ?? '-') ?>" disabled
                                class="w-full px-4 py-2.5 rounded-xl bg-slate-50/50 border border-slate-200/80 text-slate-600 text-sm cursor-not-allowed">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                Academic Year
                            </label>
                            <input type="text" value="<?= htmlspecialchars($academicYearName ?? '-') ?>" disabled
                                class="w-full px-4 py-2.5 rounded-xl bg-slate-50/50 border border-slate-200/80 text-slate-600 text-sm cursor-not-allowed">
                        </div>

                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-slate-200/60">

                        <button type="submit"
                            class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600
                            text-white hover:from-blue-700 hover:to-indigo-700 transition-all duration-300
                            flex items-center justify-center gap-2 shadow-md shadow-blue-200/50 hover:shadow-xl hover:scale-[1.02] btn-shine">
                            <i data-lucide="check" class="w-4 h-4"></i>
                            Save Changes
                        </button>

                        <a href="<?= BASE_URL ?>/profile" class="px-6 py-2.5 rounded-xl bg-white/70 backdrop-blur-sm
                            border border-slate-200/60 text-slate-700 text-center hover:bg-slate-100/80
                            hover:border-blue-200 transition flex items-center justify-center gap-1.5">
                            <i data-lucide="x" class="w-4 h-4"></i>
                            Cancel
                        </a>

                    </div>

                </form>

            </main>

        </div>

    </div>

</div>

<!-- ── Required CSS for animations & glass ── -->
<style>
@keyframes slideInLeft {
    0% {
        opacity: 0;
        transform: translateX(-20px);
    }

    100% {
        opacity: 1;
        transform: translateX(0);
    }
}

.animate-slideInLeft {
    animation: slideInLeft 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
}

.glass-card-light {
    background: rgba(255, 255, 255, 0.72);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
    transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
}

.glass-card-light:hover {
    border-color: rgba(37, 99, 235, 0.2);
    box-shadow: 0 12px 40px rgba(37, 99, 235, 0.08);
}

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

.back-btn {
    transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
}

.back-btn:hover {
    transform: translateX(-4px) scale(1.05);
    box-shadow: 0 8px 30px -8px rgba(37, 99, 235, 0.25);
}

.back-btn:active {
    transform: scale(0.95);
}

/* Focus states for inputs */
.peer:focus~.peer-focus\:text-blue-500 {
    color: #3b82f6;
}

input:focus-visible,
textarea:focus-visible,
select:focus-visible {
    outline: 2px solid #2563EB;
    outline-offset: 2px;
    border-radius: 4px;
}
</style>

<!-- ── Scripts for Lucide Icons ── -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
</script>