type = ['primary', 'info', 'success', 'warning', 'danger'];
demo = {

    showNotification: function (from, align) {
        var message_welcome = ``
        color = Math.floor(2);
        var name = document.getElementById('check_nav_active')

        $.notify({
                icon: "nc-icon nc-app",
                message: `Hello ${name.slot} Welcome to <b>Music Box Dashboard</b> - Wish you a day with beautiful journeys and experiences.`
            },
            {
                type: type[color],
                timer: 8000,
                placement: {
                    from: from,
                    align: align
                }
            });
    }
}
