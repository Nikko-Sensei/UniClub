<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo $page_title ?? 'uniClub - Discover Your Passion'; ?>
    </title>

    <link rel="stylesheet" href="/UniClub/Public/Assets/css/app.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>


<body class="bg-slate-50 text-slate-800 font-sans flex flex-col min-h-screen">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>
            <?php echo $page_title ?? 'uniClub - Discover Your Passion'; ?>
        </title>

        <link rel="stylesheet" href="/UniClub/Public/Assets/css/app.css">

        <script src="https://unpkg.com/lucide@latest"></script>

    </head>


    <header class="sticky top-0 z-50 bg-gradient-to-r from-blue-700 via-blue-600 to-indigo-700 text-white shadow-lg">


        <div class="max-w-7xl mx-auto px-4 md:px-6 py-4 flex items-center justify-between">


            <!-- Left -->
            <div class="flex items-center gap-4">


                <!-- Mobile Menu -->
                <button id="menu-toggle" class="md:hidden hover:text-blue-200 transition">

                    <i data-lucide="menu" class="w-6 h-6"></i>

                </button>



                <!-- Logo -->
                <a href="<?= BASE_URL ?>" class="flex items-center gap-3 text-xl font-bold">


                    <span class="flex items-center justify-center w-10 h-10 rounded-xl bg-white/20">

                        <i data-lucide="university" class="w-6 h-6">
                        </i>

                    </span>


                    <span>
                        uniClub
                    </span>


                </a>


            </div>





            <!-- Right -->
            <div class="flex items-center gap-3">



                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center gap-1">


                    <a href="<?= BASE_URL ?>/clubs"
                        class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-white/15 transition text-sm">

                        <i data-lucide="users" class="w-4 h-4">
                        </i>

                        Clubs

                    </a>



                    <a href="/events"
                        class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-white/15 transition text-sm">

                        <i data-lucide="calendar-days" class="w-4 h-4">
                        </i>

                        Events

                    </a>



                    <a href="/news"
                        class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-white/15 transition text-sm">

                        <i data-lucide="newspaper" class="w-4 h-4">
                        </i>

                        News

                    </a>



                    <a href="/contact"
                        class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-white/15 transition text-sm">

                        <i data-lucide="mail" class="w-4 h-4">
                        </i>

                        Contact

                    </a>



                    <a href="<?= BASE_URL ?>/profile"
                        class="flex items-center gap-2 px-3 py-2 rounded-xl hover:bg-white/15 transition text-sm">

                        <i data-lucide="user" class="w-4 h-4">
                        </i>

                        Profile

                    </a>


                </nav>





                <!-- Notification -->
                <button
                    class="relative flex items-center justify-center w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 transition">


                    <i data-lucide="bell" class="w-5 h-5">
                    </i>


                    <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-blue-600">
                    </span>


                </button>





                <!-- Auth -->

                <?php if (!\App\Shared\Core\Auth::check()): ?>


                <a href="<?= BASE_URL ?>/login"
                    class="hidden sm:flex items-center gap-2 bg-white text-blue-700 px-4 py-2 rounded-xl text-sm font-semibold hover:bg-blue-50 transition">


                    <i data-lucide="log-in" class="w-4 h-4">
                    </i>


                    Login


                </a>



                <?php else: ?>


                <a href="<?= BASE_URL ?>/logout"
                    class="flex items-center gap-2 bg-red-500 px-4 py-2 rounded-xl text-sm font-semibold hover:bg-red-600 transition">


                    <i data-lucide="log-out" class="w-4 h-4">
                    </i>


                    Logout


                </a>



                <?php endif; ?>


            </div>


        </div>


    </header>





    <?php
require BASE_PATH .
    '/App/Shared/Presentation/Views/Components/alert.php';
?>





    <!-- Mobile Sidebar -->

    <div id="mobile-menu"
        class="fixed inset-y-0 left-0 z-50 w-72 bg-gradient-to-b from-blue-700 to-indigo-800 text-white p-6 shadow-2xl transform -translate-x-full transition-transform duration-300 md:hidden">


        <div class="flex items-center justify-between mb-10">


            <div class="flex items-center gap-3 font-bold text-lg">


                <span class="w-10 h-10 flex items-center justify-center bg-white/20 rounded-xl">

                    <i class="fa-solid fa-building-columns"></i>

                </span>


                uniClub


            </div>



            <button id="menu-close" class="text-xl hover:text-blue-200">

                <i class="fa-solid fa-xmark"></i>

            </button>


        </div>




        <nav class="flex flex-col gap-3 text-sm font-medium">


            <a href="<?= BASE_URL ?>/clubs"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/15 transition">

                <i class="fa-solid fa-users"></i>
                Clubs

            </a>



            <a href="/events" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/15 transition">

                <i class="fa-solid fa-calendar"></i>
                Events

            </a>



            <a href="/news" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/15 transition">

                <i class="fa-solid fa-newspaper"></i>
                News

            </a>



            <a href="/contact" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/15 transition">

                <i class="fa-solid fa-envelope"></i>
                Contact

            </a>



            <a href="<?= BASE_URL ?>/profile"
                class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/15 transition">

                <i class="fa-solid fa-user"></i>
                Profile

            </a>


        </nav>


    </div>




    <!-- Overlay -->

    <div id="menu-overlay" class="fixed inset-0 z-40 bg-black/40 hidden md:hidden">
    </div>



    <script>
    lucide.createIcons();
    </script>
    <main class="flex-grow">