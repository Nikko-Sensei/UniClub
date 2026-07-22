<div class="space-y-6">

    <!-- ========================================================== -->
    <!-- BACK BUTTON – Glass with slide-in                         -->
    <!-- ========================================================== -->
    <div class="animate-slideInLeft">
        <a href="<?= BASE_URL ?>/admin/clubs"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Clubs</span>
        </a>
    </div>

    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Edit Club</h1>
            <p class="text-slate-500">Update club information and settings.</p>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- FORM CARD – Glass with organized sections                 -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <form method="POST" action="<?= BASE_URL ?>/admin/clubs/<?= $club->getId() ?>/update"
            enctype="multipart/form-data" class="space-y-8">

            <!-- ===== Basic Information ===== -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="info" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Basic Information</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- Club Category -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Club Category</label>
                        <div class="relative">
                            <select name="category_id"
                                class="w-full mt-1 pl-4 pr-10 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm appearance-none">
                                <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>"
                                    <?= $club->getCategoryId() == $category['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($category['name']) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Club Name -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Club Name <span
                                class="text-red-500">*</span></label>
                        <div class="relative group">

                            <input type="text" name="name" value="<?= htmlspecialchars($club->getName()) ?>"
                                class="w-full mt-1 pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm"
                                required>
                        </div>
                    </div>

                    <!-- Short Name -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Short Name</label>
                        <div class="relative group">

                            <input type="text" name="short_name"
                                value="<?= htmlspecialchars($club->getShortName() ?? '') ?>"
                                class="w-full mt-1 pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Email</label>
                        <div class="relative group">

                            <input type="email" name="email" value="<?= htmlspecialchars($club->getEmail() ?? '') ?>"
                                class="w-full mt-1 pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Phone</label>
                        <div class="relative group">

                            <input type="text" name="phone" value="<?= htmlspecialchars($club->getPhone() ?? '') ?>"
                                class="w-full mt-1 pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>

                    <!-- Established Date -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Established Date</label>
                        <div class="relative group">

                            <input type="date" name="established_date" value="<?= $club->getEstablishedDate() ?? '' ?>"
                                class="w-full mt-1 pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>

                    <!-- Member Limit -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Member Limit</label>
                        <div class="relative group">

                            <input type="number" name="member_limit" value="<?= $club->getMemberLimit() ?? '' ?>"
                                class="w-full mt-1 pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm"
                                placeholder="e.g. 100">
                        </div>
                    </div>

                    <!-- Membership Fee -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">
                            Membership Fee (MMK)
                        </label>

                        <div class="relative group">

                            <input type="number" name="membership_fee" min="0" step="0.01"
                                value="<?= $club->getMembershipFee() ?>"
                                class="w-full mt-1 pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm"
                                placeholder="e.g. 5000">

                        </div>

                        <p class="mt-1 text-xs text-slate-500">
                            Enter 0 if this club has no membership fee.
                        </p>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Status</label>
                        <div class="relative">
                            <select name="status"
                                class="w-full mt-1 pl-4 pr-10 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm appearance-none">
                                <option value="active" <?= $club->getStatus() == 'active' ? 'selected' : '' ?>>Active
                                </option>
                                <option value="inactive" <?= $club->getStatus() == 'inactive' ? 'selected' : '' ?>>
                                    Inactive</option>
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <hr class="border-slate-200/60">

            <!-- ===== Club Media ===== -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-pink-50 text-pink-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="image" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Club Media</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Club Logo</label>
                        <div class="mt-1 flex items-center justify-center w-full">
                            <label for="logo-upload"
                                class="w-full flex flex-col items-center justify-center px-4 py-6 bg-white/50 border-2 border-slate-200/80 border-dashed rounded-xl cursor-pointer hover:bg-white/70 hover:border-blue-300 transition-all group">
                                <i data-lucide="upload"
                                    class="w-8 h-8 text-slate-400 group-hover:text-blue-500 transition-colors"></i>
                                <span
                                    class="mt-2 text-sm text-slate-500 group-hover:text-blue-600 transition-colors">Click
                                    to upload new logo</span>
                                <span class="text-xs text-slate-400">200px × 200px (recommended)</span>
                                <input id="logo-upload" type="file" name="logo" class="hidden" accept="image/*">
                            </label>
                        </div>
                        <?php if ($club->getLogo()): ?>
                        <div class="mt-2 text-xs text-slate-400 flex items-center gap-1.5">
                            <i data-lucide="check-circle" class="w-3 h-3 text-emerald-500"></i>
                            Current logo uploaded
                        </div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Club Banner</label>
                        <div class="mt-1 flex items-center justify-center w-full">
                            <label for="banner-upload"
                                class="w-full flex flex-col items-center justify-center px-4 py-6 bg-white/50 border-2 border-slate-200/80 border-dashed rounded-xl cursor-pointer hover:bg-white/70 hover:border-blue-300 transition-all group">
                                <i data-lucide="image"
                                    class="w-8 h-8 text-slate-400 group-hover:text-blue-500 transition-colors"></i>
                                <span
                                    class="mt-2 text-sm text-slate-500 group-hover:text-blue-600 transition-colors">Click
                                    to upload new banner</span>
                                <span class="text-xs text-slate-400">1200px × 300px (recommended)</span>
                                <input id="banner-upload" type="file" name="banner" class="hidden" accept="image/*">
                            </label>
                        </div>
                        <?php if ($club->getBanner()): ?>
                        <div class="mt-2 text-xs text-slate-400 flex items-center gap-1.5">
                            <i data-lucide="check-circle" class="w-3 h-3 text-emerald-500"></i>
                            Current banner uploaded
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <hr class="border-slate-200/60">

            <!-- ===== Club Details ===== -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="file-text" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Club Details</h2>
                </div>
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Description</label>
                        <textarea name="description" rows="4"
                            class="w-full mt-1 px-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm resize-y"
                            placeholder="Briefly describe the club's activities..."><?= htmlspecialchars($club->getDescription() ?? '') ?></textarea>
                    </div>
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Mission</label>
                        <textarea name="mission" rows="3"
                            class="w-full mt-1 px-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm resize-y"><?= htmlspecialchars($club->getMission() ?? '') ?></textarea>
                    </div>
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Vision</label>
                        <textarea name="vision" rows="3"
                            class="w-full mt-1 px-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm resize-y"><?= htmlspecialchars($club->getVision() ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <!-- ===== Form Actions ===== -->
            <div class="flex flex-wrap items-center justify-end gap-3 pt-4 border-t border-slate-200/60">

                <a href="<?= BASE_URL ?>/admin/clubs"
                    class="px-5 py-2.5 text-sm font-medium text-slate-700 bg-white/70 backdrop-blur-sm border border-slate-200/60 rounded-xl hover:bg-slate-100/80 hover:border-blue-200 transition flex items-center gap-1.5">
                    <i data-lucide="x" class="w-4 h-4"></i>
                    Cancel
                </a>

                <button type="submit" name="save_draft" value="1"
                    class="px-5 py-2.5 text-sm font-medium text-slate-700 bg-slate-100/80 backdrop-blur-sm border border-slate-200/60 rounded-xl hover:bg-slate-200/80 transition hover:scale-[1.02] flex items-center gap-1.5">
                    <i data-lucide="file-text" class="w-4 h-4"></i>
                    Save Draft
                </button>

                <button type="submit"
                    class="px-6 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-md shadow-blue-200/50 hover:shadow-xl hover:scale-[1.02] flex items-center gap-2 btn-shine">
                    <i data-lucide="check" class="w-4 h-4"></i>
                    Update Club
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