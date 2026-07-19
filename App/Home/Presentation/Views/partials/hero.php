<section class="relative overflow-hidden rounded-3xl min-h-[500px] flex items-center px-6 md:px-12 lg:px-16 shadow-2xl">

    <!-- ========================================================== -->
    <!-- BACKGROUND IMAGE + DARK OVERLAY                           -->
    <!-- ========================================================== -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
            alt="University Campus" class="w-full h-full object-cover" loading="lazy" />
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/80 via-slate-900/60 to-slate-800/40"></div>
    </div>

    <!-- ========================================================== -->
    <!-- DECORATIVE FLOATING ELEMENTS                              -->
    <!-- ========================================================== -->
    <div class="absolute top-10 right-10 w-24 h-24 rounded-full bg-blue-500/20 blur-3xl animate-pulseGlow"></div>
    <div class="absolute bottom-10 left-10 w-32 h-32 rounded-full bg-indigo-500/20 blur-3xl animate-pulseGlow"
        style="animation-delay: 1.5s;"></div>
    <div class="absolute top-1/3 right-1/4 w-8 h-8 border-2 border-white/15 rounded-full animate-float"></div>
    <div class="absolute bottom-1/4 left-1/4 w-6 h-6 border-2 border-white/15 rounded-lg rotate-45 animate-float"
        style="animation-delay: 1s;"></div>

    <!-- ========================================================== -->
    <!-- CONTENT – LEFT ALIGNED                                    -->
    <!-- ========================================================== -->
    <div class="relative z-20 max-w-3xl animate-fadeInUp">

        <!-- Badge / Tagline -->
        <div
            class="inline-flex items-center gap-2 px-4 py-1.5 mb-6 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-sm font-medium text-white/90 shadow-lg">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            UniClub Platform
        </div>

        <!-- Heading -->
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight text-white">
            Discover University
            <span
                class="block mt-1 text-transparent bg-clip-text bg-gradient-to-r from-yellow-200 to-amber-200">Communities</span>
        </h1>

        <!-- Animated accent line -->
        <div class="w-20 h-1.5 mt-4 rounded-full bg-gradient-to-r from-blue-400 to-indigo-400 animate-slideIn"></div>

        <!-- Subtitle -->
        <p class="mt-5 text-base md:text-lg text-blue-100/90 max-w-lg leading-relaxed">
            Connect with clubs, participate in events, and grow your university experience.
        </p>

        <!-- CTA Buttons (Glass style) -->
        <div class="mt-8 flex flex-wrap gap-4">
            <a href="<?= BASE_URL ?>/clubs"
                class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl bg-white/10 backdrop-blur-sm border border-white/30 text-white font-semibold hover:bg-white/20 hover:scale-105 transition-all duration-300 shadow-lg">
                Explore Clubs
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
            <a href="<?= BASE_URL ?>/events"
                class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl bg-white/5 backdrop-blur-sm border border-white/20 text-white font-semibold hover:bg-white/15 hover:scale-105 transition-all duration-300">
                <i data-lucide="calendar" class="w-4 h-4"></i>
                View Events
            </a>
        </div>

    </div>

</section>

<!-- ── Required CSS ── -->
<style>
@keyframes pulseGlow {

    0%,
    100% {
        opacity: 0.3;
        transform: scale(1);
    }

    50% {
        opacity: 0.8;
        transform: scale(1.1);
    }
}

@keyframes float {

    0%,
    100% {
        transform: translateY(0px) rotate(0deg);
    }

    50% {
        transform: translateY(-12px) rotate(6deg);
    }
}

@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }

    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideIn {
    0% {
        width: 0;
        opacity: 0;
    }

    100% {
        width: 80px;
        opacity: 1;
    }
}

.animate-pulseGlow {
    animation: pulseGlow 4s ease-in-out infinite;
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-fadeInUp {
    opacity: 0;
    animation: fadeInUp 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
}

.animate-slideIn {
    animation: slideIn 0.8s ease-out forwards;
    animation-delay: 200ms;
}
</style>

<!-- ── Lucide Icons ── -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
</script>