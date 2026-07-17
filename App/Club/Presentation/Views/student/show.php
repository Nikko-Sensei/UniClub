<main class="max-w-7xl mx-auto px-4 lg:px-6 py-8">

    <!-- ====================================================== -->
    <!-- HERO -->
    <!-- ====================================================== -->

    <section class="relative rounded-3xl overflow-hidden h-[420px] shadow-2xl group">

        <?php if ($club->getBanner()): ?>
        <img src="<?= BASE_URL ?>/uploads/clubs/<?= $club->getBanner() ?>"
            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
        <?php else: ?>
        <div class="absolute inset-0 bg-gradient-to-br from-slate-800 to-blue-900"></div>
        <?php endif; ?>

        <!-- Overlay with subtle pattern -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-black/5"></div>
        <div class="absolute inset-0 opacity-20"
            style="background-image: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 24px 24px;">
        </div>

        <div class="absolute bottom-0 left-0 right-0 p-8 lg:p-12">

            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">

                <div>

                    <span
                        class="inline-flex items-center rounded-full bg-blue-600/80 backdrop-blur-md px-4 py-1.5 text-xs font-semibold text-white shadow-lg">
                        <?= htmlspecialchars($club->getCategoryName()) ?>
                    </span>

                    <h1 class="mt-4 text-4xl lg:text-6xl font-extrabold text-white drop-shadow-lg">
                        <?= htmlspecialchars($club->getName()) ?>
                    </h1>

                    <p class="mt-3 max-w-2xl text-blue-100/90 text-lg">
                        <?= htmlspecialchars($club->getDescription()) ?>
                    </p>

                    <div class="flex flex-wrap items-center gap-6 mt-6 text-white/90 text-sm">

                        <div class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full">
                            👥 <span><?= $club->getMemberCount() ?> Members</span>
                        </div>

                        <div class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full">
                            📅 <span>Active since <?= date('Y', strtotime($club->getCreatedAt())) ?></span>
                        </div>

                    </div>

                </div>

                <div class="flex-shrink-0">
                    <!-- <div class="flex flex-col sm:flex-row gap-3"> -->


                    <?php if (isset($_SESSION['user'])): ?>


                    <?php if ($membershipStatus === 'approved'): ?>


                    <button disabled class="flex-1 bg-green-100
                            text-green-700
                            py-3 rounded-xl
                            font-semibold text-sm">

                        ✓ Joined Member

                    </button>



                    <?php elseif ($membershipStatus === 'pending'): ?>


                    <button disabled class="flex-1 bg-yellow-100
                        text-yellow-700
                        py-3 rounded-xl
                        font-semibold text-sm">

                        Waiting Approval

                    </button>



                    <?php else: ?>


                    <form method="POST" action="<?= BASE_URL ?>/clubs/<?= $club->getId() ?>/join" class="flex-1">


                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">



                        <button type="submit" class="w-full bg-blue-600
                            hover:bg-blue-700
                            text-white py-3
                            px-6
                            rounded-xl
                            font-semibold text-sm
                            transition">

                            Join Club

                        </button>


                    </form>


                    <?php endif; ?>



                    <?php else: ?>


                    <a href="<?= BASE_URL ?>/login" class="flex-1 bg-blue-600
                            hover:bg-blue-700
                            text-white text-center
                            py-3 rounded-xl
                            font-semibold text-sm">

                        Login to Join

                    </a>


                    <?php endif; ?>


                </div>


            </div>

        </div>

    </section>

    <!-- ====================================================== -->
    <!-- CONTENT -->
    <!-- ====================================================== -->

    <section class="grid lg:grid-cols-3 gap-8 mt-10">

        <!-- LEFT - About -->
        <div class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-8 transition hover:shadow-xl">
                <h2 class="text-2xl font-bold text-slate-800 mb-6 flex items-center gap-3">
                    <span
                        class="w-8 h-8 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center text-sm">📖</span>
                    About Club
                </h2>
                <p class="leading-8 text-slate-600">
                    <?= nl2br(htmlspecialchars($club->getDescription())) ?>
                </p>
            </div>

        </div>

        <!-- RIGHT - Info Sidebar -->
        <div>

            <div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6 sticky top-6">

                <h2 class="text-lg font-bold text-slate-800 mb-5 flex items-center gap-2">
                    <span class="text-blue-600">ℹ️</span> Club Information
                </h2>

                <div class="space-y-4 divide-y divide-slate-100">

                    <div class="flex justify-between items-center pt-3 first:pt-0">
                        <span class="text-slate-500 text-sm">Category</span>
                        <span
                            class="font-semibold text-slate-800"><?= htmlspecialchars($club->getCategoryName()) ?></span>
                    </div>

                    <div class="flex justify-between items-center pt-3">
                        <span class="text-slate-500 text-sm">Members</span>
                        <span class="font-semibold text-slate-800"><?= $club->getMemberCount() ?></span>
                    </div>

                    <div class="flex justify-between items-center pt-3">
                        <span class="text-slate-500 text-sm">Created</span>
                        <span
                            class="font-semibold text-slate-800"><?= date('F Y', strtotime($club->getCreatedAt())) ?></span>
                    </div>

                    <div class="flex justify-between items-center pt-3">
                        <span class="text-slate-500 text-sm">Status</span>
                        <span
                            class="inline-flex items-center gap-1 bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            Active
                        </span>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ====================================================== -->
    <!-- MISSION & VISION -->
    <!-- ====================================================== -->

    <section class="grid md:grid-cols-2 gap-6 mt-10">

        <!-- Mission -->
        <div
            class="bg-white rounded-2xl border border-slate-100 shadow-lg p-8 hover:shadow-xl transition-all hover:-translate-y-1">

            <div class="flex items-center gap-3 mb-5">
                <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600 text-xl">
                    🎯
                </div>
                <h2 class="text-2xl font-bold text-slate-800">Mission</h2>
            </div>

            <p class="text-slate-600 leading-7">
                <?= nl2br(htmlspecialchars($club->getMission())) ?>
            </p>

        </div>

        <!-- Vision -->
        <div
            class="bg-white rounded-2xl border border-slate-100 shadow-lg p-8 hover:shadow-xl transition-all hover:-translate-y-1">

            <div class="flex items-center gap-3 mb-5">
                <div class="w-12 h-12 rounded-2xl bg-cyan-100 flex items-center justify-center text-cyan-600 text-xl">
                    🔭
                </div>
                <h2 class="text-2xl font-bold text-slate-800">Vision</h2>
            </div>

            <p class="text-slate-600 leading-7">
                <?= nl2br(htmlspecialchars($club->getVision())) ?>
            </p>

        </div>

    </section>

    <!-- ====================================================== -->
    <!-- LEADERSHIP -->
    <!-- ====================================================== -->

    <section class="mt-12">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-slate-800 flex items-center gap-3">
                <span class="text-blue-600">👥</span> Leadership
            </h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <?php foreach ($leadership as $leader): ?>

            <div
                class="bg-white rounded-2xl border border-slate-100 shadow-lg p-6 text-center hover:shadow-xl transition-all hover:-translate-y-1 group">

                <!-- Avatar -->
                <?php if (!empty($leader['profile_image'])): ?>
                <img src="<?= BASE_URL ?>/uploads/users/<?= $leader['profile_image'] ?>"
                    class="w-24 h-24 rounded-full object-cover mx-auto mb-4 ring-2 ring-blue-100 transition group-hover:ring-blue-300">
                <?php else: ?>
                <div
                    class="w-24 h-24 rounded-full bg-gradient-to-br from-blue-100 to-blue-200 text-blue-700 flex items-center justify-center mx-auto mb-4 text-3xl font-bold ring-2 ring-blue-100 transition group-hover:ring-blue-300">
                    <?= strtoupper(substr($leader['name'], 0, 1)) ?>
                </div>
                <?php endif; ?>

                <h3 class="font-bold text-slate-800 text-lg">
                    <?= htmlspecialchars($leader['name']) ?>
                </h3>

                <p class="text-sm text-blue-600 mt-1 inline-block bg-blue-50 px-3 py-0.5 rounded-full">
                    <?= htmlspecialchars($leader['role']) ?>
                </p>

            </div>

            <?php endforeach; ?>

        </div>

    </section>

    <!-- ====================================================== -->
    <!-- UPCOMING EVENTS -->
    <!-- ====================================================== -->

    <section class="mt-12">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-slate-800 flex items-center gap-3">
                    <span class="text-blue-600">📅</span> Upcoming Events
                </h2>
                <p class="text-sm text-slate-500 mt-1">Join our latest activities and events</p>
            </div>
            <a href="<?= BASE_URL ?>/events"
                class="text-sm font-semibold text-blue-600 hover:text-blue-700 flex items-center gap-1 group">
                View All
                <span class="transition-transform group-hover:translate-x-1">→</span>
            </a>
        </div>

        <?php if (empty($events)): ?>

        <!-- Empty State -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-lg p-12 text-center">

            <div class="w-20 h-20 mx-auto rounded-full bg-blue-100 flex items-center justify-center text-3xl">
                🎉
            </div>

            <h3 class="mt-4 font-bold text-xl text-slate-800">No Upcoming Events</h3>
            <p class="text-slate-500 text-sm mt-2 max-w-sm mx-auto">This club has no scheduled events yet. Check back
                later or suggest an event!</p>

        </div>

        <?php else: ?>

        <!-- Event Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <?php foreach ($events as $event): ?>

            <div
                class="bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 group">

                <!-- Event Image -->
                <div class="relative h-48 bg-slate-100 overflow-hidden">

                    <?php if (!empty($event['banner'])): ?>
                    <img src="<?= BASE_URL ?>/uploads/events/<?= $event['banner'] ?>"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center text-slate-300 text-5xl">
                        📅
                    </div>
                    <?php endif; ?>

                    <!-- Date Badge -->
                    <div
                        class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-blue-600 shadow">
                        <?= date('d M Y', strtotime($event['event_date'])) ?>
                    </div>

                </div>

                <!-- Content -->
                <div class="p-5">

                    <h3 class="font-bold text-lg text-slate-800 line-clamp-1">
                        <?= htmlspecialchars($event['title']) ?>
                    </h3>

                    <p class="text-sm text-slate-600 mt-2 line-clamp-2">
                        <?= htmlspecialchars($event['description']) ?>
                    </p>

                    <div class="mt-4 flex items-center justify-between">

                        <span class="text-xs text-slate-500 flex items-center gap-1">
                            <span>📍</span> <?= htmlspecialchars($event['venue']) ?>
                        </span>

                        <!-- <a href="/events/<?= $event['id'] ?>"
                            class="text-sm font-semibold text-blue-600 hover:text-blue-700 flex items-center gap-1 group-hover:gap-2 transition-all">
                            View
                            <span>→</span>
                        </a> -->

                    </div>

                </div>

            </div>

            <?php endforeach; ?>

        </div>

        <?php endif; ?>

    </section>

</main>