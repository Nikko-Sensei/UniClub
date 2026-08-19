<div class="max-w-7xl mx-auto px-4 md:px-6 py-8 w-full bg-mesh min-h-screen">

    <?php

    $faqs = [

        [
            'category' => 'clubs',
            'category_name' => 'Clubs',
            'icon' => 'users-round',
            'question' => 'How can I join a club?',
            'answer' => 'Open the Clubs page, select the club you are interested in, and click the Join Club button. If the club requires approval, your membership request will be reviewed by the club administrator.'
        ],

        [
            'category' => 'clubs',
            'category_name' => 'Clubs',
            'icon' => 'users-round',
            'question' => 'How can I view club information?',
            'answer' => 'Open the Clubs page and select a club to view its description, membership fee, activities, events, and other available information.'
        ],

        [
            'category' => 'memberships',
            'category_name' => 'Memberships',
            'icon' => 'badge-check',
            'question' => 'How long does membership approval take?',
            'answer' => 'Membership requests are reviewed by the club administrator. The approval time may vary depending on the club. You can check your membership status from My Memberships.'
        ],

        [
            'category' => 'memberships',
            'category_name' => 'Memberships',
            'icon' => 'badge-check',
            'question' => 'How can I check my membership status?',
            'answer' => 'Open My Memberships to view your current membership status, including pending, approved, or rejected membership requests.'
        ],

        [
            'category' => 'events',
            'category_name' => 'Events',
            'icon' => 'calendar-days',
            'question' => 'How do I register for an event?',
            'answer' => 'Open the event details page and select Register. If registration is available and capacity has not been reached, your registration request will be submitted to the club.'
        ],

        [
            'category' => 'events',
            'category_name' => 'Events',
            'icon' => 'calendar-days',
            'question' => 'Can I cancel my event registration?',
            'answer' => 'If cancellation is available for the event, you can cancel your registration from your registered events. Some events may have cancellation restrictions.'
        ],

        [
            'category' => 'payments',
            'category_name' => 'Payments',
            'icon' => 'wallet-cards',
            'question' => 'What payment methods are supported?',
            'answer' => 'UniClub supports the payment methods currently provided by the club. Available payment methods are displayed when you submit a membership payment.'
        ],

        [
            'category' => 'payments',
            'category_name' => 'Payments',
            'icon' => 'wallet-cards',
            'question' => 'How can I check my payment status?',
            'answer' => 'Open your Payment History to view submitted payments and their current status, such as pending, verified, or rejected.'
        ],

        [
            'category' => 'account',
            'category_name' => 'Account',
            'icon' => 'user-round-cog',
            'question' => 'How can I update my profile?',
            'answer' => 'Open your profile settings to update the personal information that can be changed on your UniClub account.'
        ],

        [
            'category' => 'account',
            'category_name' => 'Account',
            'icon' => 'user-round-cog',
            'question' => 'What should I do if I forget my password?',
            'answer' => 'Use the password recovery option on the login page and follow the instructions to reset your password securely.'
        ]

    ];


    /*
    |--------------------------------------------------------------------------
    | Category Counts
    |--------------------------------------------------------------------------
    */

    $categoryCounts = [
        'clubs' => 0,
        'memberships' => 0,
        'events' => 0,
        'payments' => 0,
        'account' => 0
    ];

    foreach ($faqs as $faq) {

        if (isset($categoryCounts[$faq['category']])) {
            $categoryCounts[$faq['category']]++;
        }
    }

    ?>



    <!-- ========================================================= -->
    <!-- HEADER -->
    <!-- ========================================================= -->

    <div class="mb-8">


        <!-- Header -->

        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-5">

            <div>

                <div class="flex items-center gap-3 mb-3">

                    <div class="
                        w-10
                        h-10
                        rounded-xl
                        bg-blue-50
                        text-blue-600
                        flex
                        items-center
                        justify-center
                    ">

                        <i data-lucide="circle-help" class="w-5 h-5"></i>

                    </div>

                    <span class="
                        text-xs
                        font-bold
                        uppercase
                        tracking-wider
                        text-blue-600
                    ">
                        FAQ / Help Center
                    </span>

                </div>


                <h1 class="
                    text-2xl
                    md:text-3xl
                    font-bold
                    tracking-tight
                    text-slate-800
                ">
                    How can we help you?
                </h1>


                <p class="
                    mt-2
                    text-sm
                    md:text-base
                    text-slate-500
                    max-w-2xl
                ">
                    Find answers to common questions about
                    clubs, memberships, events, payments, and your account.
                </p>

            </div>


            <!-- Total -->

            <div class="
                shrink-0
                inline-flex
                items-center
                gap-3
                px-4
                py-3
                rounded-xl
                bg-white
                border
                border-slate-200
                shadow-sm
            ">

                <div class="
                    w-9
                    h-9
                    rounded-lg
                    bg-blue-50
                    text-blue-600
                    flex
                    items-center
                    justify-center
                ">

                    <i data-lucide="messages-square" class="w-4 h-4"></i>

                </div>


                <div>

                    <p class="text-[11px] text-slate-400">
                        Available answers
                    </p>

                    <p id="faqResultCount" class="text-sm font-bold text-slate-700">

                        <?= count($faqs) ?> Answers

                    </p>

                </div>

            </div>

        </div>

    </div>



    <!-- ========================================================= -->
    <!-- FAQ LAYOUT -->
    <!-- ========================================================= -->

    <div class="
        grid
        grid-cols-1
        lg:grid-cols-[260px_minmax(0,1fr)]
        gap-6
        lg:gap-8
        items-start
    ">



        <!-- ===================================================== -->
        <!-- CATEGORY SIDEBAR -->
        <!-- ===================================================== -->

        <aside class="
         lg:sticky lg:top-24 self-start
            bg-white
            border
            border-slate-200
            rounded-2xl
            shadow-sm
            overflow-hidden
        ">

            <div class="px-5 py-5 border-b border-slate-100">

                <p class="
                    text-xs
                    font-bold
                    uppercase
                    tracking-wider
                    text-slate-400
                ">
                    Browse by category
                </p>

            </div>


            <div class="p-3 space-y-1">

                <!-- ALL -->

                <button type="button" data-category="all" class="
                        faq-category
                        active
                        w-full
                        flex
                        items-center
                        gap-3
                        px-3
                        py-3
                        rounded-xl
                        bg-blue-600
                        text-white
                        text-sm
                        font-semibold
                        transition
                    ">

                    <div class="
                        w-8
                        h-8
                        rounded-lg
                        bg-white/15
                        flex
                        items-center
                        justify-center
                    ">

                        <i data-lucide="layout-grid" class="w-4 h-4"></i>

                    </div>


                    <span class="flex-1 text-left">
                        All questions
                    </span>


                    <span class="
                        faq-side-count
                        text-[11px]
                        font-bold
                        bg-white/15
                        px-2
                        py-1
                        rounded-md
                    ">
                        <?= count($faqs) ?>
                    </span>

                </button>



                <!-- CLUBS -->

                <button type="button" data-category="clubs" class="
                        faq-category
                        w-full
                        flex
                        items-center
                        gap-3
                        px-3
                        py-3
                        rounded-xl
                        text-slate-600
                        hover:bg-blue-50
                        hover:text-blue-600
                        text-sm
                        font-medium
                        transition
                    ">

                    <div class="
                        w-8
                        h-8
                        rounded-lg
                        bg-slate-100
                        flex
                        items-center
                        justify-center
                    ">

                        <i data-lucide="users-round" class="w-4 h-4"></i>

                    </div>


                    <span class="flex-1 text-left">
                        Clubs
                    </span>


                    <span class="
                        faq-side-count
                        text-[11px]
                        font-semibold
                        text-slate-400
                        bg-slate-100
                        px-2
                        py-1
                        rounded-md
                    ">
                        <?= $categoryCounts['clubs'] ?>
                    </span>

                </button>



                <!-- MEMBERSHIPS -->

                <button type="button" data-category="memberships" class="
                        faq-category
                        w-full
                        flex
                        items-center
                        gap-3
                        px-3
                        py-3
                        rounded-xl
                        text-slate-600
                        hover:bg-blue-50
                        hover:text-blue-600
                        text-sm
                        font-medium
                        transition
                    ">

                    <div class="
                        w-8
                        h-8
                        rounded-lg
                        bg-slate-100
                        flex
                        items-center
                        justify-center
                    ">

                        <i data-lucide="badge-check" class="w-4 h-4"></i>

                    </div>


                    <span class="flex-1 text-left">
                        Memberships
                    </span>


                    <span class="
                        text-[11px]
                        font-semibold
                        text-slate-400
                        bg-slate-100
                        px-2
                        py-1
                        rounded-md
                    ">
                        <?= $categoryCounts['memberships'] ?>
                    </span>

                </button>



                <!-- EVENTS -->

                <button type="button" data-category="events" class="
                        faq-category
                        w-full
                        flex
                        items-center
                        gap-3
                        px-3
                        py-3
                        rounded-xl
                        text-slate-600
                        hover:bg-blue-50
                        hover:text-blue-600
                        text-sm
                        font-medium
                        transition
                    ">

                    <div class="
                        w-8
                        h-8
                        rounded-lg
                        bg-slate-100
                        flex
                        items-center
                        justify-center
                    ">

                        <i data-lucide="calendar-days" class="w-4 h-4"></i>

                    </div>


                    <span class="flex-1 text-left">
                        Events
                    </span>


                    <span class="
                        text-[11px]
                        font-semibold
                        text-slate-400
                        bg-slate-100
                        px-2
                        py-1
                        rounded-md
                    ">
                        <?= $categoryCounts['events'] ?>
                    </span>

                </button>



                <!-- PAYMENTS -->

                <button type="button" data-category="payments" class="
                        faq-category
                        w-full
                        flex
                        items-center
                        gap-3
                        px-3
                        py-3
                        rounded-xl
                        text-slate-600
                        hover:bg-blue-50
                        hover:text-blue-600
                        text-sm
                        font-medium
                        transition
                    ">

                    <div class="
                        w-8
                        h-8
                        rounded-lg
                        bg-slate-100
                        flex
                        items-center
                        justify-center
                    ">

                        <i data-lucide="wallet-cards" class="w-4 h-4"></i>

                    </div>


                    <span class="flex-1 text-left">
                        Payments
                    </span>


                    <span class="
                        text-[11px]
                        font-semibold
                        text-slate-400
                        bg-slate-100
                        px-2
                        py-1
                        rounded-md
                    ">
                        <?= $categoryCounts['payments'] ?>
                    </span>

                </button>



                <!-- ACCOUNT -->

                <button type="button" data-category="account" class="
                        faq-category
                        w-full
                        flex
                        items-center
                        gap-3
                        px-3
                        py-3
                        rounded-xl
                        text-slate-600
                        hover:bg-blue-50
                        hover:text-blue-600
                        text-sm
                        font-medium
                        transition
                    ">

                    <div class="
                        w-8
                        h-8
                        rounded-lg
                        bg-slate-100
                        flex
                        items-center
                        justify-center
                    ">

                        <i data-lucide="user-round-cog" class="w-4 h-4"></i>

                    </div>


                    <span class="flex-1 text-left">
                        Account
                    </span>


                    <span class="
                        text-[11px]
                        font-semibold
                        text-slate-400
                        bg-slate-100
                        px-2
                        py-1
                        rounded-md
                    ">
                        <?= $categoryCounts['account'] ?>
                    </span>

                </button>

            </div>

        </aside>



        <!-- ===================================================== -->
        <!-- QUESTIONS -->
        <!-- ===================================================== -->

        <main>

            <div class="
                flex
                items-center
                justify-between
                mb-4
            ">

                <div>

                    <p class="
                        text-xs
                        font-bold
                        uppercase
                        tracking-wider
                        text-blue-600
                    ">
                        Help Center
                    </p>

                    <h2 class="
                        mt-1
                        text-lg
                        font-bold
                        text-slate-800
                    ">
                        Popular questions
                    </h2>

                </div>


                <span id="activeCategoryLabel" class="
                        hidden
                        sm:inline-flex
                        items-center
                        gap-1.5
                        px-3
                        py-1.5
                        rounded-lg
                        bg-slate-100
                        text-xs
                        font-medium
                        text-slate-500
                    ">
                    All questions
                </span>

            </div>



            <!-- FAQ LIST -->

            <div id="faqList" class="space-y-3">

                <?php foreach ($faqs as $index => $faq): ?>

                    <div class="
                            faq-item
                            group
                            bg-white
                            border
                            border-slate-200
                            rounded-2xl
                            overflow-hidden
                            shadow-sm
                            hover:border-blue-200
                            hover:shadow-md
                            transition-all
                            duration-200
                        " data-category="<?= htmlspecialchars($faq['category']) ?>">


                        <!-- QUESTION -->

                        <button type="button" class="
                                faq-question
                                w-full
                                flex
                                items-center
                                gap-4
                                px-5
                                md:px-6
                                py-5
                                text-left
                                hover:bg-slate-50
                                transition
                            ">

                            <!-- ICON -->

                            <div class="
                                w-10
                                h-10
                                shrink-0
                                rounded-xl
                                bg-blue-50
                                text-blue-600
                                flex
                                items-center
                                justify-center
                            ">

                                <i data-lucide="<?= htmlspecialchars($faq['icon']) ?>" class="w-5 h-5"></i>

                            </div>


                            <!-- TEXT -->

                            <div class="flex-1 min-w-0">

                                <span class="
                                    block
                                    text-sm
                                    md:text-base
                                    font-semibold
                                    text-slate-800
                                    group-hover:text-blue-700
                                    transition
                                ">
                                    <?= htmlspecialchars($faq['question']) ?>
                                </span>

                            </div>


                            <!-- CHEVRON -->

                            <div class="
                                faq-chevron
                                w-9
                                h-9
                                shrink-0
                                rounded-lg
                                bg-slate-50
                                text-slate-400
                                flex
                                items-center
                                justify-center
                                transition
                                group-hover:bg-blue-50
                                group-hover:text-blue-600
                            ">

                                <i data-lucide="chevron-down" class="
                                        faq-icon
                                        w-4
                                        h-4
                                        transition-transform
                                        duration-300
                                    "></i>

                            </div>

                        </button>



                        <!-- ANSWER -->

                        <div class="faq-answer hidden">

                            <div class="
                                mx-5
                                md:mx-6
                                mb-5
                                pl-0
                                md:pl-14
                                border-t
                                border-slate-100
                                pt-5
                            ">

                                <div class="
                                    flex
                                    items-start
                                    gap-3
                                ">

                                    <div class="
                                        mt-1
                                        w-1
                                        h-10
                                        rounded-full
                                        bg-blue-500
                                        shrink-0
                                    "></div>


                                    <p class="
                                        text-sm
                                        leading-7
                                        text-slate-600
                                    ">
                                        <?= htmlspecialchars($faq['answer']) ?>
                                    </p>

                                </div>


                                <!-- Feedback -->

                                <div class="
                                    mt-5
                                    pt-4
                                    border-t
                                    border-slate-100
                                    flex
                                    items-center
                                    justify-between
                                    gap-3
                                ">

                                    <p class="
                                        text-xs
                                        font-medium
                                        text-slate-400
                                    ">
                                        Was this answer helpful?
                                    </p>


                                    <div class="flex gap-2">

                                        <button type="button" class="
                                                faq-feedback
                                                inline-flex
                                                items-center
                                                gap-1.5
                                                px-3
                                                py-1.5
                                                rounded-lg
                                                bg-slate-100
                                                text-slate-600
                                                hover:bg-emerald-50
                                                hover:text-emerald-600
                                                text-xs
                                                font-semibold
                                                transition
                                            " data-feedback="yes">

                                            <i data-lucide="thumbs-up" class="w-3.5 h-3.5"></i>

                                            Yes

                                        </button>


                                        <button type="button" class="
                                                faq-feedback
                                                inline-flex
                                                items-center
                                                gap-1.5
                                                px-3
                                                py-1.5
                                                rounded-lg
                                                bg-slate-100
                                                text-slate-600
                                                hover:bg-red-50
                                                hover:text-red-600
                                                text-xs
                                                font-semibold
                                                transition
                                            " data-feedback="no">

                                            <i data-lucide="thumbs-down" class="w-3.5 h-3.5"></i>

                                            No

                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>



            <!-- EMPTY STATE -->

            <div id="faqEmptyState" class="
                    hidden
                    text-center
                    py-14
                    px-6
                    bg-white
                    border
                    border-slate-200
                    rounded-2xl
                ">

                <div class="
                    w-12
                    h-12
                    mx-auto
                    rounded-xl
                    bg-slate-100
                    text-slate-400
                    flex
                    items-center
                    justify-center
                ">

                    <i data-lucide="search-x" class="w-5 h-5"></i>

                </div>


                <h3 class="
                    mt-4
                    text-sm
                    font-bold
                    text-slate-800
                ">
                    No questions found
                </h3>


                <p class="
                    mt-2
                    text-sm
                    text-slate-500
                ">
                    There are no questions in this category.
                </p>

            </div>

        </main>

    </div>



    <!-- ========================================================= -->
    <!-- SUPPORT CTA -->
    <!-- ========================================================= -->

    <div class="
        mt-8
        rounded-2xl
        border
        border-blue-100
        bg-blue-50/70
        px-5
        py-5
        md:px-6
        md:py-6
    ">

        <div class="
            flex
            flex-col
            sm:flex-row
            sm:items-center
            sm:justify-between
            gap-4
        ">

            <div class="flex items-center gap-3">

                <div class="
                    w-10
                    h-10
                    shrink-0
                    rounded-xl
                    bg-white
                    text-blue-600
                    flex
                    items-center
                    justify-center
                    shadow-sm
                ">

                    <i data-lucide="life-buoy" class="w-5 h-5"></i>

                </div>


                <div>

                    <h3 class="
                        text-sm
                        font-bold
                        text-slate-800
                    ">
                        Still need help?
                    </h3>

                    <p class="
                        mt-0.5
                        text-xs
                        text-slate-500
                    ">
                        Our support team is here to help you.
                    </p>

                </div>

            </div>


            <a href="<?= BASE_URL ?>/contact" class="
                    inline-flex
                    items-center
                    justify-center
                    gap-2
                    px-4
                    py-2.5
                    rounded-xl
                    bg-blue-600
                    text-white
                    text-sm
                    font-semibold
                    hover:bg-blue-700
                    shadow-sm
                    transition
                ">

                Contact Support

                <i data-lucide="arrow-right" class="w-4 h-4"></i>

            </a>

        </div>

    </div>

