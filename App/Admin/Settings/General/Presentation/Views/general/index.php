<div class="space-y-8">

    <!-- ========================================================== -->
    <!-- HEADER – Enhanced with gradient icon                      -->
    <!-- ========================================================== -->
    <div class="flex items-start gap-4">
        <div
            class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center shadow-lg shadow-blue-200 flex-shrink-0">
            <i data-lucide="settings" class="w-6 h-6"></i>
        </div>
        <div>
            <p class="text-sm font-semibold text-blue-600">System Settings</p>
            <h1 class="text-2xl font-bold text-slate-800">General Settings</h1>
            <p class="text-sm text-slate-500 mt-0.5">Manage application information and contact details</p>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- FORM – Glass cards with organized sections                -->
    <!-- ========================================================== -->
    <form method="POST" action="<?= BASE_URL ?>/admin/settings/general/update" class="space-y-6">

        <!-- ========================================================== -->
        <!-- APPLICATION INFORMATION – Glass card                     -->
        <!-- ========================================================== -->
        <div
            class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shadow-sm">
                    <i data-lucide="globe" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="font-semibold text-slate-800">Application Information</h2>
                    <p class="text-sm text-slate-500">Basic system information</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Site Name -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">
                        Site Name
                    </label>
                    <div class="relative">

                        <input type="text" name="site_name" value="<?= $setting->getSiteName() ?>"
                            class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm peer focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                    </div>
                </div>
                <!-- University -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">
                        University Name
                    </label>
                    <div class="relative">

                        <input type="text" name="university_name" value="<?= $setting->getUniversityName() ?>"
                            class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm peer focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                    </div>
                </div>
            </div>
        </div>

        <!-- ========================================================== -->
        <!-- CONTACT INFORMATION – Glass card                         -->
        <!-- ========================================================== -->
        <div
            class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shadow-sm">
                    <i data-lucide="contact" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="font-semibold text-slate-800">Contact Information</h2>
                    <p class="text-sm text-slate-500">Public contact details</p>
                </div>
            </div>

            <div class="space-y-5">
                <!-- Address -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">
                        Address
                    </label>
                    <div class="relative">

                        <textarea name="address" rows="3"
                            class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm peer focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm resize-y"><?= $setting->getAddress() ?></textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Email
                        </label>
                        <div class="relative">

                            <input type="email" name="email" value="<?= $setting->getEmail() ?>"
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm peer focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>
                    <!-- Phone -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">
                            Phone
                        </label>
                        <div class="relative">

                            <input type="text" name="phone" value="<?= $setting->getPhone() ?>"
                                class="w-full pl-4 pr-4 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm peer focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========================================================== -->
        <!-- SYSTEM CONFIGURATION – Glass card                        -->
        <!-- ========================================================== -->
        <div
            class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shadow-sm">
                    <i data-lucide="settings" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="font-semibold text-slate-800">System Configuration</h2>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                    Timezone
                </label>
                <div class="relative max-w-md">

                    <select name="timezone"
                        class="w-full pl-4 pr-10 py-2.5 border border-slate-200/80 rounded-xl bg-white/50 backdrop-blur-sm peer focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 text-sm appearance-none">
                        <option value="Asia/Yangon" <?= $setting->getTimezone() === 'Asia/Yangon' ? 'selected' : '' ?>>
                            Asia/Yangon
                        </option>
                        <!-- Add more timezones as needed -->
                    </select>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                        <i data-lucide="chevron-down" class="w-4 h-4"></i>
                    </span>
                </div>
            </div>
        </div>

        <!-- ========================================================== -->
        <!-- ACTION BUTTON – Glass with gradient                      -->
        <!-- ========================================================== -->
        <?php if ($permission->can('settings.general.update')): ?>
        <div class="flex justify-end">
            <button type="submit"
                class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-xl font-medium shadow-md shadow-blue-200/50 transition-all duration-300 hover:shadow-xl hover:scale-[1.02] btn-shine">
                <i data-lucide="save" class="w-4 h-4"></i>
                Save Changes
            </button>
        </div>
        <?php endif; ?>

    </form>

</div>

<!-- ── Scripts for Lucide Icons ── -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
</script>