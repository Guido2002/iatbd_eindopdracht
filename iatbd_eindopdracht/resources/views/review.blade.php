<!DOCTYPE html>
<html lang="nl">
<head>
    @include('components.head')
    <title>Recensie schrijven</title>
</head>
<body class="wrapper">
    @include('components.header')

    <main>
        <section class="center center_review">
            <h1>Recensie schrijven</h1>
            <form action="/items/{{$userId}}&{{$itemId}}" method="POST">
                @csrf

                <div class="txt_field">
                    <label for="cijfer"> Cijfer: </label>
                    <input name="cijfer" id="cijfer" type="number" min="1" max="10" required>
                </div>

                <div class="txt_field">
                    <label for="review"> Bericht: </label>
                    <input name="review" id="review" type="text" required>
                </div>

                <button class="btn_Card" type="submit">Recensie versturen</button>
        </section>
    </main>
    @include('components.footer')
</body>
</html>
