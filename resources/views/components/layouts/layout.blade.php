<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
    @vite("resources/css/app.css")
</head>
<body>
<x-layouts.header/>
<hr />
<x-layouts.nav/>


<main class="h-65v bg-main">
    {{$slot}}
</main>

<x-layouts.footer/>

</body>
</html>
