<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Profile</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap"
        rel="stylesheet" />

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: #F1F5F9;
        color: #0F172A;
        -webkit-font-smoothing: antialiased;
    }

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

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(12px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

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

    @keyframes scaleIn {
        0% {
            opacity: 0;
            transform: scale(0.96);
        }

        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .animate-slideInLeft {
        animation: slideInLeft 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .animate-scaleIn {
        animation: scaleIn 0.4s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .back-btn {
        transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .back-btn:hover {
        transform: translateX(-3px);
        color: #2563eb;
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

    .flash-success {
        animation: fadeInUp 0.4s ease-out;
    }

    .flash-success.fade-out {
        opacity: 0;
        transition: opacity 0.5s;
    }

    *:focus-visible {
        outline: 2px solid #2563EB;
        outline-offset: 2px;
        border-radius: 4px;
    }

    .badge-pulse {
        animation: pulse-badge 2s infinite;
    }

    @keyframes pulse-badge {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.6;
        }
    }

    .avatar-ring {
        background: conic-gradient(from 0deg, #2563eb, #6366f1, #8b5cf6, #2563eb);
        padding: 2px;
        border-radius: 9999px;
    }
    </style>
</head>

<body>

    <div
        class="min-h-screen bg-gradient-to-br from-slate-50 via-slate-100/50 to-slate-50 flex items-center justify-center p-4 sm:p-6">

        <div class="w-full max-w-6xl space-y-5">

            <!-- ===== SUCCESS FLASH MESSAGE ===== -->
            <?php

            use App\Shared\Helpers\Flash;

            $success = Flash::get('success'); ?>
            <?php if ($success): ?>
            <div
                class="flash-success bg-emerald-50 border border-emerald-200 rounded-xl px-5 py-3.5 flex items-center gap-3 text-emerald-700 shadow-sm animate-fadeInUp">
                <i data-lucide="check-circle" class="w-5 h-5 text-emerald-500"></i>
                <span class="font-medium text-sm"><?= htmlspecialchars($success) ?></span>
                <button onclick="this.parentElement.remove()"
                    class="ml-auto text-emerald-400 hover:text-emerald-600 transition">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>
            <?php endif; ?>


            <div class="animate-slideInLeft">
                <a href="<?= BASE_URL ?>/dashboard"
                    class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
                    <i data-lucide="arrow-left"
                        class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
                    <span>Back to Dashboard</span>
                </a>
            </div>

            <!-- ===== MAIN PROFILE CARD ===== -->
            <div class="bg-white rounded-2xl shadow-lg border border-slate-200/50 overflow-hidden animate-scaleIn">

                <!-- ===== HEADER – Clean with avatar and quick actions ===== -->
                <div class="px-6 py-7 sm:px-8 sm:py-8 border-b border-slate-200/50">

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">

                        <!-- left: avatar + name + meta -->
                        <div class="flex items-center gap-5">

                            <!-- Avatar with ring -->
                            <div class="relative">
                                <div
                                    class="w-28 h-28 rounded-full p-1 bg-gradient-to-br from-blue-500 via-indigo-500 to-purple-500 shadow-xl shadow-blue-200/40">
                                    <div
                                        class="w-full h-full rounded-full overflow-hidden bg-white/10 backdrop-blur-sm">
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

                            <div>
                                <h1 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">
                                    <?= htmlspecialchars($user->getName()) ?>
                                </h1>
                                <div class="flex flex-wrap items-center gap-3 mt-0.5 text-sm text-slate-500">
                                    <span class="flex items-center gap-1.5">
                                        <i data-lucide="id-card" class="w-3.5 h-3.5"></i>
                                        <?= htmlspecialchars($user->getStudentId()) ?>
                                    </span>
                                    <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                    <span class="flex items-center gap-1.5">
                                        <i data-lucide="mail" class="w-3.5 h-3.5"></i>
                                        <?= htmlspecialchars($user->getEmail()) ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- right: status + actions -->
                        <div class="flex items-center gap-3">
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200/50 badge-pulse">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                <?= ucfirst($user->getStatus()) === 'Active' ? 'Active' : ucfirst($user->getStatus()) ?>
                            </span>
                            <a href="<?= BASE_URL ?>/profile/edit"
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium transition-all duration-200 shadow-sm hover:shadow-md btn-shine">
                                <i data-lucide="square-pen" class="w-4 h-4"></i>
                                Edit
                            </a>
                            <a href="<?= BASE_URL ?>/profile/change-password"
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 hover:border-slate-300 text-sm font-medium transition-all duration-200">
                                <i data-lucide="key" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>

                </div>

                <!-- ===== BODY: Two columns – sidebar stats removed ===== -->
                <div class="flex flex-col lg:flex-row">

                    <!-- ===== LEFT SIDEBAR – Quick info only ===== -->
                    <aside
                        class="w-full lg:w-56 lg:flex-shrink-0 bg-slate-50/30 p-5 border-b lg:border-b-0 lg:border-r border-slate-200/50">

                        <!-- Member since, department, academic year -->
                        <div class="text-xs text-slate-400 space-y-1.5">
                            <p class="flex items-center gap-1.5">
                                <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                                Joined
                                <?= $user->getCreatedAt() ? date('F Y', strtotime($user->getCreatedAt())) : '2026' ?>
                            </p>
                            <p class="flex items-center gap-1.5">
                                <i data-lucide="building-2" class="w-3.5 h-3.5"></i>
                                <?= htmlspecialchars($departmentName ?? 'Computer Science') ?>
                            </p>
                            <p class="flex items-center gap-1.5">
                                <i data-lucide="graduation-cap" class="w-3.5 h-3.5"></i>
                                <?= htmlspecialchars($academicYearName ?? 'Third Year') ?>
                            </p>
                        </div>

                        <!-- Optionally add a divider and status again -->
                        <div class="mt-4 pt-4 border-t border-slate-200/50">
                            <p class="flex items-center gap-1.5 text-xs text-slate-500">
                                <i data-lucide="circle" class="w-3.5 h-3.5 text-emerald-500"></i>
                                <span class="font-medium"><?= ucfirst($user->getStatus()) ?></span>
                            </p>
                        </div>

                    </aside>

                    <!-- ===== RIGHT MAIN – Personal Information ===== -->
                    <main class="flex-1 p-5 sm:p-7">

                        <h2
                            class="text-sm font-semibold text-slate-400 uppercase tracking-wider mb-4 flex items-center gap-2">
                            <i data-lucide="user-circle" class="w-4 h-4 text-slate-400"></i>
                            Personal Information
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                            <div>
                                <label class="text-xs font-medium text-slate-400 uppercase tracking-wider">Full
                                    Name</label>
                                <p class="text-slate-800 font-medium mt-0.5"><?= htmlspecialchars($user->getName()) ?>
                                </p>
                            </div>

                            <div>
                                <label class="text-xs font-medium text-slate-400 uppercase tracking-wider">Student
                                    ID</label>
                                <p class="text-slate-800 font-medium mt-0.5">
                                    <?= htmlspecialchars($user->getStudentId()) ?></p>
                            </div>

                            <div>
                                <label class="text-xs font-medium text-slate-400 uppercase tracking-wider">Email</label>
                                <p class="text-slate-800 font-medium mt-0.5"><?= htmlspecialchars($user->getEmail()) ?>
                                </p>
                            </div>

                            <div>
                                <label class="text-xs font-medium text-slate-400 uppercase tracking-wider">Phone</label>
                                <p class="text-slate-800 font-medium mt-0.5">
                                    <?= htmlspecialchars($user->getPhone() ?: '—') ?></p>
                            </div>

                            <div>
                                <label
                                    class="text-xs font-medium text-slate-400 uppercase tracking-wider">Department</label>
                                <p class="text-slate-800 font-medium mt-0.5">
                                    <?= htmlspecialchars($departmentName ?? '—') ?></p>
                            </div>

                            <div>
                                <label class="text-xs font-medium text-slate-400 uppercase tracking-wider">Academic
                                    Year</label>
                                <p class="text-slate-800 font-medium mt-0.5">
                                    <?= htmlspecialchars($academicYearName ?? '—') ?></p>
                            </div>

                        </div>

                    </main>
                </div>
            </div>

        </div>
    </div>

    <!-- ── Lucide Icons ── -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        // ── Flash message auto-dismiss ──
        const flash = document.querySelector('.flash-success');
        if (flash) {
            setTimeout(() => {
                flash.classList.add('fade-out');
                setTimeout(() => flash.remove(), 500);
            }, 5000);
        }
    });
    </script>

</body>

</html>