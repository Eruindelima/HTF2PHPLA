import Echo from "laravel-echo";

(async () => {
    window.Pusher = require("pusher-js");
    window.Echo = new Echo({
        broadcaster: "pusher",
        key: process.env.MIX_PUSHER_APP_KEY,
        cluster: process.env.MIX_PUSHER_APP_CLUSTER,
        forceTLS: true
    });
    const currentHour = new Date().getHours();
    let greeting = "Bom dia!";
    if (currentHour >= 12 && currentHour < 18) {
        greeting = "Boa tarde!";
    } else if (currentHour >= 18 && currentHour <= 23) {
        greeting = "Boa noite!";
    }

    const greetingEl = document.getElementById("greeting");
    greetingEl.innerText = greeting;

    window.Echo.private("notification-channel").listen(
        "NotificationEvent",
        data => handlePushNotification(data)
    );

    const handlePushNotification = ({ countNotifications, data }) => {
        $("a[data-channel='notification-channel']").addClass("pulse");

        $("h6[data-channel='notification-channel']").empty().append(`
            Você tem <strong class="text-primary">${countNotifications}</strong> novo(s) pedido(s).
        `);

        $("div[data-channel='notification-channel']").append(`
            <a href="${data.route}" class="list-group-item list-group-item-action">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <img alt="Image placeholder"
                            src="${data.photo}"
                            class="avatar rounded-circle">
                    </div>
                    <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0 text-sm">${data.name}</h4>
                            </div>
                            <div class="text-right text-muted">
                                <small>Pedido feito em: ${data.createdAt}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        `);
    };
})();
