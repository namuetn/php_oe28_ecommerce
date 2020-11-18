$(document).ready(function(){
    var pusher = new Pusher('40765a79cbb99cc48828', {
        encrypted: true,
        cluster: "ap1"
    });

    var countNotification = 0;
    var channel = pusher.subscribe('NotificationEvent');

    channel.bind('send-message', function(data) {
        var newNotificationHtml = `
            <a href="admin/orders/${data.order_id}" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i><p style="display: inline;">${data.title}</p>
                <span class="float-right text-muted text-sm">${data.order_id}</span>
            </a>
        `;

        countNotification++;
        $('.count-notification').text(countNotification);
        $('.menu-notification').prepend(newNotificationHtml);
    });

    $('body').on('click', '.bell', function () {
        $('.bell').children().find('.count-notification').html('');
    });
});
