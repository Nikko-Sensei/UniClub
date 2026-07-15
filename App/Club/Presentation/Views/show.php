<main class="max-w-7xl mx-auto px-4 lg:px-6 py-8">

    <!-- HERO -->
    <section class="relative rounded-2xl overflow-hidden min-h-[360px] md:h-[420px] shadow-xl group">
        <?php if ($club->getBanner()): ?>
        <img src="<?= BASE_URL ?>/uploads/clubs/<?= $club->getBanner() ?>"
            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
            alt="">
        <?php else: ?>
        <div class="absolute inset-0 bg-gradient-to-br from-slate-800 to-blue-900"></div>
        <?php endif; ?>

        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-black/10"></div>

        <div class="relative h-full flex flex-col justify-end p-6 md:p-10 gap-6">
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
                <div>
                    <span
                        class="inline-flex items-center rounded-full bg-blue-600/90 backdrop-blur-md px-3.5 py-1 text-xs font-semibold text-white">
                        <?= htmlspecialchars($club->getCategoryName()) ?>
                    </span>

                    <h1 class="mt-4 text-3xl md:text-5xl font-extrabold text-white leading-tight">
                        <?= htmlspecialchars($club->getName()) ?>
                    </h1>

                    <p class="mt-3 max-w-2xl text-blue-100/90 text-sm md:text-base">
                        <?= htmlspecialchars($club->getDescription()) ?>
                    </p>

                    <div class="flex flex-wrap items-center gap-3 mt-5 text-white text-xs">
                        <span class="flex items-center gap-1.5 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-full">
                            <i data-lucide="users" class="w-3.5 h-3.5"></i> <?= $club->getMemberCount() ?> Members
                        </span>
                        <span class="flex items-center gap-1.5 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-full">
                            <i data-lucide="calendar" class="w-3.5 h-3.5"></i> Active since
                            <?= date('Y', strtotime($club->getCreatedAt())) ?>
                        </span>
                    </div>
                </div>

                <div class="flex-shrink-0 w-full sm:w-auto">
                    <?php if (isset($_SESSION['user'])): ?>
                    <?php if ($membershipStatus === 'approved'): ?>
                    <button disabled
                        class="w-full sm:w-auto flex items-center justify-center gap-2 bg-emerald-500 text-white px-6 py-3 rounded-xl font-semibold text-sm">
                        <i data-lucide="check-circle-2" class="w-4 h-4"></i> Joined Member
                    </button>
                    <?php elseif ($membershipStatus === 'pending'): ?>
                    <button disabled
                        class="w-full sm:w-auto flex items-center justify-center gap-2 bg-amber-400 text-amber-950 px-6 py-3 rounded-xl font-semibold text-sm">
                        <i data-lucide="clock-3" class="w-4 h-4"></i> Waiting Approval
                    </button>
                    <?php else: ?>
                    <form method="POST" action="<?= BASE_URL ?>/clubs/<?= $club->getId() ?>/join">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                        <button type="submit"
                            class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold text-sm transition">
                            Join Club
                        </button>
                    </form>
                    <?php endif; ?>
                    <?php else: ?>
                    <a href="<?= BASE_URL ?>/login"
                        class="block w-full sm:w-auto text-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold text-sm transition">
                        Login to Join
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT + INFO -->
    <section class="grid lg:grid-cols-3 gap-6 mt-8">
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
            <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2.5">
                <span class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center">
                    <i data-lucide="book-open" class="w-4 h-4"></i>
                </span>
                About Club
            </h2>
            <p class="leading-7 text-slate-600 text-sm md:text-base">
                <?= nl2br(htmlspecialchars($club->getDescription())) ?></p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 lg:sticky lg:top-20 h-fit">
            <h2 class="text-base font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i data-lucide="info" class="w-4 h-4 text-blue-600"></i> Club Information
            </h2>

            <div class="divide-y divide-slate-100 text-sm">
                <div class="flex justify-between py-3 first:pt-0">
                    <span class="text-slate-500">Category</span>
                    <span class="font-semibold text-slate-800"><?= htmlspecialchars($club->getCategoryName()) ?></span>
                </div>
                <div class="flex justify-between py-3">
                    <span class="text-slate-500">Members</span>
                    <span class="font-semibold text-slate-800"><?= $club->getMemberCount() ?></span>
                </div>
                <div class="flex justify-between py-3">
                    <span class="text-slate-500">Created</span>
                    <span
                        class="font-semibold text-slate-800"><?= date('F Y', strtotime($club->getCreatedAt())) ?></span>
                </div>
                <div class="flex justify-between items-center py-3 last:pb-0">
                    <span class="text-slate-500">Status</span>
                    <span
                        class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-full text-xs font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Active
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- MISSION & VISION -->
    <section class="grid md:grid-cols-2 gap-6 mt-8">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8 hover:shadow-md transition">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                    <i data-lucide="target" class="w-5 h-5"></i>
                </div>
                <h2 class="text-lg font-bold text-slate-800">Mission</h2>
            </div>
            <p class="text-slate-600 text-sm leading-7"><?= nl2br(htmlspecialchars($club->getMission())) ?></p>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8 hover:shadow-md transition">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-11 h-11 rounded-xl bg-cyan-100 text-cyan-600 flex items-center justify-center">
                    <i data-lucide="telescope" class="w-5 h-5"></i>
                </div>
                <h2 class="text-lg font-bold text-slate-800">Vision</h2>
            </div>
            <p class="text-slate-600 text-sm leading-7"><?= nl2br(htmlspecialchars($club->getVision())) ?></p>
        </div>
    </section>

    <!-- LEADERSHIP -->
    <section class="mt-10">
        <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2.5 mb-5">
            <i data-lucide="users" class="w-5 h-5 text-blue-600"></i> Leadership
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            <?php foreach ($leadership as $leader): ?>
            <div
                class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 text-center hover:shadow-md hover:-translate-y-0.5 transition-all">
                <?php if (!empty($leader['profile_image'])): ?>
                <img src="<?= BASE_URL ?>/uploads/users/<?= $leader['profile_image'] ?>"
                    class="w-20 h-20 rounded-full object-cover mx-auto mb-3 ring-2 ring-blue-100" alt="">
                <?php else: ?>
                <div
                    class="w-20 h-20 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center mx-auto mb-3 text-2xl font-bold ring-2 ring-blue-100">
                    <?= strtoupper(substr($leader['name'], 0, 1)) ?>
                </div>
                <?php endif; ?>
                <h3 class="font-bold text-slate-800 text-sm"><?= htmlspecialchars($leader['name']) ?></h3>
                <p class="text-xs text-blue-600 mt-1 inline-block bg-blue-50 px-2.5 py-0.5 rounded-full">
                    <?= htmlspecialchars($leader['position']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- UPCOMING EVENTS -->
    <section class="mt-10">
        <div class="flex items-center justify-between mb-5">
            <div>
                <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2.5">
                    <i data-lucide="calendar-days" class="w-5 h-5 text-blue-600"></i> Upcoming Events
                </h2>
                <p class="text-sm text-slate-500 mt-1">Join our latest activities and events</p>
            </div>
            <a href="<?= BASE_URL ?>/events"
                class="text-sm font-semibold text-blue-600 hover:text-blue-700 flex items-center gap-1 group">
                View All <span class="transition-transform group-hover:translate-x-1">→</span>
            </a>
        </div>

        <?php if (empty($events)): ?>
        <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-12 text-center">
            <div class="w-16 h-16 mx-auto rounded-full bg-blue-50 text-blue-500 flex items-center justify-center mb-4">
                <i data-lucide="party-popper" class="w-7 h-7"></i>
            </div>
            <h3 class="font-bold text-lg text-slate-800">No Upcoming Events</h3>
            <p class="text-slate-500 text-sm mt-1.5 max-w-sm mx-auto">This club has no scheduled events yet. Check back
                later.</p>
        </div>
        <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($events as $event): ?>
            <div
                class="bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all group">
                <div class="relative h-44 bg-slate-100 overflow-hidden">
                    <?php if (!empty($event['banner'])): ?>
                    <img src="<?= BASE_URL ?>/uploads/events/<?= $event['banner'] ?>"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        alt="">
                    <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center text-slate-300">
                        <i data-lucide="calendar" class="w-10 h-10"></i>
                    </div>
                    <?php endif; ?>
                    <div
                        class="absolute top-3 left-3 bg-white/95 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-blue-600 shadow-sm">
                        <?= date('d M Y', strtotime($event['event_date'])) ?>
                    </div>
                </div>

                <div class="p-5">
                    <h3 class="font-bold text-slate-800 line-clamp-1"><?= htmlspecialchars($event['title']) ?></h3>
                    <p class="text-sm text-slate-500 mt-1.5 line-clamp-2"><?= htmlspecialchars($event['description']) ?>
                    </p>

                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-xs text-slate-500 flex items-center gap-1.5">
                            <i data-lucide="map-pin" class="w-3.5 h-3.5"></i> <?= htmlspecialchars($event['venue']) ?>
                        </span>
                        <a href="<?= BASE_URL ?>/events/<?= $event['id'] ?>"
                            class="text-sm font-semibold text-blue-600 hover:text-blue-700 flex items-center gap-1 group-hover:gap-1.5 transition-all">
                            View <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </section>

</main>