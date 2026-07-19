<div class="space-y-8">

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
    <!-- HERO HEADER – Enhanced with floating glass card           -->
    <!-- ========================================================== -->
    <div class="group relative rounded-2xl overflow-hidden shadow-xl border border-slate-100/60">

        <!-- Banner -->
        <div class="h-72 bg-slate-200">
            <?php if ($club->getBanner()): ?>
            <img src="<?= BASE_URL ?>/uploads/clubs/<?= $club->getBanner() ?>"
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                alt="<?= htmlspecialchars($club->getName()) ?>">
            <?php else: ?>
            <div
                class="w-full h-full flex items-center justify-center text-slate-300 bg-gradient-to-br from-slate-100 to-slate-200">
                <i data-lucide="image" class="w-16 h-16"></i>
            </div>
            <?php endif; ?>
        </div>

        <!-- Glass overlay with gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/80 via-slate-900/50 to-transparent"></div>

        <!-- Decorative glow orbs -->
        <div class="absolute top-10 right-10 w-32 h-32 rounded-full bg-blue-500/20 blur-3xl animate-pulseGlow"></div>
        <div class="absolute bottom-10 left-10 w-48 h-48 rounded-full bg-indigo-500/20 blur-3xl animate-pulseGlow"
            style="animation-delay: 1.5s;"></div>

        <!-- Content -->
        <div class="absolute inset-0 flex flex-col justify-end p-8 md:p-10 text-white">

            <!-- Category -->
            <span
                class="w-fit mb-3 px-4 py-1.5 rounded-full bg-blue-600/80 backdrop-blur-sm text-xs font-semibold shadow-lg">
                <?= htmlspecialchars($club->getCategoryName()) ?>
            </span>

            <!-- Name -->
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold drop-shadow-lg">
                <?= htmlspecialchars($club->getName()) ?>
            </h1>

            <!-- Short name + status -->
            <div class="mt-2 flex flex-wrap items-center gap-3 text-sm text-slate-200">
                <span><?= htmlspecialchars($club->getShortName() ?? '') ?></span>
                <span class="text-slate-400">•</span>
                <span
                    class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full bg-white/10 backdrop-blur-sm border border-white/10">
                    <span
                        class="w-1.5 h-1.5 rounded-full <?= $club->getStatus() === 'active' ? 'bg-emerald-400 animate-pulse' : 'bg-red-400' ?>"></span>
                    <?= ucfirst(htmlspecialchars($club->getStatus())) ?>
                </span>
            </div>

        </div>
    </div>

    <!-- ========================================================== -->
    <!-- ACTION BUTTONS – Glass style                              -->
    <!-- ========================================================== -->
    <div class="flex flex-wrap gap-3">
        <a href="<?= BASE_URL ?>/admin/clubs"
            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left" class="w-4 h-4 transition-transform group-hover:-translate-x-1"></i>
            Back
        </a>
        <a href="<?= BASE_URL ?>/admin/clubs/<?= $club->getId() ?>/edit"
            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold text-sm transition-all duration-300 shadow-md shadow-blue-200/50 hover:shadow-xl hover:scale-[1.02] btn-shine">
            <i data-lucide="square-pen" class="w-4 h-4"></i>
            Edit Club
        </a>
        <a href="<?= BASE_URL ?>/admin/clubs/<?= $club->getId() ?>/members"
            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-semibold text-sm transition-all duration-300 shadow-md shadow-slate-200/50 hover:shadow-xl hover:scale-[1.02]">
            <i data-lucide="users" class="w-4 h-4"></i>
            Manage Members
        </a>
    </div>

    <!-- ========================================================== -->
    <!-- STATISTICS – Glass cards with hover lift                  -->
    <!-- ========================================================== -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-5 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <p class="text-sm text-slate-500">Total Members</p>
            <div class="flex items-end justify-between mt-2">
                <h3 class="text-2xl font-bold text-slate-800"><?= $club->getMemberCount() ?></h3>
                <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="users" class="w-5 h-5"></i>
                </div>
            </div>
        </div>
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-5 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <p class="text-sm text-slate-500">Leadership</p>
            <div class="flex items-end justify-between mt-2">
                <h3 class="text-2xl font-bold text-slate-800"><?= count($leadership ?? []) ?></h3>
                <div class="w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">
                    <i data-lucide="crown" class="w-5 h-5"></i>
                </div>
            </div>
        </div>
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-5 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <p class="text-sm text-slate-500">Events</p>
            <div class="flex items-end justify-between mt-2">
                <h3 class="text-2xl font-bold text-slate-800"><?= count($events ?? []) ?></h3>
                <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center">
                    <i data-lucide="calendar" class="w-5 h-5"></i>
                </div>
            </div>
        </div>
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-5 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <p class="text-sm text-slate-500">Created Date</p>
            <div class="flex items-end justify-between mt-2">
                <h3 class="text-base font-bold text-slate-800"><?= $club->getCreatedAt() ?></h3>
                <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="calendar-plus" class="w-5 h-5"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- CLUB INFORMATION – Glass 2‑column grid                    -->
    <!-- ========================================================== -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- About -->
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">
            <h2 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i data-lucide="info" class="w-5 h-5 text-blue-600"></i>
                Club Information
            </h2>
            <p class="text-sm text-slate-600 leading-relaxed">
                <?= nl2br(htmlspecialchars($club->getDescription() ?? '')) ?>
            </p>
        </div>
        <!-- Contact -->
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">
            <h2 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i data-lucide="phone" class="w-5 h-5 text-blue-600"></i>
                Contact Information
            </h2>
            <div class="space-y-3 text-sm">
                <div class="flex items-center gap-2">
                    <i data-lucide="mail" class="w-4 h-4 text-slate-400"></i>
                    <span class="text-slate-600">Email: <strong
                            class="text-slate-800"><?= htmlspecialchars($club->getEmail() ?? '-') ?></strong></span>
                </div>
                <div class="flex items-center gap-2">
                    <i data-lucide="phone" class="w-4 h-4 text-slate-400"></i>
                    <span class="text-slate-600">Phone: <strong
                            class="text-slate-800"><?= htmlspecialchars($club->getPhone() ?? '-') ?></strong></span>
                </div>
                <div class="flex items-center gap-2">
                    <i data-lucide="users" class="w-4 h-4 text-slate-400"></i>
                    <span class="text-slate-600">Member Limit: <strong
                            class="text-slate-800"><?= $club->getMemberLimit() ?></strong></span>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- MISSION & VISION – Glass cards                            -->
    <!-- ========================================================== -->
    <div class="grid md:grid-cols-2 gap-6">
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <div class="flex items-center gap-2 mb-3">
                <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="target" class="w-4 h-4"></i>
                </div>
                <h3 class="font-bold text-slate-800">Mission</h3>
            </div>
            <p class="text-sm text-slate-600 leading-relaxed">
                <?= nl2br(htmlspecialchars($club->getMission() ?? '')) ?>
            </p>
        </div>
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <div class="flex items-center gap-2 mb-3">
                <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">
                    <i data-lucide="eye" class="w-4 h-4"></i>
                </div>
                <h3 class="font-bold text-slate-800">Vision</h3>
            </div>
            <p class="text-sm text-slate-600 leading-relaxed">
                <?= nl2br(htmlspecialchars($club->getVision() ?? '')) ?>
            </p>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- LEADERSHIP TEAM – Glass grid                              -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                <i data-lucide="crown" class="w-5 h-5"></i>
            </div>
            <div>
                <h2 class="font-bold text-slate-800">Leadership Team</h2>
                <p class="text-sm text-slate-500">Club management committee</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <?php if (!empty($leadership)): ?>
            <?php foreach ($leadership as $leader): ?>
            <div
                class="glass-card-light rounded-xl border border-slate-100/60 shadow-sm p-5 transition-all duration-300 hover:shadow-md hover:border-blue-200/50 hover:-translate-y-1">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-100 to-blue-200 text-blue-700 flex items-center justify-center font-bold text-lg shadow-sm">
                        <?= strtoupper(substr($leader['name'], 0, 1)) ?>
                    </div>
                    <div>
                        <p class="text-xs uppercase text-slate-400 font-semibold tracking-wider">
                            <?= htmlspecialchars($leader['role']) ?>
                        </p>
                        <h3 class="font-semibold text-slate-800 mt-0.5">
                            <?= htmlspecialchars($leader['name']) ?>
                        </h3>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <div class="md:col-span-3 text-center py-8 text-slate-500">
                <i data-lucide="users" class="w-10 h-10 mx-auto text-slate-300 mb-3"></i>
                <p class="font-medium">No leadership assigned yet.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- RECENT MEMBERS – Glass table with enhanced styling        -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <!-- Header -->
        <div
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-6 border-b border-slate-100/60 bg-white/20 backdrop-blur-sm">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="users" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="font-bold text-slate-800">Recent Members</h2>
                    <p class="text-sm text-slate-500">View members and manage club roles</p>
                </div>
            </div>
            <a href="<?= BASE_URL ?>/admin/clubs/<?= $club->getId() ?>/members"
                class="inline-flex items-center gap-1.5 text-sm text-blue-600 font-semibold hover:text-blue-700 transition group">
                View All
                <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead
                    class="bg-slate-50/50 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-200/60">
                    <tr>
                        <th class="px-6 py-3 text-left">Member</th>
                        <th class="px-6 py-3 text-left">Current Role</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Joined</th>
                        <th class="px-6 py-3 text-right">Assign Role</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/60">
                    <?php if (!empty($members)): ?>
                    <?php foreach (array_slice($members, 0, 5) as $member): ?>
                    <tr class="hover:bg-slate-50/40 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-100 to-blue-200 text-blue-700 flex items-center justify-center font-bold flex-shrink-0 shadow-sm">
                                    <?= strtoupper(substr($member['name'], 0, 1)) ?>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-800"><?= htmlspecialchars($member['name']) ?></p>
                                    <p class="text-xs text-slate-500 mt-0.5"><?= htmlspecialchars($member['email']) ?>
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-xs font-semibold border border-blue-100/50">
                                <?= htmlspecialchars($member['role']) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <?php
                                $statusClass = match ($member['status']) {
                                    'approved' => 'bg-emerald-50 text-emerald-700 border-emerald-200/50',
                                    'pending' => 'bg-amber-50 text-amber-700 border-amber-200/50',
                                    'rejected' => 'bg-red-50 text-red-700 border-red-200/50',
                                    default => 'bg-slate-100 text-slate-600 border-slate-200/50'
                                };
                            ?>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold <?= $statusClass ?> border">
                                <?= ucfirst(htmlspecialchars($member['status'])) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-slate-500 whitespace-nowrap">
                            <?= !empty($member['joined_at']) ? date('M d, Y', strtotime($member['joined_at'])) : '-' ?>
                        </td>
                        <td class="px-6 py-4">
                            <form method="POST" action="<?= BASE_URL ?>/admin/memberships/update-role"
                                class="flex items-center justify-end gap-2">
                                <input type="hidden" name="membership_id" value="<?= (int)$member['id'] ?>">
                                <input type="hidden" name="club_id" value="<?= (int)$club->getId() ?>">
                                <select name="role_id"
                                    class="min-w-36 px-3 py-2 rounded-lg border border-slate-200/80 bg-white/50 backdrop-blur-sm text-sm text-slate-700 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition hover:border-blue-200">
                                    <?php foreach ($roles as $role): ?>
                                    <option value="<?= (int)$role['id'] ?>"
                                        <?= (int)$member['club_role_id'] === (int)$role['id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($role['name']) ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="submit"
                                    class="inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-semibold transition-all duration-300 shadow-sm shadow-blue-200/50 hover:shadow-md hover:scale-[1.02] btn-shine">
                                    <i data-lucide="check" class="w-4 h-4"></i>
                                    Save
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div
                                class="w-12 h-12 mx-auto rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mb-3">
                                <i data-lucide="users" class="w-6 h-6"></i>
                            </div>
                            <p class="font-semibold text-slate-700">No members found</p>
                            <p class="text-sm text-slate-500 mt-1">This club does not have any members yet.</p>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- ── Scripts for Lucide Icons and Animations ── -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
</script>