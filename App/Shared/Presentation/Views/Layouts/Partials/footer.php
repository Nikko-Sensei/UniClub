<footer class="bg-slate-900 text-slate-400 mt-16">
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-10">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

            <div class="flex items-center gap-2.5 text-white font-bold">
                <span class="w-8 h-8 flex items-center justify-center bg-white/10 rounded-xl">
                    <i data-lucide="landmark" class="w-4.5 h-4.5"></i>
                </span>
                uniClub
            </div>

            <nav class="flex flex-wrap gap-x-6 gap-y-2 text-sm">
                <a href="<?= BASE_URL ?>/clubs" class="hover:text-white transition">Clubs</a>
                <a href="<?= BASE_URL ?>/events" class="hover:text-white transition">Events</a>
                <a href="<?= BASE_URL ?>/announcements" class="hover:text-white transition">Announcements</a>
                <a href="<?= BASE_URL ?>/contact" class="hover:text-white transition">Contact</a>
            </nav>
        </div>

        <div
            class="border-t border-white/10 mt-8 pt-6 text-xs text-slate-500 flex flex-col sm:flex-row justify-between gap-2">
            <span>&copy; <?= date('Y') ?> uniClub. All rights reserved.</span>
            <span>Built for students, by students.</span>
        </div>
    </div>
</footer>