<!DOCTYPE html>
<html lang="nl">
<head>
    @include('components.head')
    <title>Recensie schrijven</title>
</head>
<body class="wrapper">
    @include('components.header')

    <main class="main">
        <form action="/items/{{$userId}}&{{$itemId}}" method="POST">
            @csrf

            <label for="cijfer"> Cijfer </label>
            <input name="cijfer" id="cijfer" type="number" min="1" max="10">

            <label for="review"> Bericht </label>
            <input name="review" id="review" type="text">

            <button type="submit">Recensie versturen</button>
    </main>
    @include('components.footer')
</body>
</html>
