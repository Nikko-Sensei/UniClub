<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">


    <!-- Users By Department -->

    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-xl font-bold text-gray-800 mb-4">
            Users By Department
        </h2>


        <canvas id="usersDepartmentChart"></canvas>

    </div>



    <!-- Events Per Month -->

    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-xl font-bold text-gray-800 mb-4">
            Events Per Month
        </h2>


        <canvas id="eventsMonthChart"></canvas>

    </div>



    <!-- Memberships By Club -->

    <div class="bg-white rounded-xl shadow p-6 lg:col-span-2">

        <h2 class="text-xl font-bold text-gray-800 mb-4">
            Memberships By Club
        </h2>


        <canvas id="membershipsClubChart"></canvas>

    </div>


</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
const usersDepartment =
    <?= json_encode($dashboard->usersByDepartment) ?>;


const eventsMonth =
    <?= json_encode($dashboard->eventsPerMonth) ?>;


const membershipsClub =
    <?= json_encode($dashboard->membershipsByClub) ?>;



// Users By Department Chart

new Chart(
    document.getElementById('usersDepartmentChart'), {

        type: 'doughnut',

        data: {

            labels: usersDepartment.map(
                item => item.name
            ),


            datasets: [

                {

                    data: usersDepartment.map(
                        item => item.total
                    )

                }

            ]

        }

    }

);



// Events Per Month Chart

new Chart(
    document.getElementById('eventsMonthChart'), {

        type: 'bar',

        data: {

            labels: eventsMonth.map(
                item => item.month
            ),


            datasets: [

                {

                    label: 'Events',

                    data: eventsMonth.map(
                        item => item.total
                    )

                }

            ]

        }

    }

);



// Memberships By Club Chart

new Chart(
    document.getElementById('membershipsClubChart'), {

        type: 'bar',

        data: {

            labels: membershipsClub.map(
                item => item.name
            ),


            datasets: [

                {

                    label: 'Members',

                    data: membershipsClub.map(
                        item => item.total
                    )

                }

            ]

        },

        options: {

            indexAxis: 'y'

        }

    }

);
</script>