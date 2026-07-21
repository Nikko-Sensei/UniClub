<div class="min-h-screen flex items-center justify-center bg-slate-100">


    <div class="bg-white p-10 rounded-2xl shadow text-center">


        <i data-lucide="wrench" class="w-16 h-16 mx-auto text-blue-600">
        </i>


        <h1 class="text-3xl font-bold text-slate-800 mt-5">
            System Maintenance
        </h1>


        <p class="text-slate-500 mt-3">
            UniClub is currently under maintenance.
            Please come back later.
        </p>



        <?php if(isset($_SESSION['user'])): ?>

        <a href="<?= BASE_URL ?>/logout" class="inline-block mt-6 px-6 py-3 rounded-xl
                      bg-blue-600 text-white">

            Logout

        </a>

        <?php endif; ?>


    </div>


</div>