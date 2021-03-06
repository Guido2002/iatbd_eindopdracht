<!DOCTYPE html>
<html lang="nl">
<head>
    @include('components.head')
    <title>Time2Share</title>
</head>
<body class="wrapper">
    @include('components.header')
    @if (auth()->user()->blocked == 1)
    <p>U bent geblokkeerd door de beheerder</p>
    <a href="/logout">Terug naar inlogpagina</a>
    @else
    <main>
        <section class="center">
            <h1>Aanmaken van product</h1>
            <form action="/items" method="POST">
                @csrf
                <div class="txt_field">
                    <label for="name" id="lb"> Naam: </label>
                    <input name="name" id="name" type="text" placeholder="Vul hier productnaam in" required>
                </div>

                <div class="txt_field">
                    <label for="kind">Soort: </label>
                <select name="kind" id="kind" required>
                    @foreach ($kind_of_item as $kind_of_item)
                        <option value="{{$kind_of_item->kind}}">{{$kind_of_item->kind}}</option>
                    @endforeach
                </select>
                </div>

                <div class="txt_field">
                    <label for="description"> Omschrijving: </label>
                    <input name="description" id="description" placeholder="Vul hier de omschrijving in" type="text" required>
                </div>

                <div class="txt_field">
                    <label for="image"> Afbeelding: </label>
                <select name="image" id="image" required>
                    @foreach ($items as $item)
                        <option value="{{$item->image}}">{{$item->image}}</option>
                    @endforeach
                </select>
                </div>

                <div class="txt_field">
                    <label for="leentijd"> Leentijd in dagen: </label>
                    <input name="leentijd" id="leentijd" type="number" min="1" max="365" required>
                </div>

                <button class="btn_Card" type="submit">Product aanmaken</button>
        </section>
    </main>
    @endif
    @include('components.footer')
</body>
</html>
