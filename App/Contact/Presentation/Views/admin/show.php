<?php

$status = $message->getStatus();

$statusClass = match($status){
    'pending' => 'bg-yellow-50 text-yellow-700 border-yellow-200/50',
    'replied' => 'bg-green-50 text-green-700 border-green-200/50',
    'closed'  => 'bg-slate-100 text-slate-700 border-slate-200/50',
    default   => 'bg-gray-100 text-gray-700 border-gray-200/50'
};

$statusColor = match($status){
    'pending' => 'text-yellow-600 border-yellow-400',
    'replied' => 'text-green-600 border-green-400',
    'closed'  => 'text-slate-600 border-slate-400',
    default   => 'text-gray-600 border-gray-400'
};

?>

<div class="space-y-6">

    <!-- ========================================================== -->
    <!-- BACK BUTTON – Glass with slide-in                         -->
    <!-- ========================================================== -->
    <div class="animate-slideInLeft">
        <a href="<?= BASE_URL ?>/admin/contacts"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Messages</span>
        </a>
    </div>

    <!-- ========================================================== -->
    <!-- HEADER – Enhanced with status pill and icon               -->
    <!-- ========================================================== -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <div class="flex items-center gap-3">
                <div
                    class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center shadow-lg shadow-blue-200">
                    <i data-lucide="message-square" class="w-6 h-6"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-slate-800">Contact Message Details</h1>
                    <p class="text-slate-500">Review student inquiry and manage response status.</p>
                </div>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <span
                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold <?= $statusClass ?> border shadow-sm">
                <span
                    class="w-1.5 h-1.5 rounded-full bg-<?= $status === 'pending' ? 'yellow' : ($status === 'replied' ? 'green' : 'slate') ?>-500 animate-pulse"></span>
                <?= ucfirst($status) ?>
            </span>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- STUDENT INFORMATION – Glass card with better layout       -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <div class="flex items-center gap-4 mb-6">
            <div
                class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-50 to-blue-100 text-blue-600 flex items-center justify-center shadow-sm">
                <i data-lucide="user" class="w-6 h-6"></i>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-slate-800">Student Information</h2>
                <p class="text-sm text-slate-500">Contact sender details</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex items-start gap-3">
                <div class="mt-0.5 text-slate-400">
                    <i data-lucide="user" class="w-4 h-4"></i>
                </div>
                <div>
                    <p class="text-xs uppercase text-slate-400 font-medium tracking-wider">Name</p>
                    <p class="mt-1 font-semibold text-slate-800">
                        <?= htmlspecialchars($message->getName()) ?>
                    </p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <div class="mt-0.5 text-slate-400">
                    <i data-lucide="mail" class="w-4 h-4"></i>
                </div>
                <div>
                    <p class="text-xs uppercase text-slate-400 font-medium tracking-wider">Email</p>
                    <p class="mt-1 font-semibold text-slate-800">
                        <?= htmlspecialchars($message->getEmail()) ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- MESSAGE CONTENT – Glass card with speech‑bubble style     -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shadow-sm">
                <i data-lucide="message-circle" class="w-5 h-5"></i>
            </div>
            <div>
                <h2 class="font-semibold text-slate-800">Message</h2>
                <p class="text-sm text-slate-500">Submitted request</p>
            </div>
        </div>

        <div class="space-y-5">
            <div>
                <p class="text-xs uppercase text-slate-400 font-medium tracking-wider">Subject</p>
                <p class="mt-1 text-lg font-semibold text-slate-800">
                    <?= htmlspecialchars($message->getSubject()) ?>
                </p>
            </div>

            <div>
                <p class="text-xs uppercase text-slate-400 font-medium tracking-wider">Message</p>
                <div
                    class="mt-2 p-5 rounded-2xl bg-blue-50/50 backdrop-blur-sm border border-blue-100/60 text-slate-700 leading-relaxed shadow-inner">
                    <?= nl2br(htmlspecialchars($message->getMessage())) ?>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <p class="text-xs uppercase text-slate-400 font-medium tracking-wider">Submitted Date</p>
                    <p class="mt-1 text-slate-600">
                        <?= date('M d, Y h:i A', strtotime($message->getCreatedAt())) ?>
                    </p>
                </div>
                <?php if ($message->getUpdatedAt() && $message->getUpdatedAt() != $message->getCreatedAt()): ?>
                <div>
                    <p class="text-xs uppercase text-slate-400 font-medium tracking-wider">Last Updated</p>
                    <p class="mt-1 text-slate-600">
                        <?= date('M d, Y h:i A', strtotime($message->getUpdatedAt())) ?>
                    </p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- ACTIONS – Glass card with status update                   -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <h2 class="font-semibold text-slate-800 mb-4 flex items-center gap-2">
            <i data-lucide="settings" class="w-5 h-5 text-blue-600"></i>
            Update Status
        </h2>

        <div class="flex flex-wrap gap-3">
            <!-- Reply -->
            <form method="POST" action="<?= BASE_URL ?>/admin/contacts/<?= $message->getId() ?>/status" class="inline">
                <input type="hidden" name="status" value="replied">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white rounded-xl transition-all duration-300 shadow-sm shadow-green-200/50 hover:shadow-md hover:scale-[1.02] btn-shine">
                    <i data-lucide="reply" class="w-4 h-4"></i>
                    Mark Replied
                </button>
            </form>

            <!-- Close -->
            <form method="POST" action="<?= BASE_URL ?>/admin/contacts/<?= $message->getId() ?>/status" class="inline">
                <input type="hidden" name="status" value="closed">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-slate-600 to-slate-700 hover:from-slate-700 hover:to-slate-800 text-white rounded-xl transition-all duration-300 shadow-sm shadow-slate-200/50 hover:shadow-md hover:scale-[1.02] btn-shine">
                    <i data-lucide="archive" class="w-4 h-4"></i>
                    Close Message
                </button>
            </form>

            <!-- Optional: Reopen (if closed) -->
            <?php if ($status === 'closed'): ?>
            <form method="POST" action="<?= BASE_URL ?>/admin/contacts/<?= $message->getId() ?>/status" class="inline">
                <input type="hidden" name="status" value="pending">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white rounded-xl transition-all duration-300 shadow-sm shadow-amber-200/50 hover:shadow-md hover:scale-[1.02] btn-shine">
                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                    Reopen
                </button>
            </form>
            <?php endif; ?>
        </div>
    </div>

</div>

<!-- ── Scripts for Lucide Icons ── -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
</script>