document.addEventListener(
    "DOMContentLoaded",
    () => {


        const count =
            document.getElementById(
                "notificationCount"
            );


        function loadNotificationCount(){

            fetch(
                BASE_URL + 
                "/notifications/unread-count"
            )
            .then(response => response.json())
            .then(data => {

                if(data.count > 0){

                    count.innerText =
                        data.count;

                }else{

                    count.innerText = "";

                }

            });

        }



        loadNotificationCount();


        setInterval(
            loadNotificationCount,
            30000
        );


    }
);

function loadNotifications(){


    fetch(
        BASE_URL + 
        "/notifications/latest"
    )

    .then(
        response =>
        response.json()
    )

    .then(
        data => {


            const list =
                document.getElementById(
                    "notificationList"
                );


            if(data.length === 0)
            {

                list.innerHTML =
                `
                <div class="p-4 text-center text-gray-500">
                    No notifications
                </div>
                `;

                return;

            }



            list.innerHTML = "";



            data.forEach(
                notification => {


                    list.innerHTML +=
                    `
                    <a href="${BASE_URL}/notifications/read/${notification.id}"
                       class="block p-4 hover:bg-gray-50">


                        <p class="font-semibold text-gray-800">

                            ${notification.title}

                        </p>


                        <p class="text-sm text-gray-500">

                            ${notification.message}

                        </p>


                        <span class="text-xs text-gray-400">

                            ${notification.createdAt}

                        </span>


                    </a>
                    `;


                }
            );


        }
    );


}