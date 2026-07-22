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
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Create New Club</h1>
            <p class="text-sm text-slate-500">Register a new student organization within the university ecosystem.</p>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- FORM CARD – Glass with organized sections                 -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <form method="POST" action="<?= BASE_URL ?>/admin/clubs/store" enctype="multipart/form-data" class="space-y-8">

            <!-- ===== Basic Information ===== -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="info" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Basic Information</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- Club Name -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Club Name <span
                                class="text-red-500">*</span></label>
                        <div class="relative group">

                            <input type="text" name="name" required
                                class="w-full mt-1 pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm"
                                placeholder="e.g. Computer Science Society">
                        </div>
                    </div>

                    <!-- Short Name -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Short Name</label>
                        <div class="relative group">

                            <input type="text" name="short_name" maxlength="50"
                                class="w-full mt-1 pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm"
                                placeholder="e.g. CSS">
                        </div>
                    </div>

                    <!-- Club Category -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Club Category <span
                                class="text-red-500">*</span></label>
                        <div class="relative">
                            <select name="category_id" required
                                class="w-full mt-1 pl-4 pr-10 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm appearance-none">
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>">
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

                    <!-- Club Email -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Club Email</label>
                        <div class="relative group">

                            <input type="email" name="email"
                                class="w-full mt-1 pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm"
                                placeholder="club@university.edu">
                        </div>
                    </div>

                    <!-- Mentor Email -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Mentor Email</label>
                        <div class="relative group">

                            <input type="email" name="mentor_email"
                                class="w-full mt-1 pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm"
                                placeholder="mentor@university.edu">
                        </div>
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Phone</label>
                        <div class="relative group">

                            <input type="text" name="phone"
                                class="w-full mt-1 pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm"
                                placeholder="+1 234 567 890">
                        </div>
                    </div>

                    <!-- Established Date -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Established Date</label>
                        <div class="relative group">

                            <input type="date" name="established_date"
                                class="w-full mt-1 pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>

                    <!-- Member Limit -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Member Limit</label>
                        <div class="relative group">

                            <input type="number" name="member_limit"
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

                            <input type="number" name="membership_fee" min="0" step="0.01" value="0"
                                class="w-full mt-1 pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm"
                                placeholder="e.g. 5000">

                        </div>

                        <p class="mt-1 text-xs text-slate-500">
                            Enter 0 if this club has no membership fee.
                        </p>
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
                        <label class="block text-sm text-slate-600 font-medium">Club Description</label>
                        <textarea name="description" rows="4"
                            class="w-full mt-1 px-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm resize-y"
                            placeholder="Briefly describe the club's activities and community..."></textarea>
                    </div>
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Mission</label>
                        <textarea name="mission" rows="3"
                            class="w-full mt-1 px-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm resize-y"
                            placeholder="Define the primary mission..."></textarea>
                    </div>
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Vision</label>
                        <textarea name="vision" rows="3"
                            class="w-full mt-1 px-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm resize-y"
                            placeholder="Define the future goals..."></textarea>
                    </div>
                </div>
            </div>

            <hr class="border-slate-200/60">

            <!-- ===== Leadership Information =====
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="crown" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Leadership Information
                    </h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">President Name</label>
                        <div class="relative group">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <i data-lucide="user" class="w-4 h-4"></i>
                            </span>
                            <input type="text" name="president"
                                class="w-full mt-1 pl-10 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm"
                                placeholder="Full name">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Vice President</label>
                        <div class="relative group">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <i data-lucide="user-round" class="w-4 h-4"></i>
                            </span>
                            <input type="text" name="vice_president"
                                class="w-full mt-1 pl-10 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm"
                                placeholder="Full name">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Secretary</label>
                        <div class="relative group">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <i data-lucide="clipboard" class="w-4 h-4"></i>
                            </span>
                            <input type="text" name="advisor"
                                class="w-full mt-1 pl-10 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm"
                                placeholder="Full name">
                        </div>
                    </div>
                </div>
            </div> -->


            <!-- ===== Media ===== -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-pink-50 text-pink-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="image" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Media</h2>
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
                                    to upload logo</span>
                                <span class="text-xs text-slate-400">200px × 200px (recommended)</span>
                                <input id="logo-upload" type="file" name="logo" class="hidden" accept="image/*">
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Banner Image</label>
                        <div class="mt-1 flex items-center justify-center w-full">
                            <label for="banner-upload"
                                class="w-full flex flex-col items-center justify-center px-4 py-6 bg-white/50 border-2 border-slate-200/80 border-dashed rounded-xl cursor-pointer hover:bg-white/70 hover:border-blue-300 transition-all group">
                                <i data-lucide="image"
                                    class="w-8 h-8 text-slate-400 group-hover:text-blue-500 transition-colors"></i>
                                <span
                                    class="mt-2 text-sm text-slate-500 group-hover:text-blue-600 transition-colors">Click
                                    to upload banner</span>
                                <span class="text-xs text-slate-400">1200px × 300px (recommended)</span>
                                <input id="banner-upload" type="file" name="banner" class="hidden" accept="image/*">
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-slate-200/60">

            <!-- ===== Status & Visibility ===== -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="toggle-left" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Status & Visibility</h2>
                </div>
                <div
                    class="flex flex-wrap items-center gap-6 bg-white/30 backdrop-blur-sm rounded-xl p-4 border border-slate-200/60">
                    <label
                        class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer hover:text-blue-600 transition">
                        <input type="radio" name="status" value="active" checked
                            class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500">

                        <span>Active</span>
                        <span class="text-xs text-slate-400 ml-1">(Club will be visible to all students)</span>
                    </label>
                    <label
                        class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer hover:text-blue-600 transition">
                        <input type="radio" name="status" value="inactive"
                            class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500">

                        <span>Inactive</span>
                        <span class="text-xs text-slate-400 ml-1">(Club will be hidden from public view)</span>
                    </label>
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
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    Create Club
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