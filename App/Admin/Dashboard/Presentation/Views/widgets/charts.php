<!-- ========================================================== -->
<!-- CHARTS – Glass cards with modern design                    -->
<!-- ========================================================== -->




<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">


    <!-- Users By Department -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <div class="flex items-center gap-3 mb-5">

            <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center shadow-sm">
                <i data-lucide="users" class="w-5 h-5"></i>
            </div>

            <div>
                <h2 class="text-lg font-bold text-slate-800">
                    Users By Department
                </h2>

                <p class="text-xs text-slate-400">
                    Distribution across departments
                </p>
            </div>

        </div>


        <div class="relative min-h-[200px]">

            <canvas id="usersDepartmentChart" class="w-full h-64">
            </canvas>


            <div id="usersDepartmentFallback" class="hidden flex-col items-center justify-center h-64 text-center">

                <i data-lucide="pie-chart" class="w-10 h-10 text-slate-300 mb-2">
                </i>

                <p class="text-sm text-slate-500">
                    No department data available
                </p>

            </div>


        </div>


    </div>





    <!-- Events Per Month -->

    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">


        <div class="flex items-center gap-3 mb-5">


            <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shadow-sm">

                <i data-lucide="calendar" class="w-5 h-5"></i>

            </div>


            <div>

                <h2 class="text-lg font-bold text-slate-800">
                    Events Per Month
                </h2>


                <p class="text-xs text-slate-400">
                    Monthly activity trends
                </p>

            </div>


        </div>



        <div class="relative min-h-[200px]">


            <canvas id="eventsMonthChart" class="w-full h-64">
            </canvas>



            <div id="eventsMonthFallback" class="hidden flex-col items-center justify-center h-64 text-center">

                <i data-lucide="calendar" class="w-10 h-10 text-slate-300 mb-2">
                </i>


                <p class="text-sm text-slate-500">
                    No event data available
                </p>


            </div>


        </div>


    </div>





    <!-- Membership By Club -->


    <div
        class="lg:col-span-2 glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">


        <div class="flex items-center gap-3 mb-5">


            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shadow-sm">

                <i data-lucide="award" class="w-5 h-5"></i>

            </div>


            <div>

                <h2 class="text-lg font-bold text-slate-800">
                    Memberships By Club
                </h2>


                <p class="text-xs text-slate-400">
                    Club popularity rankings
                </p>

            </div>


        </div>




        <div class="relative min-h-[200px]">


            <canvas id="membershipsClubChart" class="w-full h-72">
            </canvas>



            <div id="membershipsClubFallback" class="hidden flex-col items-center justify-center h-72 text-center">


                <i data-lucide="award" class="w-10 h-10 text-slate-300 mb-2">
                </i>


                <p class="text-sm text-slate-500">
                    No membership data available
                </p>


            </div>


        </div>


    </div>


</div>





<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<script>
    const usersDepartment =
        <?= json_encode(
            $dashboard->usersByDepartment
        ) ?>;



    const eventsMonth =
        <?= json_encode(
            $dashboard->eventsPerMonth
        ) ?>;



    const membershipsClub =
        <?= json_encode(
            $dashboard->membershipsByClub
        ) ?>;




    document.addEventListener(
        'DOMContentLoaded',
        function() {



            if (typeof lucide !== 'undefined') {

                lucide.createIcons();

            }




            Chart.defaults.font.family =
                "'Inter', system-ui, sans-serif";


            Chart.defaults.font.size = 12;

            Chart.defaults.color =
                '#64748b';





            function isValidData(data) {

                return Array.isArray(data) &&
                    data.length > 0;

            }




            function showFallback(id) {


                const element =
                    document.getElementById(id);



                if (element) {

                    element.classList.remove(
                        'hidden'
                    );


                    element.classList.add(
                        'flex'
                    );

                }

            }






            // Users Department Chart


            const usersChart =
                document.getElementById(
                    'usersDepartmentChart'
                );



            if (usersChart) {


                if (isValidData(usersDepartment)) {


                    new Chart(
                        usersChart, {


                            type: 'doughnut',


                            data: {


                                labels: usersDepartment.map(
                                    item => item.name
                                ),


                                datasets: [{


                                    data: usersDepartment.map(
                                        item => Number(item.total)
                                    ),


                                    borderWidth: 2,


                                    hoverOffset: 8


                                }]


                            },


                            options: {


                                responsive: true,


                                plugins: {


                                    legend: {


                                        position: 'bottom'


                                    }


                                },


                                cutout: '65%'


                            }


                        });


                } else {


                    showFallback(
                        'usersDepartmentFallback'
                    );


                }


            }






            // Events Chart


            const eventsChart =
                document.getElementById(
                    'eventsMonthChart'
                );



            if (eventsChart) {


                if (isValidData(eventsMonth)) {


                    new Chart(
                        eventsChart, {


                            type: 'bar',


                            data: {


                                labels: eventsMonth.map(
                                    item => item.month
                                ),


                                datasets: [{


                                    label: 'Events',


                                    data: eventsMonth.map(
                                        item => Number(item.total)
                                    ),


                                    borderRadius: 6


                                }]


                            },


                            options: {


                                responsive: true,


                                plugins: {


                                    legend: {
                                        display: false
                                    }


                                },


                                scales: {


                                    y: {


                                        beginAtZero: true


                                    }


                                }


                            }



                        });


                } else {


                    showFallback(
                        'eventsMonthFallback'
                    );


                }


            }







            // Membership Chart


            const membershipChart =
                document.getElementById(
                    'membershipsClubChart'
                );



            if (membershipChart) {


                if (isValidData(membershipsClub)) {


                    new Chart(
                        membershipChart, {


                            type: 'bar',


                            data: {


                                labels: membershipsClub.map(
                                    item => item.name
                                ),


                                datasets: [{


                                    label: 'Members',


                                    data: membershipsClub.map(
                                        item => Number(item.total)
                                    ),


                                    borderRadius: 6


                                }]


                            },


                            options: {


                                indexAxis: 'y',


                                responsive: true,


                                plugins: {


                                    legend: {
                                        display: false
                                    }


                                }


                            }



                        });


                } else {


                    showFallback(
                        'membershipsClubFallback'
                    );


                }


            }



        }

    );
</script>