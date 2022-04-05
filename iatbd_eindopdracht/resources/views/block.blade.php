<!DOCTYPE html>
<html lang="nl">
<head>
    @include('components.head')
    <title>Blokkeren</title>
</head>
<body class="wrapper" >
    @include('components.header')

    <main>
        <section class="center center_review">
            <h1>Blokkeren</h1>
            <form action="/blocked" method="POST">
                @csrf

                <div class="txt_field">
                    <label for="user">Gebruiker:</label>
                <select name="user" id="user" required>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                </div>


                <button class="btn_Card" type="submit">Blokkeren</button>
        </section>
    </main>
    @include('components.footer')
</body>
</html>
