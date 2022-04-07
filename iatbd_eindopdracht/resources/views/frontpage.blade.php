<!DOCTYPE html>
<html lang="nl">
<head>
    @include('components.head')
    <title>Time2Share</title>
</head>
<body class="wrapper" >
    @include('components.header')
    @if (auth()->user()->blocked == 1)
        <p>U bent geblokkeerd door de beheerder</p>
        <a href="/logout">Terug naar inlogpagina</a>
    @else
    <main class="items">
        <div id="myBtn">
            <button class="btn active" onclick="filterSelection('all')"> Alle items</button>
            <button class="btn" onclick="filterSelection('cassette')"> Cassette </button>
            <button class="btn" onclick="filterSelection('toetsenborden')"> Toetsenborden</button>
            <button class="btn" onclick="filterSelection('kinderspeelgoed')"> Kinderspeelgoed</button>
            <button class="btn" onclick="filterSelection('games')"> Games </button>
        </div>
        <section class="mijnproducten">
            @foreach ($items as $item)
            @if ($login_user != $item->id_lender && $item->loaned == 0 || $login_user == $item->id_borrower && $item->loaned == 0)
            <section class="item_card filterDiv {{$item->kind}}">
                <figure class="figure_img"><img class="item_img" src="{{$item->image}}" alt="{{$item->item_name}}"></figure>
                    <h2>{{$item->item_name}}</h2>
                    <div class="text">
                        <p>Categorie: {{$item->kind}}</p>
                        <p>Hoeveel dagen leenbaar: {{$item->time_loaned}}</p>
                    </div>
                <a href="/item/{{$item->id}}"> Bekijk dit product!</a>
            </section>
        @endif
        @endforeach
        </section>
    </main>
    @endif
    @include('components.footer')
</body>
</html>
@include("components.jsfrontpage")
