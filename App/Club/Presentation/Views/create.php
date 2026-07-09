<div class="space-y-6">


    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Create New Club
            </h1>

            <p class="text-sm text-slate-500">
                Register a new student organization within the university ecosystem.
            </p>
        </div>

        <div class="flex items-center gap-3">

            <a href="<?= BASE_URL ?>/admin/clubs"
                class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-700 hover:bg-slate-50 transition">

                <i data-lucide="arrow-left" class="w-4 h-4"></i>

                Back

            </a>

        </div>

    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">

        <form method="POST" action="<?= BASE_URL ?>/admin/clubs/store" enctype="multipart/form-data" class="space-y-8">

            <!-- ===== Basic Information ===== -->
            <div>
                <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider mb-4">
                    Basic Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- Club Name -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Club Name</label>
                        <input type="text" name="name" required
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition"
                            placeholder="e.g. Computer Science Society">
                    </div>

                    <!-- Club Category -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Club Category</label>
                        <select name="category_id" required
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition">
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>">
                                    <?= htmlspecialchars($category['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Club Email -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Club Email</label>
                        <input type="email" name="email"
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition"
                            placeholder="club@university.edu">
                    </div>

                    <!-- Mentor Email -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Mentor Email</label>
                        <input type="email" name="mentor_email"
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition"
                            placeholder="mentor@university.edu">
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Phone</label>
                        <input type="text" name="phone"
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition"
                            placeholder="+1 234 567 890">
                    </div>

                    <!-- Established Date -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Established Date</label>
                        <input type="date" name="established_date"
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition">
                    </div>

                    <!-- Member Limit -->
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Member Limit</label>
                        <input type="number" name="member_limit"
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition"
                            placeholder="e.g. 100">
                    </div>

                </div>
            </div>

            <!-- ===== Club Details ===== -->
            <div>
                <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider mb-4">
                    Club Details
                </h2>
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Club Description</label>
                        <textarea name="description" rows="4"
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition"
                            placeholder="Briefly describe the club's activities and community..."></textarea>
                    </div>
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Mission</label>
                        <textarea name="mission" rows="3"
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition"
                            placeholder="Define the primary mission..."></textarea>
                    </div>
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Vision</label>
                        <textarea name="vision" rows="3"
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition"
                            placeholder="Define the future goals..."></textarea>
                    </div>
                </div>
            </div>

            <!-- ===== Leadership Information ===== -->
            <div>
                <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider mb-4">
                    Leadership Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">President Name</label>
                        <input type="text" name="president"
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition"
                            placeholder="Full name">
                    </div>
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Vice President</label>
                        <input type="text" name="vice_president"
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition"
                            placeholder="Full name">
                    </div>
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Advisor Name</label>
                        <input type="text" name="advisor"
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition"
                            placeholder="Faculty member">
                    </div>
                </div>
            </div>

            <!-- ===== Media ===== -->
            <div>
                <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider mb-4">
                    Media
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Club Logo</label>
                        <div class="mt-1 flex items-center justify-center w-full">
                            <label for="logo-upload"
                                class="w-full flex flex-col items-center justify-center px-4 py-6 bg-slate-50/50 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer hover:bg-slate-100 transition">
                                <i data-lucide="upload" class="w-8 h-8 text-slate-400"></i>
                                <span class="mt-2 text-sm text-slate-500">Click to upload logo</span>
                                <span class="text-xs text-slate-400">200px × 200px (recommended)</span>
                                <input id="logo-upload" type="file" name="logo" class="hidden" accept="image/*">
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm text-slate-600 font-medium">Banner Image</label>
                        <div class="mt-1 flex items-center justify-center w-full">
                            <label for="banner-upload"
                                class="w-full flex flex-col items-center justify-center px-4 py-6 bg-slate-50/50 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer hover:bg-slate-100 transition">
                                <i data-lucide="image" class="w-8 h-8 text-slate-400"></i>
                                <span class="mt-2 text-sm text-slate-500">Click to upload banner</span>
                                <span class="text-xs text-slate-400">1200px × 300px (recommended)</span>
                                <input id="banner-upload" type="file" name="banner" class="hidden" accept="image/*">
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== Status & Visibility ===== -->
            <div>
                <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider mb-4">
                    Status & Visibility
                </h2>
                <div class="flex flex-wrap items-center gap-6">
                    <label class="flex items-center gap-2 text-sm text-slate-700">
                        <input type="radio" name="status" value="active" checked
                            class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500">
                        <span>Active</span>
                        <span class="text-xs text-slate-400 ml-1">(Club will be visible to all students)</span>
                    </label>
                    <label class="flex items-center gap-2 text-sm text-slate-700">
                        <input type="radio" name="status" value="inactive"
                            class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500">
                        <span>Inactive</span>
                        <span class="text-xs text-slate-400 ml-1">(Club will be hidden from public view)</span>
                    </label>
                </div>
            </div>

            <!-- ===== Form Actions ===== -->
            <div class="flex flex-wrap items-center justify-end gap-3 pt-4 border-t border-slate-200">
                <a href="<?= BASE_URL ?>/admin/clubs"
                    class="px-5 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 transition">
                    Cancel
                </a>
                <button type="submit" name="save_draft" value="1"
                    class="px-5 py-2.5 text-sm font-medium text-slate-700 bg-slate-100 border border-slate-300 rounded-lg hover:bg-slate-200 transition">
                    Save Draft
                </button>
                <button type="submit"
                    class="px-6 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition shadow-sm">
                    Create Club
                </button>
            </div>

        </form>
    </div>

</div>