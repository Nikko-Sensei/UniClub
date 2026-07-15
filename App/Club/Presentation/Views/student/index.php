<main class="max-w-7xl mx-auto px-4 md:px-6 py-8 w-full">

    <!-- HERO -->
    <div class="relative rounded-2xl overflow-hidden shadow-lg mb-8 aspect-[16/9] sm:aspect-[21/9] md:aspect-[3/1]">
        <div class="absolute inset-0 bg-cover bg-center"
            style="background-image:url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80');">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/85 via-slate-900/50 to-transparent"></div>

        <div class="relative h-full flex flex-col justify-center p-6 md:p-12 text-white max-w-2xl">
            <span
                class="inline-flex items-center gap-1.5 bg-blue-600 text-xs font-semibold px-3 py-1 rounded-full w-fit mb-4">
                <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Featured Community
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold mb-3 leading-tight">Discover University Clubs</h1>
            <p class="text-sm md:text-base text-slate-200 mb-6 max-w-lg">
                Explore communities, connect with students, and join activities that match your interests.
            </p>
            <a href="#clubs"
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-xl text-sm font-semibold w-fit transition">
                Browse Clubs <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>

    <!-- SEARCH + FILTER -->
    <form method="GET" class="bg-white rounded-2xl border border-slate-200 shadow-sm p-4 sm:p-5 mb-8">
        <div class="flex flex-col lg:flex-row gap-3">

            <div class="relative flex-1">
                <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-4.5 h-4.5 text-slate-400"></i>
                <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                    placeholder="Search clubs..."
                    class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-200 text-sm placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition">
            </div>

            <div class="relative">
                <i data-lucide="layers"
                    class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none"></i>
                <select name="category_id" onchange="this.form.submit()"
                    class="appearance-none w-full lg:w-56 pl-11 pr-9 py-3 rounded-xl border border-slate-200 text-sm bg-white cursor-pointer focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition">
                    <option value="">All Categories</option>
                    <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"
                        <?= ($_GET['category_id'] ?? '') == $category['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($category['name']) ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <i data-lucide="chevron-down"
                    class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none"></i>
            </div>

            <a href="<?= BASE_URL ?>/my-clubs"
                class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold shadow-sm transition whitespace-nowrap">
                <i data-lucide="users" class="w-4.5 h-4.5"></i> My Clubs
            </a>
        </div>
    </form>

    <div class="flex justify-between items-center mb-5">
        <h2 class="text-xl font-bold text-slate-800">Explore Clubs</h2>
        <span class="text-sm text-slate-500"><?= $pagination['total'] ?> clubs found</span>
    </div>

    <!-- GRID -->
    <div id="clubs" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">

        <?php if (empty($clubs)): ?>
        <div class="col-span-full bg-white rounded-2xl border border-dashed border-slate-300 p-12 text-center">
            <div class="w-16 h-16 mx-auto rounded-full bg-blue-50 text-blue-500 flex items-center justify-center mb-4">
                <i data-lucide="search-x" class="w-7 h-7"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-700">No Clubs Found</h3>
            <p class="text-slate-500 mt-1 text-sm">Try another search term or category.</p>
        </div>
        <?php endif; ?>

        <?php foreach ($clubs as $club): ?>
        <div
            class="bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all">

            <div class="relative h-44 bg-slate-100">
                <?php if ($club->getBanner()): ?>
                <img src="<?= BASE_URL ?>/uploads/clubs/<?= $club->getBanner() ?>" class="w-full h-full object-cover"
                    alt="<?= htmlspecialchars($club->getName()) ?>">
                <?php else: ?>
                <div class="h-full flex items-center justify-center text-slate-300">
                    <i data-lucide="users" class="w-12 h-12"></i>
                </div>
                <?php endif; ?>

                <div
                    class="absolute bottom-3 right-3 bg-white/95 backdrop-blur px-3 py-1 rounded-full text-xs font-semibold text-slate-700 shadow-sm">
                    <?= $club->getMemberCount() ?> Members
                </div>
            </div>

            <div class="p-5">
                <span class="inline-block bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-semibold mb-3">
                    <?= htmlspecialchars($club->getCategoryName()) ?>
                </span>

                <h3 class="text-lg font-bold text-slate-800 mb-1.5 line-clamp-1">
                    <?= htmlspecialchars($club->getName()) ?></h3>
                <p class="text-sm text-slate-500 line-clamp-2 mb-5"><?= htmlspecialchars($club->getDescription()) ?></p>

                <a href="<?= BASE_URL ?>/clubs/<?= $club->getId() ?>"
                    class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-xl text-sm font-semibold transition">
                    View Details <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- PAGINATION -->
    <?php if ($pagination['total_pages'] > 1):
        $current = $pagination['current_page'];
        $total   = $pagination['total_pages'];
        $prevQuery = array_merge($_GET, ['page' => max(1, $current - 1)]);
        $nextQuery = array_merge($_GET, ['page' => min($total, $current + 1)]);
    ?>
    <div class="flex justify-center items-center gap-3 mt-4">
        <a href="?<?= http_build_query($prevQuery) ?>#clubs"
            class="flex items-center gap-1.5 px-4 py-2.5 rounded-xl border text-sm font-semibold transition <?= $current == 1 ? 'pointer-events-none opacity-40 bg-slate-100 border-slate-200' : 'bg-white hover:bg-blue-50 text-slate-700 border-slate-200' ?>">
            <i data-lucide="chevron-left" class="w-4 h-4"></i> Previous
        </a>

        <div class="px-4 py-2.5 rounded-xl bg-blue-50 text-blue-600 text-sm font-semibold">
            Page <?= $current ?> of <?= $total ?>
        </div>

        <a href="?<?= http_build_query($nextQuery) ?>#clubs"
            class="flex items-center gap-1.5 px-4 py-2.5 rounded-xl border text-sm font-semibold transition <?= $current == $total ? 'pointer-events-none opacity-40 bg-slate-100 border-slate-200' : 'bg-white hover:bg-blue-50 text-slate-700 border-slate-200' ?>">
            Next <i data-lucide="chevron-right" class="w-4 h-4"></i>
        </a>
    </div>
    <?php endif; ?>

</main>