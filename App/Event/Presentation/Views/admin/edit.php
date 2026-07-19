<div class="space-y-8">

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
    <div class="flex items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Edit Event</h1>
            <p class="text-slate-500 mt-1">Update event information.</p>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- FORM CARD – Glass with organized sections                 -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 md:p-8 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <form method="POST" enctype="multipart/form-data"
            action="<?= BASE_URL ?>/admin/events/<?= $event->getId() ?>/update" class="space-y-8">

            <!-- Basic Information -->
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
                        <div class="relative group">

                            <input type="text" name="title" value="<?= htmlspecialchars($event->getTitle()) ?>" required
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
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
                                <?php foreach ($clubs as $club): ?>
                                <option value="<?= $club->getId() ?>"
                                    <?= $event->getClubId() == $club->getId() ? 'selected' : '' ?>>
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
                                <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>"
                                    <?= $event->getCategoryId() == $category['id'] ? 'selected' : '' ?>>
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

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">

                            <textarea name="description" rows="5" required
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm resize-y"><?= htmlspecialchars($event->getDescription()) ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-slate-200/60">

            <!-- Venue & Capacity -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="map-pin" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Venue & Capacity</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Venue -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Venue <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">

                            <input type="text" name="venue" value="<?= htmlspecialchars($event->getVenue()) ?>" required
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>

                    <!-- Capacity -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Capacity <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">

                            <input type="number" name="capacity" value="<?= $event->getCapacity() ?>" required
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-slate-200/60">

            <!-- Schedule -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="clock" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Schedule</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Event Date -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Event Date <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">

                            <input type="date" name="event_date" value="<?= htmlspecialchars($event->getEventDate()) ?>"
                                required
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>

                    <!-- Registration Deadline -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Registration Deadline <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">

                            <input type="datetime-local" name="registration_deadline"
                                value="<?= date('Y-m-d\TH:i', strtotime($event->getRegistrationDeadline())) ?>" required
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>

                    <!-- Start Time -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Start Time <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">

                            <input type="time" name="start_time" value="<?= htmlspecialchars($event->getStartTime()) ?>"
                                required
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>

                    <!-- End Time -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            End Time <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">

                            <input type="time" name="end_time" value="<?= htmlspecialchars($event->getEndTime()) ?>"
                                required
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-slate-200/60">

            <!-- Media & Status -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-pink-50 text-pink-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="image" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Media & Status</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Banner -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Event Banner</label>

                        <?php if ($event->getBanner()): ?>
                        <div class="mb-4">
                            <img src="<?= BASE_URL ?>/uploads/events/<?= htmlspecialchars($event->getBanner()) ?>"
                                id="bannerPreview"
                                class="w-full h-48 rounded-xl border border-slate-200/80 object-cover shadow-sm">
                        </div>
                        <?php else: ?>
                        <div class="mb-4">
                            <img id="bannerPreview"
                                class="hidden w-full h-48 rounded-xl border border-slate-200/80 object-cover shadow-sm">
                        </div>
                        <?php endif; ?>

                        <label
                            class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-slate-300/60 rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50/30 transition-all group">
                            <i data-lucide="upload"
                                class="w-10 h-10 text-slate-400 group-hover:text-blue-500 transition-colors"></i>
                            <span class="text-sm font-semibold text-slate-700 mt-2 group-hover:text-blue-600">Click to
                                upload new banner</span>
                            <span class="text-xs text-slate-400 mt-1">JPG, PNG, WEBP (Max 5MB)</span>
                            <input type="file" name="banner" accept="image/*" class="hidden"
                                onchange="previewBanner(event)">
                        </label>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select name="status" required
                                class="w-full pl-4 pr-10 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm appearance-none">
                                <option value="draft" <?= $event->getStatus() === 'draft' ? 'selected' : '' ?>>Draft
                                </option>
                                <option value="published" <?= $event->getStatus() === 'published' ? 'selected' : '' ?>>
                                    Published</option>
                                <option value="cancelled" <?= $event->getStatus() === 'cancelled' ? 'selected' : '' ?>>
                                    Cancelled</option>
                                <option value="completed" <?= $event->getStatus() === 'completed' ? 'selected' : '' ?>>
                                    Completed</option>
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </span>
                        </div>
                        <p class="mt-1 text-xs text-slate-400">Changing status affects event visibility</p>
                    </div>
                </div>
            </div>

            <!-- ========================================================== -->
            <!-- FORM ACTIONS – Glass bar                                 -->
            <!-- ========================================================== -->
            <div class="flex flex-wrap items-center justify-end gap-3 pt-4 border-t border-slate-200/60">
                <a href="<?= BASE_URL ?>/admin/events"
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

<!-- ── Scripts for Lucide Icons and Banner Preview ── -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});

function previewBanner(event) {
    const input = event.target;
    const preview = document.getElementById('bannerPreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>