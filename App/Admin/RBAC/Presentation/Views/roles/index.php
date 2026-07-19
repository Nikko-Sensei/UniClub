<div class="space-y-8">


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
                    <h1 class="text-2xl font-bold text-slate-800">Roles & Permissions</h1>
                    <p class="text-sm text-slate-500 mt-0.5">Manage system roles and access permissions</p>
                </div>
            </div>
        </div>
        <!-- Optional: Add Create Role button if permission allows -->
        <?php if ($permission->can('rbac.manage')): ?>
        <a href="<?= BASE_URL ?>/admin/settings/roles/create"
            class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-xl transition-all duration-300 shadow-md shadow-blue-200/50 hover:shadow-xl hover:scale-[1.02] btn-shine">
            <i data-lucide="plus" class="w-4 h-4"></i>
            Create Role
        </a>
        <?php endif; ?>
    </div>

    <!-- ========================================================== -->
    <!-- ROLE CARDS – Glass with hover lift and stagger             -->
    <!-- ========================================================== -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <?php foreach ($roles as $index => $role): ?>

        <div class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1 animate-fadeInUp"
            style="animation-delay: <?= $index * 100 + 200 ?>ms;">

            <!-- HEADER: Icon + Badge -->
            <div class="flex items-center justify-between mb-5">
                <div class="p-3 bg-blue-50/80 text-blue-600 rounded-xl shadow-sm">
                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                </div>
                <span
                    class="px-3 py-1 text-xs font-semibold rounded-full bg-slate-100/70 text-slate-600 border border-slate-200/50">
                    <?= ucfirst($role->getName()) ?>
                </span>
            </div>

            <!-- ROLE INFO -->
            <h2 class="text-lg font-semibold text-slate-800">
                <?= ucfirst($role->getName()) ?>
            </h2>
            <p class="text-sm text-slate-500 mt-1 flex items-center gap-1.5">
                <i data-lucide="key" class="w-3.5 h-3.5"></i>
                <?= count($role->getPermissions()) ?> permissions assigned
            </p>

            <!-- ACTION BUTTON -->
            <div class="mt-6">
                <?php if ($permission->can('rbac.manage')): ?>
                <a href="<?= BASE_URL ?>/admin/settings/roles/<?= $role->getId() ?>/permissions"
                    class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 rounded-xl transition-all duration-300 shadow-sm shadow-blue-200/50 hover:shadow-md hover:scale-[1.02] btn-shine">
                    <i data-lucide="settings" class="w-4 h-4"></i>
                    Manage Permissions
                </a>
                <?php endif; ?>
            </div>

        </div>

        <?php endforeach; ?>

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