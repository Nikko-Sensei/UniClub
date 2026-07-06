<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'uniClub - Discover Your Passion'; ?></title>
    <link rel="stylesheet" href="/UniClub/Public/Assets/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body class="bg-gray-50 text-gray-800 font-sans flex flex-col min-h-screen">

    <header
        class="bg-[#1e40af] text-white px-4 md:px-6 py-4 flex justify-between items-center sticky top-0 z-50 shadow-md">
        <div class="flex items-center space-x-4">
            <button id="menu-toggle" class="md:hidden text-xl focus:outline-none focus:text-blue-200">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="flex items-center space-x-4 font-semibold text-lg">
                <i class="fa-solid fa-building-columns"></i>
                <span>uniClub</span>
            </div>
        </div>

        <div class="flex items-center space-x-8">

            <!-- Navigation -->
            <nav class="hidden md:flex items-center space-x-10 text-m font-medium">
                <a href="/clubs" class="hover:text-blue-200 transition">
                    Clubs
                </a>

                <a href="/events" class="hover:text-blue-200 transition">
                    Events
                </a>

                <a href="/news" class="hover:text-blue-200 transition">
                    News
                </a>

                <a href="/contact" class="hover:text-blue-200 transition">
                    Contact
                </a>

                <a href="<?= BASE_URL ?>/profile" class="hover:text-blue-200 transition">
                    Profile
                </a>
            </nav>


            <!-- Notification + Logout -->
            <div class="flex items-center space-x-8">

                <!-- Notification -->
                <button class="relative p-1 hover:text-blue-200 transition">
                    <i class="fa-regular fa-bell text-lg"></i>

                    <span class="absolute -right-1 -top-1 h-2 w-2 rounded-full bg-red-500">
                    </span>
                </button>


                <!-- Login/Logout -->
                <?php if (!\App\Shared\Core\Auth::check()): ?>
                <a href="<?= BASE_URL ?>/login"
                    class="rounded-full bg-white px-4 py-1.5 text-sm font-semibold text-[#1e40af] shadow hover:bg-blue-50 transition">
                    Login
                </a>
                <?php else: ?>
                <a href="<?= BASE_URL ?>/logout"
                    class="rounded-full bg-red-500 px-4 py-1.5 text-sm font-semibold text-white shadow hover:bg-red-600 transition">
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

    <div id="mobile-menu"
        class="fixed inset-y-0 left-0 z-50 w-64 bg-[#1e40af] text-white p-6 shadow-2xl transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden">
        <div class="flex justify-between items-center mb-8">
            <span class="font-bold text-lg">Menu</span>
            <button id="menu-close" class="text-xl"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <nav class="flex flex-col space-y-4 text-base font-medium">
            <a href="/clubs" class="hover:bg-blue-700/50 p-2 rounded transition">Clubs</a>
            <a href="/events" class="hover:bg-blue-700/50 p-2 rounded transition">Events</a>
            <a href="/news" class="hover:bg-blue-700/50 p-2 rounded transition">News</a>
            <a href="/contact" class="hover:bg-blue-700/50 p-2 rounded transition">Contact</a>
            <a href="/profile" class="hover:bg-blue-700/50 p-2 rounded transition">Profile</a>
        </nav>
    </div>

    <div id="menu-overlay" class="fixed inset-0 z-40 bg-black/40 hidden md:hidden"></div>

    <main class="flex-grow">