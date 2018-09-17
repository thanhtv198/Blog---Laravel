$(document).ready(function(){
    // Khởi tạo một đối tượng Pusher với app_key
    var pusher = new Pusher('9281613fb77542ad60a7', {
        cluster: 'ap1',
        encrypted: true
    });

    //Đăng ký với kênh chanel-demo-real-time mà ta đã tạo trong file DemoPusherEvent.php
    var channel = pusher.subscribe('notify-welcome');

    //Bind một function addMesagePusher với sự kiện DemoPusherEvent
    channel.bind('App\\Events\\NotifyWelcome', addMessageDemo);
});

//function add message
function addMessageDemo(data) {
    // console.log(5);
    var liTag = $("<li class='list-group-item'>ggggg</li>");
    liTag.html(data.message);
    $('#messages').append(liTag);
}