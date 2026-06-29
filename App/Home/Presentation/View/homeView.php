<?php
/**
 * views/home/index.php
 * Expects: array $clubs, array $events, array $gallery
 */

use App\Core\View;
?>

<!-- HERO SECTION -->
<section class="relative bg-cover bg-center min-h-[600px] flex items-center justify-center"
    style="background-image:url('<?= BASE_URL ?>/Assets/images/images.png');">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center text-white">

            <span
                class="inline-flex items-center rounded-full bg-yellow-400 px-4 py-2 text-sm font-semibold text-gray-900">
                🏫 300+ active clubs on campus
            </span>


            <h1 class="mt-6 text-4xl font-bold tracking-tight sm:text-5xl lg:text-5xl">
                Find the club that feels like home
            </h1>


            <p class="mt-6 text-lg text-gray-200">
                Search by interest, major or major-vibe — and RSVP to events without leaving the page.
            </p>


            <!-- Search -->
            <form action="/clubs" method="get" class="mt-8 flex flex-col gap-3 sm:flex-row">

                <input id="hero-search-input" type="search" name="q" placeholder="Search clubs, events, or interests..."
                    class="w-full rounded-xl bg-white/95 px-5 py-3 text-gray-900 shadow-lg border border-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                <button type="submit"
                    class="rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white hover:bg-blue-700 transition">
                    Search
                </button>

            </form>


            <div class="mt-8 flex flex-col justify-center gap-4 sm:flex-row">

                <a href="/clubs"
                    class="rounded-lg border border-white px-6 py-3 font-semibold text-white hover:bg-white hover:text-gray-900 transition">
                    Browse all clubs
                </a>


                <a href="/events" class="rounded-lg px-6 py-3 font-semibold text-white hover:bg-white/10 transition">
                    See what's on this week →
                </a>

            </div>


        </div>

    </div>
</section>



<!-- STATS -->
<section class="bg-white shadow-md">

    <div class="mx-auto grid max-w-7xl grid-cols-2 gap-6 px-4 py-8 text-center sm:grid-cols-4">

        <div>
            <strong class="block text-3xl font-bold text-gray-900">
                300+
            </strong>
            <span class="text-gray-500">
                Active clubs
            </span>
        </div>

        <div>
            <strong class="block text-3xl font-bold text-gray-900">
                15k+
            </strong>
            <span class="text-gray-500">
                Students engaged
            </span>
        </div>

        <div>
            <strong class="block text-3xl font-bold text-gray-900">
                500+
            </strong>
            <span class="text-gray-500">
                Events / year
            </span>
        </div>

        <div>
            <strong class="block text-3xl font-bold text-gray-900">
                50+
            </strong>
            <span class="text-gray-500">
                Universities
            </span>
        </div>

    </div>

</section>

<!-- GALLERY -->
<section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">

    <div class="mb-8">

        <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">
            On campus this month
        </span>

        <h2 class="mt-2 text-3xl font-bold text-gray-900">
            Activities gallery
        </h2>

    </div>

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

        <?php if (!empty($gallery)): ?>

        <?php foreach (array_slice($gallery, 0, 4) as $img): ?>

        <img src="<?= htmlspecialchars($img) ?>" alt="Club activity on campus" loading="lazy"
            class="h-80 w-full rounded-xl object-cover shadow">

        <?php endforeach; ?>

        <?php else: ?>

        <?php for ($i = 0; $i < 4; $i++): ?>

        <div class="h-80 rounded-xl bg-gray-200 animate-pulse"></div>

        <?php endfor; ?>

        <?php endif; ?>

    </div>

    <div class="mt-6 flex justify-center gap-2">

        <span class="h-2 w-8 rounded-full bg-blue-600"></span>
        <span class="h-2 w-2 rounded-full bg-gray-300"></span>
        <span class="h-2 w-2 rounded-full bg-gray-300"></span>

    </div>

</section>


<!-- FEATURED CLUBS -->
<section class="mx-auto mt-2 max-w-7xl px-4 py-16 sm:px-6 lg:px-8">

    <div class="mb-8 flex flex-col justify-between gap-5 sm:flex-row sm:items-center">

        <div>

            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                Hand-picked for you
            </span>

            <h2 class="mt-2 text-3xl font-bold text-gray-900">
                Featured clubs
            </h2>

            <p class="mt-2 text-gray-600">
                Based on what's popular with your year and major.
            </p>

        </div>

        <a href="/clubs" class="rounded-lg border border-gray-300 px-5 py-3 font-semibold hover:bg-gray-100">
            View all clubs
        </a>

    </div>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

        <?php foreach ($clubs as $club): ?>

        <?php View::partial(
                'partials/club-card',
                ['club' => $club]
            ); ?>

        <?php endforeach; ?>

    </div>

</section>

<!-- EVENTS -->
<section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">

    <div class="mb-8 flex flex-col justify-between gap-5 sm:flex-row sm:items-center">

        <div>

            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                Don't miss out
            </span>

            <h2 class="mt-2 text-3xl font-bold text-gray-900">
                Upcoming events
            </h2>

        </div>

        <a href="/events" class="rounded-lg border border-gray-300 px-5 py-3 font-semibold hover:bg-gray-100">
            View all events
        </a>

    </div>

    <div class="space-y-5">

        <?php

        $chipColors = [
            'bg-blue-600',
            'bg-red-600',
            'bg-green-600',
            'bg-yellow-500'
        ];

        foreach ($events as $i => $event):

        ?>

        <div class="flex flex-col gap-5 rounded-xl border bg-white p-5 shadow-sm sm:flex-row sm:items-center">

            <div class="
                flex h-16 w-16 flex-col items-center justify-center
                rounded-xl text-white
                <?= $chipColors[$i % count($chipColors)] ?>
            ">

                <strong>
                    <?= htmlspecialchars($event['day']) ?>
                </strong>

                <span>
                    <?= htmlspecialchars($event['month']) ?>
                </span>

            </div>

            <div class="flex-1">

                <h4 class="text-xl font-semibold text-gray-900">
                    <?= htmlspecialchars($event['title']) ?>
                </h4>

                <p class="text-gray-600">
                    <?= htmlspecialchars($event['timeLabel']) ?>
                    ·
                    <?= htmlspecialchars($event['location']) ?>
                </p>

            </div>

            <a href="<?= htmlspecialchars($event['registerHref']) ?>"
                class="rounded-lg bg-blue-600 px-5 py-3 text-center font-semibold text-white hover:bg-blue-700">
                Register now
            </a>

        </div>

        <?php endforeach; ?>

    </div>