<div class="space-y-8">

    <!-- ========================================================== -->
    <!-- BACK BUTTON – Glass with slide-in                         -->
    <!-- ========================================================== -->
    <div class="animate-slideInLeft">
        <a href="<?= BASE_URL ?>/admin/settings/roles"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Roles</span>
        </a>
    </div>

    <!-- ========================================================== -->
    <!-- HEADER – Enhanced with gradient icon                      -->
    <!-- ========================================================== -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <p class="text-sm font-semibold text-blue-600">RBAC Management</p>
            <div class="flex items-center gap-3">
                <div
                    class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center shadow-lg shadow-blue-200 flex-shrink-0">
                    <i data-lucide="shield" class="w-6 h-6"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-slate-800">Manage Permissions</h1>
                    <p class="text-sm text-slate-500 mt-0.5">
                        Configure access permissions for
                        <span class="font-semibold text-slate-700"><?= ucfirst($role->getName()) ?></span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- PERMISSIONS CARD – Glass with grid                        -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <form method="POST" action="<?= BASE_URL ?>/admin/settings/roles/<?= $role->getId() ?>/permissions">

            <!-- ROLE BADGE -->
            <div class="flex items-center gap-3 mb-6">
                <div class="p-3 bg-blue-50/80 text-blue-600 rounded-xl shadow-sm">
                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Current Role</p>
                    <h2 class="text-lg font-semibold text-slate-800">
                        <?= ucfirst($role->getName()) ?>
                    </h2>
                </div>
            </div>

            <!-- PERMISSION GRID -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                <?php foreach ($permissions as $permission): ?>
                <label
                    class="group flex items-start gap-3 p-4 rounded-xl border border-slate-200/80 cursor-pointer hover:border-blue-300 hover:bg-blue-50/40 transition-all duration-200 hover:shadow-sm glass-card-light">
                    <input type="checkbox" name="permissions[]" value="<?= $permission->getId() ?>"
                        class="mt-1 w-4 h-4 text-blue-600 rounded border-slate-300 focus:ring-blue-500 focus:ring-2 transition"
                        <?php if (in_array($permission->getId(), $selectedPermissions)): ?> checked <?php endif; ?>>

                    <div>
                        <p class="text-sm font-semibold text-slate-700 group-hover:text-blue-700 transition-colors">
                            <?= ucfirst($permission->getName()) ?>
                        </p>
                        <p class="text-xs text-slate-500 mt-1">
                            <?= $permission->getDescription() ?>
                        </p>
                        <span
                            class="inline-flex mt-2 px-2 py-1 text-xs font-medium rounded-lg bg-slate-100/70 text-slate-600 border border-slate-200/50">
                            <?= $permission->getSlug() ?>
                        </span>
                    </div>
                </label>
                <?php endforeach; ?>

            </div>

            <!-- ACTION -->
            <div class="flex justify-end mt-8 pt-6 border-t border-slate-200/60">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 rounded-xl shadow-md shadow-blue-200/50 transition-all duration-300 hover:shadow-xl hover:scale-[1.02] btn-shine">
                    <i data-lucide="save" class="w-4 h-4"></i>
                    Save Permissions
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