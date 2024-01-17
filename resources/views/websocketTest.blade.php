<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>{{ Auth::id() }}</p>

</body>

@vite('resources/js/app.js')
<script>
    setTimeout(() => {
        window.Echo.channel('test')
        .listen('.myWebsocket', (e)=>{
            console.log(e)
        })
    }, 200);

    setTimeout(() => {
        window.Echo.private('myPrivateChannel.user.{{ Auth::id() }}')
        .listen('.private_message', (e)=>{
            console.log(e)
        })
    }, 200);
</script>
</html>
