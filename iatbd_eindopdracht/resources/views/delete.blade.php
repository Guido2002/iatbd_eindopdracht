<!DOCTYPE html>
<html lang="nl">
<head>
    @include('components.head')
    <title>Blokkeren</title>
</head>
<body class="wrapper" >
    @include('components.header')
    @if (auth()->user()->blocked == 1)
    <p>U bent geblokkeerd door de beheerder</p>
    <a href="/logout">Terug naar inlogpagina</a>
    @else
    <main>
        <section class="center center_review">
            <h1>Product verwijderen</h1>
            <form action="/deleted" method="POST">
                @csrf

                <div class="txt_field">
                    <label for="item">Product:</label>
                <select name="item" id="item" required>
                    @foreach ($items as $item)
                        <option value="{{$item->id}}">{{$item->item_name}}</option>
                    @endforeach
                </select>
                </div>


                <button class="btn_Card" type="submit">Verwijderen</button>
        </section>
    </main>
    @endif
    @include('components.footer')
</body>
</html>
