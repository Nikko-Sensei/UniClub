document.addEventListener("DOMContentLoaded", () => {
  const badge = document.getElementById("notificationBadge");

  const button = document.getElementById("notificationButton");

  const dropdown = document.getElementById("notificationDropdown");

  function loadNotificationCount() {
    if (!badge) {
      console.log("Notification badge not found");

      return;
    }

    fetch(BASE_URL + "/notifications/unread-count")
      .then((response) => response.json())

      .then((data) => {
        if (data.count > 0) {
          badge.innerText = data.count;

          badge.classList.remove("hidden");
        } else {
          badge.innerText = "";

          badge.classList.add("hidden");
        }
      })

      .catch((error) => console.error("Notification count error:", error));
  }

  loadNotificationCount();

  setInterval(loadNotificationCount, 30000);

  if (button && dropdown) {
    button.addEventListener("click", () => {
      dropdown.classList.toggle("hidden");

      loadNotifications();
    });
  }

  document.addEventListener("click", (event) => {
    if (
      button &&
      dropdown &&
      !button.contains(event.target) &&
      !dropdown.contains(event.target)
    ) {
      dropdown.classList.add("hidden");
    }
  });
});

function loadNotifications() {
  fetch(BASE_URL + "/notifications/latest")
    .then((response) => response.json())

    .then((data) => {
      const list = document.getElementById("notificationList");

      if (!list) {
        console.log("Notification list not found");

        return;
      }

      if (data.length === 0) {
        list.innerHTML = `
                <div class="p-4 text-center text-gray-500">
                    No notifications
                </div>
                `;

        return;
      }

      list.innerHTML = "";

      data.forEach((notification) => {
        const bgClass = notification.isRead ? "bg-white" : "bg-blue-50";

        list.innerHTML += `
                <a href="${BASE_URL}/notifications/read/${notification.id}"
                class="block p-4 border-b hover:bg-gray-50 ${bgClass}">



                        <p class="font-semibold text-gray-800 flex items-center gap-2">

                         ${notification.title}


                        ${
                          notification.isRead
                            ? ""
                            : '<span class="w-2 h-2 bg-blue-600 rounded-full"></span>'
                        }

                        </p>


                        <p class="text-sm text-gray-500 mt-1">
                            ${notification.message}
                        </p>


                        <span class="text-xs text-gray-400">
                            ${notification.createdAt}
                        </span>


                    </a>
                    `;
      });
    })

    .catch((error) => console.error("Notification loading error:", error));
}
