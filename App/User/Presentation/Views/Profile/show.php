<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        .profile-card {
            transition: box-shadow 0.2s ease;
        }

        .profile-card:hover {
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.15);
        }

        .sidebar-stat {
            transition: background 0.15s ease;
        }

        .sidebar-stat:hover {
            background: #f1f5f9;
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
                opacity: 0.7;
            }
        }
    </style>
</head>

<body>
    <?php

    use App\Shared\Helpers\Flash;

    $success = Flash::get('success');
    ?>

    <?php if ($success): ?>
        <div class="max-w-6xl mx-auto mt-4 px-4">
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl shadow-sm">
                <?= htmlspecialchars($success) ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="min-h-screen bg-slate-50 flex items-center justify-center p-4 sm:p-6">

        <div class="w-full max-w-6xl bg-white rounded-2xl shadow-lg overflow-hidden profile-card">

            <!-- ===== TOP HEADER ===== -->
            <div class="bg-gradient-to-br from-blue-600 to-blue-800 px-6 py-8 sm:px-10 sm:py-10 text-white">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">

                    <!-- left: avatar + name + meta -->
                    <div class="flex items-center gap-5">

                        <!-- avatar -->
                        <div
                            class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-blue-600 flex items-center justify-center text-4xl sm:text-5xl font-bold text-white shadow-lg border-2 border-blue-400 flex-shrink-0">
                            <?php if (!empty($user->getProfileImage())): ?>
                                <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars($user->getProfileImage()) ?>"
                                    class="w-full h-full rounded-full object-cover" alt="Profile">
                            <?php else: ?>
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
                            <?php endif; ?>
                        </div>

                        <!-- name + id + year -->
                        <div>
                            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight">
                                <?= htmlspecialchars($user->getName()) ?>
                            </h1>
                            <div
                                class="flex flex-wrap items-center gap-x-4 gap-y-1 mt-1 text-blue-100 text-sm sm:text-base">
                                <span><i class="far fa-id-card mr-1.5"></i> ID:
                                    <?= htmlspecialchars($user->getStudentId()) ?></span>
                                <span><i class="far fa-calendar-alt mr-1.5"></i>
                                    <?= htmlspecialchars($academicYearName ?? 'Third Year') ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- right: active badge + department/email (desktop) -->
                    <div class="flex items-center gap-3 sm:flex-col sm:items-end">
                        <span
                            class="inline-flex items-center gap-1.5 bg-blue-400/20 text-blue-100 text-sm font-medium px-4 py-1.5 rounded-full border border-blue-300/30 backdrop-blur-sm badge-pulse">
                            <span class="w-2 h-2 rounded-full bg-blue-300 inline-block"></span>
                            <?= ucfirst($user->getStatus()) === 'Active' ? 'Active Member' : ucfirst($user->getStatus()) ?>
                        </span>
                        <div class="hidden sm:block text-blue-200 text-xs text-right">
                            <div><?= htmlspecialchars($departmentName ?? 'Computer Science') ?></div>
                            <div class="mt-0.5"><?= htmlspecialchars($user->getEmail()) ?></div>
                        </div>
                    </div>
                </div>

                <!-- department + email (mobile) -->
                <div class="mt-3 text-blue-200 text-sm flex flex-wrap gap-x-4 gap-y-1 sm:hidden">
                    <span><i class="fas fa-laptop mr-1.5"></i>
                        <?= htmlspecialchars($departmentName ?? 'Computer Science') ?></span>
                    <span><i class="far fa-envelope mr-1.5"></i> <?= htmlspecialchars($user->getEmail()) ?></span>
                </div>
            </div>

            <!-- ===== BODY: two columns ===== -->
            <div class="flex flex-col lg:flex-row">

                <!-- ===== SIDEBAR ===== -->
                <aside
                    class="w-full lg:w-64 lg:flex-shrink-0 bg-slate-50/80 border-b lg:border-b-0 lg:border-r border-slate-200/70 p-6 space-y-5">

                    <!-- stat: Club Joined -->
                    <div
                        class="sidebar-stat rounded-xl bg-white p-4 shadow-sm border border-slate-200/60 flex items-center gap-4 cursor-default">
                        <div
                            class="w-11 h-11 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-xl">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-slate-800 leading-none">3</div>
                            <div class="text-sm text-slate-500 font-medium">Club Joined</div>
                        </div>
                    </div>

                    <!-- stat: Registered Events -->
                    <div
                        class="sidebar-stat rounded-xl bg-white p-4 shadow-sm border border-slate-200/60 flex items-center gap-4 cursor-default">
                        <div
                            class="w-11 h-11 rounded-full bg-cyan-100 text-cyan-700 flex items-center justify-center text-xl">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-slate-800 leading-none">12</div>
                            <div class="text-sm text-slate-500 font-medium">Registered Events</div>
                        </div>
                    </div>

                    <hr class="border-slate-200/60 my-4" />

                    <div class="text-xs text-slate-400 space-y-1">
                        <p><i class="far fa-clock mr-1.5"></i> Member since
                            <?= $user->getCreatedAt() ? date('Y', strtotime($user->getCreatedAt())) : '2026' ?></p>
                        <p><i class="far fa-circle mr-1.5"></i> Status: <?= ucfirst($user->getStatus()) ?></p>
                    </div>
                </aside>

                <!-- ===== MAIN CONTENT ===== -->
                <main class="flex-1 p-6 sm:p-8">

                    <h2 class="text-lg font-semibold text-slate-800 flex items-center gap-2 mb-5">
                        <i class="fas fa-user-circle text-blue-500 text-xl"></i>
                        Personal Information
                    </h2>

                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-4 bg-slate-50/60 rounded-xl p-5 sm:p-6 border border-slate-200/50">

                        <div>
                            <label class="text-xs font-medium text-slate-400 uppercase tracking-wider">Full Name</label>
                            <p class="text-slate-800 font-medium mt-0.5"><?= htmlspecialchars($user->getName()) ?></p>
                        </div>

                        <div>
                            <label class="text-xs font-medium text-slate-400 uppercase tracking-wider">Student
                                ID</label>
                            <p class="text-slate-800 font-medium mt-0.5"><?= htmlspecialchars($user->getStudentId()) ?>
                            </p>
                        </div>

                        <div>
                            <label class="text-xs font-medium text-slate-400 uppercase tracking-wider">Email
                                Address</label>
                            <p class="text-slate-800 font-medium mt-0.5"><?= htmlspecialchars($user->getEmail()) ?></p>
                        </div>

                        <div>
                            <label class="text-xs font-medium text-slate-400 uppercase tracking-wider">Phone
                                Number</label>
                            <p class="text-slate-800 font-medium mt-0.5">
                                <?= htmlspecialchars($user->getPhone() ?: '-') ?></p>
                        </div>

                        <div>
                            <label
                                class="text-xs font-medium text-slate-400 uppercase tracking-wider">Department</label>
                            <p class="text-slate-800 font-medium mt-0.5"><?= htmlspecialchars($departmentName ?? '-') ?>
                            </p>
                        </div>

                        <div>
                            <label class="text-xs font-medium text-slate-400 uppercase tracking-wider">Academic
                                Year</label>
                            <p class="text-slate-800 font-medium mt-0.5">
                                <?= htmlspecialchars($academicYearName ?? '-') ?></p>
                        </div>

                        <div class="sm:col-span-2">
                            <label class="text-xs font-medium text-slate-400 uppercase tracking-wider">Date
                                Joined</label>
                            <p class="text-slate-800 font-medium mt-0.5">
                                <?= $user->getCreatedAt() ? date('d F Y', strtotime($user->getCreatedAt())) : '01 January 2026' ?>
                            </p>
                        </div>
                    </div>

                    <!-- action buttons -->
                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="<?= BASE_URL ?>/profile/edit"
                            class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-6 py-2.5 rounded-lg transition shadow-sm shadow-blue-200">
                            <i class="fas fa-edit"></i> Edit Profile
                        </a>
                        <a href="<?= BASE_URL ?>/profile/change-password"
                            class="inline-flex items-center gap-2 bg-white hover:bg-slate-50 text-slate-700 text-sm font-medium px-6 py-2.5 rounded-lg border border-slate-300 transition shadow-sm">
                            <i class="fas fa-key"></i> Change Password
                        </a>
                    </div>

                </main>
            </div>
        </div>
    </div>

</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const el = document.querySelector('.flash-success');

        if (el) {
            setTimeout(() => {
                el.style.opacity = "0";
                el.style.transition = "0.5s";

                setTimeout(() => {
                    el.remove();
                }, 500);
            }, 5000);
        }
    });
</script>

</html>