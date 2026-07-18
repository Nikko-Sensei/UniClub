<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UniClub · University Club Management</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com">
    </script>

    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap"
        rel="stylesheet" />

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest">
    </script>

    <style>
    /* ── Base ── */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: #F8FAFC;
        color: #111827;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* ── Custom Animations ── */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(40px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-12px);
        }
    }

    @keyframes pulseGlow {

        0%,
        100% {
            opacity: 0.3;
            transform: scale(1);
        }

        50% {
            opacity: 0.8;
            transform: scale(1.15);
        }
    }

    @keyframes rotateSlow {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* ── Animation Classes ── */
    .animate-fadeInUp {
        animation: fadeInUp 0.9s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .animate-float {
        animation: float 5s ease-in-out infinite;
    }

    .animate-pulseGlow {
        animation: pulseGlow 3.5s ease-in-out infinite;
    }

    .animate-rotateSlow {
        animation: rotateSlow 20s linear infinite;
    }

    /* Stagger delays */
    .delay-100 {
        animation-delay: 100ms;
    }

    .delay-200 {
        animation-delay: 200ms;
    }

    .delay-300 {
        animation-delay: 300ms;
    }

    .delay-400 {
        animation-delay: 400ms;
    }

    /* ── Glassmorphism ── */
    .glass-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    /* ── Button shine effect ── */
    .btn-shine {
        position: relative;
        overflow: hidden;
    }

    .btn-shine::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
        transition: left 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .btn-shine:hover::before {
        left: 100%;
    }

    /* ── Utilities ── */
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    </style>
</head>

<body>

    <!-- ════════════════════════════════════════ -->
    <!--  MAIN CONTENT (no sidebar / header)    -->
    <!-- ════════════════════════════════════════ -->
    <main class="max-w-7xl mx-auto px-4 md:px-6 py-8 w-full">

        <!-- ========== NEW HERO: Full‑width Glass Card with Floating Shapes ========== -->
        <div
            class="group relative rounded-2xl overflow-hidden shadow-2xl mb-8 aspect-[16/9] sm:aspect-[21/9] md:aspect-[3/1] transition-all duration-500 hover:shadow-[0_20px_60px_-15px_rgba(37,99,235,0.4)]">

            <!-- Background image with zoom -->
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 ease-out group-hover:scale-105"
                style="background-image:url('<?= $featuredClub && $featuredClub->getLogo() ? BASE_URL . '/uploads/clubs/' . $featuredClub->getLogo() : 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80' ?>');">
            </div>

            <!-- Dark gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900/80 via-slate-800/70 to-slate-900/60"></div>

            <!-- Decorative floating shapes with animations -->
            <div class="absolute top-10 right-10 w-24 h-24 rounded-full bg-blue-500/20 blur-3xl animate-pulseGlow">
            </div>
            <div class="absolute bottom-10 left-10 w-40 h-40 rounded-full bg-indigo-500/20 blur-3xl animate-pulseGlow"
                style="animation-delay: 1.5s;"></div>
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 rounded-full bg-blue-400/5 blur-2xl animate-rotateSlow">
            </div>

            <!-- Content container – glass card centered -->
            <div class="relative h-full flex items-center justify-center p-6 md:p-10 lg:p-14">
                <!-- Floating glass card with staggered fade‑in -->
                <div class="glass-card rounded-2xl p-8 md:p-10 max-w-3xl w-full shadow-2xl animate-float">
                    <div class="text-center md:text-left space-y-4">
                        <!-- Badge -->
                        <span
                            class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 text-xs font-semibold px-4 py-1.5 rounded-full shadow-lg shadow-black/20 opacity-0 animate-fadeInUp delay-100">
                            <i data-lucide="star" class="w-3.5 h-3.5 text-amber-400 fill-amber-400"></i>
                            Featured Club
                        </span>

                        <!-- Club Name -->
                        <h1
                            class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight drop-shadow-lg text-white opacity-0 animate-fadeInUp delay-200">
                            <?= htmlspecialchars($featuredClub->getName()) ?>
                        </h1>

                        <!-- Description -->
                        <p
                            class="text-base md:text-lg text-white/80 max-w-2xl drop-shadow-md leading-relaxed opacity-0 animate-fadeInUp delay-300">
                            <?= htmlspecialchars($featuredClub->getDescription()) ?>
                        </p>

                        <!-- Stats and CTA -->
                        <div class="flex flex-wrap items-center gap-6 pt-2 opacity-0 animate-fadeInUp delay-400">
                            <!-- Stat pills -->
                            <div class="flex gap-4">
                                <div
                                    class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full border border-white/10 hover:bg-white/20 transition-all duration-300 hover:scale-105">
                                    <i data-lucide="users" class="w-4 h-4 text-blue-400"></i>
                                    <span
                                        class="text-sm font-semibold text-white"><?= $featuredClub->getMemberCount() ?></span>
                                </div>
                                <div
                                    class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full border border-white/10 hover:bg-white/20 transition-all duration-300 hover:scale-105">
                                    <i data-lucide="layers" class="w-4 h-4 text-blue-400"></i>
                                    <span
                                        class="text-sm font-semibold text-white"><?= htmlspecialchars($featuredClub->getCategoryName()) ?></span>
                                </div>
                            </div>

                            <!-- CTA with gradient and shine -->
                            <a href="<?= BASE_URL ?>/clubs/<?= $featuredClub->getId() ?>"
                                class="group/btn inline-flex items-center gap-2 px-8 py-3 rounded-xl text-sm font-semibold transition-all duration-300 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 hover:shadow-2xl hover:shadow-blue-600/30 hover:scale-105 shadow-lg shadow-blue-600/20 btn-shine">
                                Explore Club
                                <i data-lucide="arrow-right"
                                    class="w-4 h-4 transition-transform duration-300 group-hover/btn:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========== SEARCH + FILTER with glass design ========== -->
        <form method="GET"
            class="bg-white/80 backdrop-blur-xl rounded-2xl border border-white/30 shadow-xl shadow-slate-200/50 p-5 sm:p-6 mb-8 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">
            <div class="flex flex-col lg:flex-row gap-4">
                <!-- Search input -->
                <div class="relative flex-1">
                    <i data-lucide="search"
                        class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400 transition-all duration-300 peer-focus:text-blue-500 peer-focus:scale-110"></i>
                    <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                        placeholder="Search clubs..."
                        class="peer w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200/80 bg-white/50 text-sm placeholder:text-slate-400 focus:border-blue-400 focus:ring-4 focus:ring-blue-100/60 focus:bg-white outline-none transition-all duration-300 shadow-sm focus:shadow-lg">
                </div>

                <!-- Category dropdown -->
                <div class="relative min-w-[180px]">
                    <i data-lucide="layers"
                        class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none"></i>
                    <select name="category_id" onchange="this.form.submit()"
                        class="appearance-none w-full pl-11 pr-10 py-3.5 rounded-xl border border-slate-200/80 bg-white/50 text-sm cursor-pointer focus:border-blue-400 focus:ring-4 focus:ring-blue-100/60 focus:bg-white outline-none transition-all duration-300 hover:border-blue-300 shadow-sm hover:shadow-md">
                        <option value="">All Categories</option>
                        <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id'] ?>"
                            <?= ($_GET['category_id'] ?? '') == $category['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($category['name']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <i data-lucide="chevron-down"
                        class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none transition-transform duration-300 group-hover:rotate-180"></i>
                </div>

                <!-- My Clubs button -->
                <a href="<?= BASE_URL ?>/my-clubs"
                    class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-semibold shadow-lg shadow-blue-200/50 transition-all duration-300 hover:scale-[1.02] hover:shadow-xl whitespace-nowrap">
                    <i data-lucide="users" class="w-4.5 h-4.5"></i> My Clubs
                </a>
            </div>
        </form>

        <!-- ========== SECTION HEADER ========== -->
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-xl font-bold text-slate-800">Explore Clubs</h2>
            <span class="text-sm text-slate-500"><?= $pagination['total'] ?> clubs found</span>
        </div>

        <!-- ========== CLUB GRID with card animations ========== -->
        <div id="clubs" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">

            <?php if (empty($clubs)) : ?>
            <div
                class="col-span-full bg-white rounded-2xl border border-dashed border-slate-300 p-12 text-center transition-all duration-300 hover:border-blue-300 hover:shadow-lg">
                <div
                    class="w-16 h-16 mx-auto rounded-full bg-blue-50 text-blue-500 flex items-center justify-center mb-4">
                    <i data-lucide="search-x" class="w-7 h-7"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-700">No Clubs Found</h3>
                <p class="text-slate-500 mt-1 text-sm">Try another search term or category.</p>
            </div>
            <?php endif; ?>

            <?php foreach ($clubs as $club) : ?>
            <!-- Card with slide-up, hover scale & shadow -->
            <div
                class="group bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 ease-out animate-[fadeInUp_0.5s_ease-out]">
                <div class="relative h-44 bg-slate-100 overflow-hidden">
                    <?php if ($club->getBanner()) : ?>
                    <img src="<?= BASE_URL ?>/uploads/clubs/<?= $club->getBanner() ?>"
                        class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                        alt="<?= htmlspecialchars($club->getName()) ?>">
                    <?php elseif ($club->getLogo()) : ?>
                    <img src="<?= BASE_URL ?>/uploads/clubs/<?= $club->getLogo() ?>"
                        class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                        alt="<?= htmlspecialchars($club->getName()) ?>">
                    <?php else : ?>
                    <div
                        class="h-full flex items-center justify-center text-slate-300 transition-colors duration-300 group-hover:text-blue-400">
                        <i data-lucide="users" class="w-12 h-12"></i>
                    </div>
                    <?php endif; ?>

                    <!-- Member count badge with glass -->
                    <div
                        class="absolute bottom-3 right-3 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold text-slate-700 shadow-md transition-all duration-300 group-hover:bg-white group-hover:shadow-lg">
                        <?= $club->getMemberCount() ?> Members
                    </div>
                </div>

                <div class="p-5">
                    <span
                        class="inline-block bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-semibold mb-3 transition-colors duration-300 group-hover:bg-blue-100">
                        <?= htmlspecialchars($club->getCategoryName()) ?>
                    </span>

                    <h3
                        class="text-lg font-bold text-slate-800 mb-1.5 line-clamp-1 transition-colors duration-300 group-hover:text-blue-700">
                        <?= htmlspecialchars($club->getName()) ?>
                    </h3>

                    <p class="text-sm text-slate-500 line-clamp-2 mb-5">
                        <?= htmlspecialchars($club->getDescription()) ?>
                    </p>

                    <a href="<?= BASE_URL ?>/clubs/<?= $club->getId() ?>"
                        class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-xl text-sm font-semibold transition-all duration-300 shadow-sm shadow-blue-200/50 hover:shadow-lg hover:scale-[1.02]">
                        View Details <i data-lucide="arrow-right"
                            class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- ========== PAGINATION with smooth hover ========== -->
        <?php if ($pagination['total_pages'] > 1) :
            $current = $pagination['current_page'];
            $total   = $pagination['total_pages'];
            $prevQuery = array_merge($_GET, ['page' => max(1, $current - 1)]);
            $nextQuery = array_merge($_GET, ['page' => min($total, $current + 1)]);
        ?>
        <div class="flex justify-center items-center gap-3 mt-4">
            <a href="?<?= http_build_query($prevQuery) ?>#clubs"
                class="flex items-center gap-1.5 px-4 py-2.5 rounded-xl border text-sm font-semibold transition-all duration-300 <?= $current == 1 ? 'pointer-events-none opacity-40 bg-slate-100 border-slate-200' : 'bg-white hover:bg-blue-50 hover:border-blue-300 hover:shadow-md text-slate-700 border-slate-200' ?>">
                <i data-lucide="chevron-left" class="w-4 h-4"></i> Previous
            </a>

            <div class="px-4 py-2.5 rounded-xl bg-blue-50 text-blue-600 text-sm font-semibold shadow-sm">
                Page <?= $current ?> of <?= $total ?>
            </div>

            <a href="?<?= http_build_query($nextQuery) ?>#clubs"
                class="flex items-center gap-1.5 px-4 py-2.5 rounded-xl border text-sm font-semibold transition-all duration-300 <?= $current == $total ? 'pointer-events-none opacity-40 bg-slate-100 border-slate-200' : 'bg-white hover:bg-blue-50 hover:border-blue-300 hover:shadow-md text-slate-700 border-slate-200' ?>">
                Next <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>
        <?php endif; ?>

    </main>

    <!-- ════════════════════════════════════════ -->
    <!--  LUCIDE ICONS INIT                    -->
    <!-- ════════════════════════════════════════ -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
    </script>

</body>

</html>