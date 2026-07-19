<div class="space-y-6">

    <!-- ========================================================== -->
    <!-- BACK BUTTON – Glass with slide-in                         -->
    <!-- ========================================================== -->
    <div class="animate-slideInLeft">
        <a href="<?= BASE_URL ?>/admin/events"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Events</span>
        </a>
    </div>

    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Create New Event</h1>
            <p class="text-sm text-slate-500">Create a university event for clubs and students.</p>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- FORM CARD – Glass with organized sections                 -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <form method="POST" action="<?= BASE_URL ?>/admin/events/store" enctype="multipart/form-data" class="space-y-8">

            <!-- ===== Basic Information ===== -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="info" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Basic Information</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Event Title -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Event Title <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">

                            <input type="text" name="title" required placeholder="e.g. Git and Open Source Training"
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm peer focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>

                    <!-- Club -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Club <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select name="club_id" required
                                class="w-full pl-4 pr-10 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm appearance-none">
                                <option value="">Select Club</option>
                                <?php foreach($clubs as $club): ?>
                                <option value="<?= $club->getId() ?>">
                                    <?= htmlspecialchars($club->getName()) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Category <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select name="category_id" required
                                class="w-full pl-4 pr-10 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm appearance-none">
                                <option value="">Select Category</option>
                                <?php foreach($categories as $category): ?>
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
                </div>
            </div>

            <hr class="border-slate-200/60">

            <!-- ===== Venue & Capacity – Horizontal layout ===== -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="map-pin" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Venue & Capacity</h2>
                </div>

                <div class="space-y-4">
                    <!-- Venue -->
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                        <label class="sm:w-32 text-sm font-medium text-slate-700 flex-shrink-0">
                            Venue <span class="text-red-500">*</span>
                        </label>
                        <div class="relative flex-1">

                            <input type="text" name="venue" required placeholder="Computer Science Building"
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm peer focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>

                    <!-- Capacity -->
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                        <label class="sm:w-32 text-sm font-medium text-slate-700 flex-shrink-0">
                            Capacity <span class="text-red-500">*</span>
                        </label>
                        <div class="relative flex-1">

                            <input type="number" name="capacity" min="1" required placeholder="100"
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm peer focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-slate-200/60">

            <!-- ===== Schedule – Horizontal layout ===== -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="clock" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Schedule</h2>
                </div>

                <div class="space-y-4">
                    <!-- Event Date -->
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                        <label class="sm:w-32 text-sm font-medium text-slate-700 flex-shrink-0">
                            Event Date <span class="text-red-500">*</span>
                        </label>
                        <div class="relative flex-1">

                            <input type="date" name="event_date" required
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm peer focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>

                    <!-- Registration Deadline -->
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                        <label class="sm:w-32 text-sm font-medium text-slate-700 flex-shrink-0">
                            Registration Deadline <span class="text-red-500">*</span>
                        </label>
                        <div class="relative flex-1">

                            <input type="datetime-local" name="registration_deadline" required
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm peer focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>

                    <!-- Start Time -->
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                        <label class="sm:w-32 text-sm font-medium text-slate-700 flex-shrink-0">
                            Start Time <span class="text-red-500">*</span>
                        </label>
                        <div class="relative flex-1">

                            <input type="time" name="start_time" required
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm peer focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>

                    <!-- End Time -->
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                        <label class="sm:w-32 text-sm font-medium text-slate-700 flex-shrink-0">
                            End Time <span class="text-red-500">*</span>
                        </label>
                        <div class="relative flex-1">

                            <input type="time" name="end_time" required
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm peer focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-slate-200/60">

            <!-- ===== Description ===== -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="file-text" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Event Details</h2>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">
                        Description <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">

                        <textarea name="description" rows="5" required placeholder="Describe the event..."
                            class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm peer focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm resize-y"></textarea>
                    </div>
                </div>
            </div>

            <hr class="border-slate-200/60">

            <!-- ===== Media ===== -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-pink-50 text-pink-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="image" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Media</h2>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Event Banner</label>
                    <label
                        class="flex flex-col items-center justify-center w-full px-4 py-8 border-2 border-dashed border-slate-300/60 rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50/30 transition-all group">
                        <i data-lucide="upload"
                            class="w-10 h-10 text-slate-400 group-hover:text-blue-500 transition-colors"></i>
                        <span class="mt-2 text-sm font-semibold text-slate-700 group-hover:text-blue-600">Click to
                            upload banner</span>
                        <span class="text-xs text-slate-400 mt-1">Recommended 1200px × 400px</span>
                        <input type="file" name="banner" accept="image/*" class="hidden">
                    </label>
                </div>
            </div>

            <hr class="border-slate-200/60">

            <!-- ===== Settings ===== -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="toggle-left" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Settings</h2>
                </div>
                <div
                    class="flex flex-wrap gap-6 bg-white/30 backdrop-blur-sm rounded-xl p-4 border border-slate-200/60">
                    <label
                        class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer hover:text-blue-600 transition">
                        <input type="radio" name="status" value="draft" checked
                            class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500">

                        Draft
                    </label>
                    <label
                        class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer hover:text-blue-600 transition">
                        <input type="radio" name="status" value="published"
                            class="w-4 h-4 text-blue-600 border-slate-300 focus:ring-blue-500">

                        Published
                    </label>
                </div>
            </div>

            <!-- ========================================================== -->
            <!-- FORM ACTIONS – Glass bar                                 -->
            <!-- ========================================================== -->
            <div class="flex flex-wrap items-center justify-end gap-3 pt-4 border-t border-slate-200/60">
                <a href="<?= BASE_URL ?>/admin/events"
                    class="px-5 py-2.5 text-sm font-medium text-slate-700 bg-white/70 backdrop-blur-sm border border-slate-200/60 rounded-xl hover:bg-slate-100/80 hover:border-blue-200 transition flex items-center gap-1.5">
                    <i data-lucide="x" class="w-4 h-4"></i>
                    Cancel
                </a>

                <?php if($permission->can('events.create')): ?>
                <button type="submit"
                    class="px-6 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-md shadow-blue-200/50 hover:shadow-xl hover:scale-[1.02] flex items-center gap-2 btn-shine">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    Create Event
                </button>
                <?php endif; ?>
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