</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {


        /*
        |--------------------------------------------------------------------------
        | FAQ ELEMENTS
        |--------------------------------------------------------------------------
        */

        const faqItems =
            document.querySelectorAll('.faq-item');

        const categoryButtons =
            document.querySelectorAll('.faq-category');

        const resultCount =
            document.getElementById('faqResultCount');

        const emptyState =
            document.getElementById('faqEmptyState');

        const activeCategoryLabel =
            document.getElementById('activeCategoryLabel');


        let selectedCategory = 'all';



        /*
        |--------------------------------------------------------------------------
        | CATEGORY NAMES
        |--------------------------------------------------------------------------
        */

        const categoryNames = {

            all: 'All questions',

            clubs: 'Clubs',

            memberships: 'Memberships',

            events: 'Events',

            payments: 'Payments',

            account: 'Account'

        };



        /*
        |--------------------------------------------------------------------------
        | ACCORDION
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll('.faq-question')
            .forEach(button => {

                button.addEventListener('click', function() {

                    const item =
                        this.closest('.faq-item');

                    const answer =
                        item.querySelector('.faq-answer');

                    const icon =
                        item.querySelector('.faq-icon');


                    const isOpen = !answer.classList.contains('hidden');


                    /*
                    | Close other answers
                    */

                    document
                        .querySelectorAll('.faq-answer')
                        .forEach(otherAnswer => {

                            if (otherAnswer !== answer) {

                                otherAnswer.classList.add(
                                    'hidden'
                                );

                                const otherIcon =
                                    otherAnswer
                                    .closest('.faq-item')
                                    .querySelector('.faq-icon');

                                if (otherIcon) {

                                    otherIcon.classList.remove(
                                        'rotate-180'
                                    );

                                }

                            }

                        });


                    /*
                    | Toggle current answer
                    */

                    if (isOpen) {

                        answer.classList.add('hidden');

                        icon.classList.remove(
                            'rotate-180'
                        );

                    } else {

                        answer.classList.remove('hidden');

                        icon.classList.add(
                            'rotate-180'
                        );

                    }

                });

            });



        /*
        |--------------------------------------------------------------------------
        | FILTER FAQS
        |--------------------------------------------------------------------------
        */

        function filterFaqs() {

            let visibleCount = 0;


            faqItems.forEach(item => {

                const category =
                    item.dataset.category;


                const matches =
                    selectedCategory === 'all' ||
                    category === selectedCategory;


                if (matches) {

                    item.classList.remove('hidden');

                    visibleCount++;

                } else {

                    item.classList.add('hidden');

                    /*
                    | Close hidden answer
                    */

                    const answer =
                        item.querySelector('.faq-answer');

                    const icon =
                        item.querySelector('.faq-icon');


                    answer.classList.add('hidden');

                    icon.classList.remove(
                        'rotate-180'
                    );

                }

            });


            /*
            | Result count
            */

            resultCount.textContent =
                `${visibleCount} ${
                visibleCount === 1
                    ? 'Answer'
                    : 'Answers'
            }`;


            /*
            | Empty state
            */

            if (visibleCount === 0) {

                emptyState.classList.remove(
                    'hidden'
                );

            } else {

                emptyState.classList.add(
                    'hidden'
                );

            }


            /*
            | Category label
            */

            activeCategoryLabel.textContent =
                categoryNames[selectedCategory];

        }



        /*
        |--------------------------------------------------------------------------
        | CATEGORY BUTTONS
        |--------------------------------------------------------------------------
        */

        categoryButtons.forEach(button => {

            button.addEventListener('click', function() {

                selectedCategory =
                    this.dataset.category;


                /*
                | Reset buttons
                */

                categoryButtons.forEach(btn => {

                    btn.classList.remove(
                        'bg-blue-600',
                        'text-white',
                        'font-semibold'
                    );

                    btn.classList.add(
                        'text-slate-600',
                        'font-medium'
                    );


                    const iconBox =
                        btn.querySelector(
                            'div'
                        );


                    if (iconBox) {

                        iconBox.classList.remove(
                            'bg-white/15'
                        );

                        iconBox.classList.add(
                            'bg-slate-100'
                        );

                    }


                    const count =
                        btn.querySelector(
                            '.faq-side-count'
                        );


                    if (count) {

                        count.classList.remove(
                            'bg-white/15'
                        );

                        count.classList.add(
                            'bg-slate-100',
                            'text-slate-400'
                        );

                    }

                });


                /*
                | Activate selected button
                */

                this.classList.remove(
                    'text-slate-600',
                    'font-medium'
                );

                this.classList.add(
                    'bg-blue-600',
                    'text-white',
                    'font-semibold'
                );


                const iconBox =
                    this.querySelector('div');


                if (iconBox) {

                    iconBox.classList.remove(
                        'bg-slate-100'
                    );

                    iconBox.classList.add(
                        'bg-white/15'
                    );

                }


                const count =
                    this.querySelector(
                        '.faq-side-count'
                    );


                if (count) {

                    count.classList.remove(
                        'bg-slate-100',
                        'text-slate-400'
                    );

                    count.classList.add(
                        'bg-white/15'
                    );

                }


                /*
                | Filter
                */

                filterFaqs();

            });

        });



        /*
        |--------------------------------------------------------------------------
        | FEEDBACK
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll('.faq-feedback')
            .forEach(button => {

                button.addEventListener(
                    'click',
                    function() {

                        const answer =
                            this.closest('.faq-answer');

                        const feedbackButtons =
                            answer.querySelectorAll(
                                '.faq-feedback'
                            );


                        feedbackButtons.forEach(btn => {

                            btn.disabled = true;

                            btn.classList.add(
                                'opacity-50',
                                'cursor-not-allowed'
                            );

                        });


                        if (
                            this.dataset.feedback === 'yes'
                        ) {

                            this.classList.remove(
                                'opacity-50'
                            );

                            this.classList.add(
                                'bg-emerald-50',
                                'text-emerald-600'
                            );

                        } else {

                            this.classList.remove(
                                'opacity-50'
                            );

                            this.classList.add(
                                'bg-red-50',
                                'text-red-600'
                            );

                        }

                    }
                );

            });



        /*
        |--------------------------------------------------------------------------
        | INITIAL STATE
        |--------------------------------------------------------------------------
        */

        filterFaqs();

    });
</script>