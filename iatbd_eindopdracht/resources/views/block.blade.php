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
    <a href="/mijnprofiel">Mijn Profiel</a>
    <main>
        <section class="center center_review">
            <h1>Blokkeren</h1>
            <form action="/blocked" method="POST">
                @csrf

                <div class="txt_field">
                    <label for="user">Gebruiker:</label>
                <select name="user" id="user" required>
                    @foreach ($users as $user)
                    @if ($user->role != "admin")
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endif
                    @endforeach
                </select>
                </div>


                <button class="btn_Card" type="submit">Blokkeren</button>
        </section>
    </main>
    @endif
    @include('components.footer')
</body>
</html>
