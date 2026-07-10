<main class="max-w-7xl mx-auto px-4 py-8 w-full">


    <!-- ========================================================== -->
    <!-- HERO                                                        -->
    <!-- ========================================================== -->

    <div
        class="relative bg-gradient-to-r from-blue-600 via-blue-500 to-cyan-500 rounded-2xl overflow-hidden shadow-lg border-4 border-blue-400 mb-8 aspect-[21/9] md:aspect-[3/1]">


        <div class="absolute inset-0 bg-cover bg-center mix-blend-multiply opacity-80"
            style="background-image:url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80');">
        </div>


        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/30 to-transparent">
        </div>



        <div class="absolute inset-0 flex flex-col justify-center p-6 md:p-12 text-white max-w-2xl">


            <span class="bg-blue-600/90 text-xs font-semibold px-3 py-1 rounded-full w-fit mb-4">

                Featured Community

            </span>



            <h1 class="text-3xl md:text-5xl font-extrabold mb-3">

                Discover University Clubs

            </h1>



            <p class="text-sm text-gray-200 mb-6">

                Explore communities, connect with students,
                and join activities that match your interests.

            </p>



            <a href="#clubs"
                class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-xl text-sm font-semibold w-fit transition">


                Browse Clubs


            </a>


        </div>


    </div>





    <!-- ========================================================== -->
    <!-- SEARCH + FILTER                                            -->
    <!-- ========================================================== -->


    <form method="GET" class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 mb-8">


        <div class="flex flex-col lg:flex-row gap-4">


            <!-- Search -->

            <div class="relative flex-1">


                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">


                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />


                </svg>



                <input type="text" name="search" value="<?=htmlspecialchars($_GET['search'] ?? '')?>"
                    placeholder="Search clubs..." class="
                    w-full
                    pl-12
                    pr-4
                    py-3
                    rounded-xl
                    border
                    border-gray-200
                    text-sm
                    focus:ring-2
                    focus:ring-blue-500
                    outline-none
                    ">


            </div>





            <!-- Category -->


            <div class="relative">


                <select name="category_id" class="
                    appearance-none
                    w-full
                    lg:w-56
                    px-5
                    py-3
                    rounded-xl
                    border
                    border-gray-200
                    text-sm
                    bg-white
                    cursor-pointer
                    ">


                    <option value="">
                        All Categories
                    </option>



                    <?php foreach($categories as $category): ?>


                    <option value="<?=$category['id']?>" <?=($_GET['category_id'] ?? '') == $category['id']
                        ? 'selected'
                        : ''?>>

                        <?=htmlspecialchars($category['name'])?>


                    </option>


                    <?php endforeach; ?>


                </select>



            </div>






            <button class="
                bg-blue-600
                hover:bg-blue-700
                text-white
                px-8
                py-3
                rounded-xl
                text-sm
                font-semibold
                transition
                ">


                Search


            </button>


        </div>


    </form>








    <!-- ========================================================== -->
    <!-- RESULT HEADER                                              -->
    <!-- ========================================================== -->


    <div class="flex justify-between items-center mb-6">


        <h2 class="text-xl font-bold text-gray-800">


            Explore Clubs


        </h2>



        <span class="text-sm text-gray-500">


            <?=$pagination['total']?> clubs found


        </span>


    </div>








    <!-- ========================================================== -->
    <!-- CLUB GRID                                                  -->
    <!-- ========================================================== -->


    <div id="clubs" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">



        <?php if(empty($clubs)): ?>


        <div class="col-span-full bg-white rounded-2xl p-10 text-center">


            <h3 class="text-xl font-bold text-gray-700">


                No Clubs Found


            </h3>



            <p class="text-gray-500 mt-2">


                Try another search or category.


            </p>


        </div>


        <?php endif; ?>





        <?php foreach($clubs as $club): ?>


        <div class="
            bg-white
            rounded-2xl
            overflow-hidden
            border
            border-gray-100
            shadow-sm
            hover:shadow-lg
            transition
            ">



            <!-- Banner -->


            <div class="relative h-48 bg-gray-200">


                <?php if($club->getBanner()): ?>


                <img src="<?=BASE_URL?>/uploads/clubs/<?=$club->getBanner()?>" class="w-full h-full object-cover">



                <?php else: ?>


                <div class="h-full flex items-center justify-center">


                    <svg class="w-14 h-14 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">


                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />


                    </svg>


                </div>


                <?php endif; ?>




                <div class="
                    absolute
                    bottom-3
                    right-3
                    bg-white/90
                    backdrop-blur
                    px-3
                    py-1
                    rounded-full
                    text-xs
                    font-semibold
                    text-gray-700
                    ">


                    <?=$club->getMemberCount()?> Members


                </div>



            </div>







            <!-- Content -->


            <div class="p-5">



                <span class="
                    inline-block
                    bg-blue-50
                    text-blue-600
                    px-3
                    py-1
                    rounded-full
                    text-xs
                    font-semibold
                    mb-3
                    ">


                    Student Club


                </span>





                <h3 class="
                    text-xl
                    font-bold
                    text-gray-800
                    mb-2
                    line-clamp-1
                    ">


                    <?=htmlspecialchars($club->getName())?>


                </h3>





                <p class="
                    text-sm
                    text-gray-600
                    line-clamp-3
                    mb-5
                    ">


                    <?=htmlspecialchars($club->getDescription())?>


                </p>







                <a href="<?= BASE_URL ?>/clubs/<?=$club->getId()?>" class="
                    block
                    text-center
                    bg-blue-600
                    hover:bg-blue-700
                    text-white
                    py-3
                    rounded-xl
                    text-sm
                    font-semibold
                    transition
                    ">


                    View Club Details


                </a>


            </div>



        </div>



        <?php endforeach; ?>


    </div>

    <!-- ========================================================== -->
    <!-- PAGINATION                                                 -->
    <!-- ========================================================== -->

    <?php if($pagination['total_pages'] > 1): ?>


    <div class="flex justify-center items-center gap-4 mt-8">


        <?php
    $current = $pagination['current_page'];
    $total = $pagination['total_pages'];


    $prevQuery = $_GET;
    $prevQuery['page'] = max(1, $current - 1);


    $nextQuery = $_GET;
    $nextQuery['page'] = min($total, $current + 1);

    ?>



        <!-- Previous -->

        <a href="?<?=http_build_query($prevQuery)?>#clubs" class="
        flex
        items-center
        gap-2
        px-5
        py-3
        rounded-xl
        border
        text-sm
        font-semibold
        transition

        <?=$current == 1
            ? 'pointer-events-none opacity-40 bg-gray-100'
            : 'bg-white hover:bg-blue-50 text-gray-700'
        ?>
        ">


            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />

            </svg>


            Previous


        </a>





        <!-- Page Info -->

        <div class="
        px-5
        py-3
        rounded-xl
        bg-blue-50
        text-blue-600
        text-sm
        font-semibold
        ">


            Page <?=$current?> of <?=$total?>


        </div>





        <!-- Next -->

        <a href="?<?=http_build_query($nextQuery)?>#clubs" class="
        flex
        items-center
        gap-2
        px-5
        py-3
        rounded-xl
        border
        text-sm
        font-semibold
        transition

        <?=$current == $total
            ? 'pointer-events-none opacity-40 bg-gray-100'
            : 'bg-white hover:bg-blue-50 text-gray-700'
        ?>
        ">


            Next


            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />

            </svg>


        </a>



    </div>


    <?php endif; ?>




</main>