<div class="space-y-8">

    <!-- ========================================================== -->
    <!-- BACK BUTTON – Glass with slide-in                         -->
    <!-- ========================================================== -->
    <div class="animate-slideInLeft">
        <a href="<?= BASE_URL ?>/admin/announcements"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Announcements</span>
        </a>
    </div>

    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->
    <div class="flex items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Edit Announcement</h1>
            <p class="text-slate-500 mt-1">Update announcement information.</p>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- FORM CARD – Glass with organized sections                 -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 md:p-8 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <form method="POST" action="<?= BASE_URL ?>/admin/announcements/<?= $announcement->getId() ?>/update"
            class="space-y-8">

            <!-- ===== Basic Information ===== -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="info" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Basic Information</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Title -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Announcement Title <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">

                            <input type="text" name="title" value="<?= htmlspecialchars($announcement->getTitle()) ?>"
                                required
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm peer focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>

                    <!-- Priority -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Priority <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select name="priority"
                                class="w-full pl-4 pr-10 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm appearance-none">
                                <option value="low" <?= $announcement->getPriority() === 'low' ? 'selected' : '' ?>>Low
                                </option>
                                <option value="medium"
                                    <?= $announcement->getPriority() === 'medium' ? 'selected' : '' ?>>Medium</option>
                                <option value="high" <?= $announcement->getPriority() === 'high' ? 'selected' : '' ?>>
                                    High</option>
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select name="status"
                                class="w-full pl-4 pr-10 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm appearance-none">
                                <option value="draft" <?= $announcement->getStatus() === 'draft' ? 'selected' : '' ?>>
                                    Draft</option>
                                <option value="published"
                                    <?= $announcement->getStatus() === 'published' ? 'selected' : '' ?>>Published
                                </option>
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </span>
                        </div>
                        <p class="mt-1 text-xs text-slate-400">Changing status affects visibility</p>
                    </div>


                    <!-- Visibility -->

                    <div>

                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Visibility <span class="text-red-500">*</span>
                        </label>


                        <div class="relative">

                            <select name="visibility" class="
            w-full
            pl-4
            pr-10
            py-2.5
            border
            border-slate-200/80
            rounded-xl
            bg-white/50
            backdrop-blur-sm
            focus:outline-none
            focus:ring-2
            focus:ring-blue-500/30
            focus:border-blue-500
            transition
            hover:border-blue-200
            text-sm
            appearance-none
            ">


                                <option value="all"
                                    <?= $announcement->getVisibility() === 'public' ? 'selected' : '' ?>>
                                    🌐 All Users
                                </option>


                                <option value="club_members"
                                    <?= $announcement->getVisibility() === 'club_members' ? 'selected' : '' ?>>
                                    👥 Club Members
                                </option>


                            </select>


                            <span class="
            absolute
            inset-y-0
            right-0
            flex
            items-center
            pr-3
            pointer-events-none
            text-slate-400
            ">

                                <i data-lucide="chevron-down" class="w-4 h-4"></i>

                            </span>

                        </div>


                        <p class="mt-1 text-xs text-slate-400">
                            Choose who can see this announcement.
                        </p>

                    </div>

                    <!-- Content -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Announcement Content <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <textarea name="content" rows="7" required
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm peer focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm resize-y"><?= htmlspecialchars($announcement->getContent()) ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================================== -->
            <!-- FORM ACTIONS – Glass bar                                 -->
            <!-- ========================================================== -->
            <div class="flex flex-wrap items-center justify-end gap-3 pt-4 border-t border-slate-200/60">
                <a href="<?= BASE_URL ?>/admin/announcements"
                    class="px-6 py-2.5 text-sm font-medium text-slate-700 bg-white/70 backdrop-blur-sm border border-slate-200/60 rounded-xl hover:bg-slate-100/80 hover:border-blue-200 transition flex items-center gap-1.5">
                    <i data-lucide="x" class="w-4 h-4"></i>
                    Cancel
                </a>

                <button type="submit"
                    class="px-6 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-md shadow-blue-200/50 hover:shadow-xl hover:scale-[1.02] flex items-center gap-2 btn-shine">
                    <i data-lucide="check" class="w-4 h-4"></i>
                    Save Changes
                </button>
            </div>

        </form>
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