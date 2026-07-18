<div class="max-w-7xl mx-auto px-4 md:px-6 py-8 w-full bg-mesh min-h-screen">

    <!-- ── Custom Styles ── -->
    <style>
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        0% {
            opacity: 0;
            transform: translateX(-30px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
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
            transform: scale(1.1);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.6s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .animate-slideInLeft {
        animation: slideInLeft 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

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

    .glass-card-light {
        background: rgba(255, 255, 255, 0.72);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
        transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .glass-card-light:hover {
        border-color: rgba(37, 99, 235, 0.25);
        box-shadow: 0 16px 48px rgba(37, 99, 235, 0.10);
        transform: translateY(-4px);
    }

    .glass-card-dark {
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

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

    .back-btn {
        transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .back-btn:hover {
        transform: translateX(-4px) scale(1.05);
        box-shadow: 0 8px 30px -8px rgba(37, 99, 235, 0.25);
    }

    .back-btn:active {
        transform: scale(0.95);
    }

    .bg-mesh {
        background: radial-gradient(circle at 20% 30%, rgba(37, 99, 235, 0.04) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(99, 102, 241, 0.04) 0%, transparent 50%),
            #F8FAFC;
    }

    *:focus-visible {
        outline: 2px solid #2563EB;
        outline-offset: 2px;
        border-radius: 4px;
    }

    ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    ::-webkit-scrollbar-track {
        background: transparent;
    }

    ::-webkit-scrollbar-thumb {
        background: #CBD5E1;
        border-radius: 9999px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #94A3B8;
    }
    </style>

    <!-- ========================================================== -->
    <!-- BACK BUTTON – Glass with slide-in                         -->
    <!-- ========================================================== -->
    <!-- <div class="animate-slideInLeft mb-5">
        <a href="javascript:history.back()"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back</span>
        </a>
    </div> -->

    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->
    <div class="mb-8 animate-fadeInUp">
        <div class="flex items-center gap-3">
            <div
                class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center shadow-lg shadow-blue-200">
                <i data-lucide="mail" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-blue-600">UniClub Support</p>
                <h1 class="text-3xl md:text-4xl font-bold text-slate-800">Contact Us</h1>
            </div>
        </div>
        <p class="text-slate-500 mt-2 ml-15">Send us a message and we will help you with clubs, events, and your UniClub
            experience.</p>
    </div>

    <!-- ========================================================== -->
    <!-- CONTACT GRID – Glass Cards                                -->
    <!-- ========================================================== -->
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 mt-8">

        <!-- FORM (3 cols) -->
        <div
            class="lg:col-span-3 glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 md:p-8 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 animate-fadeInUp delay-100">

            <h2 class="text-xl font-bold text-slate-800">Send us a message</h2>
            <p class="text-sm text-slate-500 mt-1">Tell us how we can help with clubs, events, or your UniClub
                experience.</p>

            <form method="POST" action="<?= BASE_URL ?>/contact/send" class="mt-6 space-y-5">

                <!-- Name -->
                <div>
                    <label class="text-sm font-semibold text-slate-700 block">Full Name</label>
                    <input type="text" name="name" value="<?= $_SESSION['user']['name'] ?? '' ?>" readonly
                        class="mt-1.5 w-full rounded-xl border border-slate-200 bg-slate-50/80 px-4 py-3 text-sm text-slate-600 cursor-not-allowed">
                </div>

                <!-- Email -->
                <div>
                    <label class="text-sm font-semibold text-slate-700 block">Student Email</label>
                    <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?? '' ?>" readonly
                        class="mt-1.5 w-full rounded-xl border border-slate-200 bg-slate-50/80 px-4 py-3 text-sm text-slate-600 cursor-not-allowed">
                </div>

                <!-- Subject -->
                <div>
                    <label class="text-sm font-semibold text-slate-700 block">Topic</label>
                    <select name="subject"
                        class="mt-1.5 w-full rounded-xl border border-slate-200 bg-white/80 px-4 py-3 text-sm focus:border-blue-400 focus:ring-4 focus:ring-blue-100/60 outline-none transition-all duration-300 hover:border-blue-300 shadow-sm">
                        <option>Club Registration Inquiry</option>
                        <option>Event Support</option>
                        <option>General Feedback</option>
                        <option>Technical Support</option>
                    </select>
                </div>

                <!-- Message -->
                <div>
                    <label class="text-sm font-semibold text-slate-700 block">Your Message</label>
                    <textarea name="message" rows="4" required placeholder="Tell us how we can help..."
                        class="mt-1.5 w-full rounded-xl border border-slate-200 bg-white/80 px-4 py-3 text-sm focus:border-blue-400 focus:ring-4 focus:ring-blue-100/60 outline-none transition-all duration-300 hover:border-blue-200 shadow-sm resize-y"></textarea>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-3.5 rounded-xl transition-all duration-300 shadow-md shadow-blue-200/50 hover:shadow-xl hover:scale-[1.02] btn-shine">
                    <i data-lucide="send" class="w-4 h-4 inline mr-2"></i>
                    Send Message
                </button>

            </form>
        </div>

        <!-- CONTACT INFO (2 cols) -->
        <div
            class="lg:col-span-2 glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 md:p-8 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 animate-fadeInUp delay-200">

            <h3 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
                <i data-lucide="phone" class="w-5 h-5 text-blue-600"></i>
                Get in touch
            </h3>

            <div class="space-y-6">

                <!-- Address -->
                <div class="flex gap-4 items-start">
                    <div
                        class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 flex-shrink-0 shadow-sm">
                        <i data-lucide="map-pin" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Address</p>
                        <p class="text-slate-800 font-medium">Computer University</p>
                        <p class="text-sm text-slate-500">Yangon, Myanmar</p>
                    </div>
                </div>

                <!-- Hours -->
                <div class="flex gap-4 items-start">
                    <div
                        class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 flex-shrink-0 shadow-sm">
                        <i data-lucide="clock" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Hours</p>
                        <p class="text-slate-800 font-medium">Mon-Fri: 9:00 AM – 5:00 PM</p>
                        <p class="text-sm text-slate-500">Sat-Sun: Closed</p>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex gap-4 items-start">
                    <div
                        class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 flex-shrink-0 shadow-sm">
                        <i data-lucide="mail" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Email</p>
                        <p class="text-blue-700 font-medium">support@uniclub.com</p>
                    </div>
                </div>

                <!-- Phone -->
                <div class="flex gap-4 items-start">
                    <div
                        class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 flex-shrink-0 shadow-sm">
                        <i data-lucide="phone" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Phone</p>
                        <p class="text-blue-700 font-medium">+95 9 XXX XXX XXX</p>
                    </div>
                </div>

            </div>

            <!-- Decorative glow (subtle) -->
            <div class="mt-6 pt-4 border-t border-slate-100/80">
                <p class="text-xs text-slate-400">We usually respond within 24 hours.</p>
            </div>
        </div>

    </div>

    <!-- ========================================================== -->
    <!-- FAQ CTA – Glass Card                                      -->
    <!-- ========================================================== -->
    <div
        class="mt-10 glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-8 md:p-12 text-center transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 animate-fadeInUp delay-300">

        <div class="max-w-2xl mx-auto">
            <div
                class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-100 to-indigo-100 text-blue-600 flex items-center justify-center mx-auto shadow-md">
                <i data-lucide="message-circle" class="w-8 h-8"></i>
            </div>
            <h2 class="text-2xl md:text-3xl font-bold text-slate-800 mt-4">Need a quick answer?</h2>
            <p class="text-slate-500 mt-2 max-w-md mx-auto">Check our frequently asked questions about clubs, events,
                and memberships.</p>
            <a href="<?= BASE_URL ?>/faq"
                class="mt-6 inline-flex items-center gap-2 border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white font-semibold px-8 py-3 rounded-full transition-all duration-300 hover:shadow-lg hover:scale-[1.02]">
                Browse FAQ
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>

    </div>

</div>

<!-- ── Scripts ── -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') lucide.createIcons();

    const animated = document.querySelectorAll('.animate-fadeInUp, .animate-slideInLeft');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    animated.forEach(el => {
        if (!el.classList.contains('back-btn')) {
            el.style.opacity = '0';
            observer.observe(el);
        }
    });
});
</script>