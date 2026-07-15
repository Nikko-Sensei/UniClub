<?php
$priority = $announcement->getPriority();
$priorityClass = match($priority) {
    'high'   => 'bg-red-50 text-red-600',
    'medium' => 'bg-amber-50 text-amber-600',
    default  => 'bg-blue-50 text-blue-600',
};
?>

<div class="space-y-6">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
        <div>
            <p class="text-sm font-semibold text-blue-600 mb-1.5">University Update</p>
            <h1 class="text-2xl md:text-4xl font-bold text-slate-800"><?= htmlspecialchars($announcement->getTitle()) ?>
            </h1>

            <div class="flex flex-wrap items-center gap-3 mt-4">
                <span class="inline-flex items-center gap-1.5 text-sm text-slate-500">
                    <i data-lucide="calendar-days" class="w-4 h-4 text-blue-500"></i>
                    <?= date('M d, Y', strtotime($announcement->getCreatedAt())) ?>
                </span>
                <span class="px-3 py-1 rounded-full text-xs font-semibold <?= $priorityClass ?>">
                    <?= ucfirst(htmlspecialchars($priority)) ?> Priority
                </span>
            </div>
        </div>

        <a href="<?= BASE_URL ?>/announcements"
            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white border border-slate-200 text-sm font-semibold text-slate-600 hover:bg-slate-50 transition self-start">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Back
        </a>
    </div>

    <!-- Content -->
    <div class="max-w-4xl mx-auto w-full bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                <i data-lucide="megaphone" class="w-5 h-5 text-blue-600"></i>
            </div>
            <h2 class="text-lg font-bold text-slate-800">Announcement Details</h2>
        </div>

        <div class="text-slate-600 leading-relaxed whitespace-pre-line text-sm md:text-base">
            <?= htmlspecialchars($announcement->getContent()) ?>
        </div>
    </div>

    <!-- Info Footer -->
    <div class="max-w-4xl mx-auto w-full bg-white rounded-2xl border border-slate-200 p-5">
        <h3 class="text-sm font-bold text-slate-800 mb-4">Announcement Information</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <p class="text-xs text-slate-400">Published Date</p>
                <p class="mt-1 text-sm font-semibold text-slate-700">
                    <?= date('M d, Y', strtotime($announcement->getCreatedAt())) ?></p>
            </div>
            <div>
                <p class="text-xs text-slate-400">Status</p>
                <p class="mt-1 inline-flex items-center gap-2 text-sm font-semibold text-emerald-600">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <?= ucfirst(htmlspecialchars($announcement->getStatus())) ?>
                </p>
            </div>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <div class="max-w-4xl mx-auto w-full">
        <a href="<?= BASE_URL ?>/announcements"
            class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-blue-600 transition">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Back to Announcements
        </a>
    </div>
</div>