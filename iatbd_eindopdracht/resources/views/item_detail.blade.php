<!DOCTYPE html>
<html lang="nl">
<head>
    @include("components.head")
    <title>{{$item->item_name}}</title>
</head>
<body class="wrapper">
    @include('components.header')
    @if (auth()->user()->blocked == 1)
        <p>U bent geblokkeerd door de beheerder</p>
        <a href="/logout">Terug naar inlogpagina</a>
    @else
        <main>
            <h2>{{$item->item_name}}</h2>
            <section class="item_detail">
                <figure><img src="{{$item->image}}" alt="{{$item->item_name}}"></figure>
            <div class="textbox">
                <p>{{$item->description}}</p>
                @foreach ($users as $user)
                    @if ($user->id == $item->id_lender)
                        <p>Aangeboden door: {{$user->name}}</p>
                        <p>Contact: {{$user->email}}</p>
                    @endif
                @endforeach
                <p>Categorie: {{$item->kind}}</p>
                <p>Dagen leenbaar: {{$item->time_loaned}}</p>
                @if ($item->loaned == 1)
                    <p>Dit item is al uitgeleend!</p>
                @else
                    <p>Dit item is nog niet uitgeleend!</p>
                @endif
            </div>
                @if ($login_user == $item->id_borrower)
                    <a class="funct show"  href="/review/{{$item->id_lender}}&{{$item->id}}">Retourneer</a>
                @elseif($login_user !=  $item->id_lender && $item->loaned == 0)
                    <a class="funct show" href="/geleenditem/{{$login_user}}&{{$item->id}}">Leen product</a>
                @endif
        @endif
    </section>
    </main>
    @include("components.footer")
</body>
</html>
