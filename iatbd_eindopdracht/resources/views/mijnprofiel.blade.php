<!DOCTYPE html>
<html lang="nl">
<head>
    @include('components.head')
    <title>Profiel van {{auth()->user()->name}}</title>
</head>
<body class="wrapper" id="mijnprofiel">
    @include('components.header')

    @if (auth()->user()->blocked == 1)
        <p>U bent geblokkeerd door de beheerder</p>
        <a href="/logout">Terug naar inlogpagina</a>
    @else
    <li class="funct_list">
        <a class="funct" href="/logout">Uitloggen</a>
        <a class="funct" href="/block">Blokkeren</a>
        <a class="funct" href="/delete">Verwijderen</a>
    </li>
    @endif
    <main class="profielmain">
        <a href="/create">Maak nieuw product aan</a>
        <h2>Jouw producten</h2>
        <section class="mijnproducten">
            @foreach ($items as $item)
            @if ($item->id_lender == $login_user)
                <section class="item_card item_profiel">
                    <figure><img class="item_img" src="{{$item->image}}" alt="$item->item_name"></figure>
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
        <h2>Producten die u momenteelt leent</h2>
        <section class="mijnproducten">
            @foreach ($items as $item)
            @if ($item->id_borrower == $login_user)
                <section class="item_card item_profiel">
                    <figure><img class="item_img" src="{{$item->image}}" alt="{{$item->item_name}}"></figure>
                    <h2>{{$item->item_name}}</h2>
                    <div class="text">
                        <p>Categorie: {{$item->kind}}</p>
                        <p>Hoeveel dagen leenbaar: {{$item->time_loaned}}</p>
                    </div>
                    <a  href="/item/{{$item->id}}"> Bekijk dit product!</a>
                </section>
                @endif
        @endforeach
        </section>
        <h2>Reviews</h2>
        <section class="mijnreviews">
                @foreach ($reviews as $review)
                @if ($review->reader == $login_user)
                <div class="mijnreview">
                    <p>{{$review->review}}</p>
                    <p>Cijfer: {{$review->cijfer}}</p>
                    @foreach ($users as $user)
                        @if ($review->writer == $user->id)
                            <p>Geschreven door {{$user->name}}</p>
                        @endif
                    @endforeach
                </div>
                @endif
            @endforeach
        </section>
        <h2>Verzoeken</h2>
        <section class="mijnreviews">
                @foreach ($requests as $request)
                    @if ($request->reader == $login_user && $request->confirmed == 0)
                    <div class="mijnreview">
                        @foreach ($users as $user)
                            @if ($request->user_id == $user->id)
                                <p>Verzoek door {{$user->name}}</p>
                            @endif
                        @endforeach
                        @foreach ($items as $item)
                            @if ($request->item_id == $item->id)
                                <p>Voor product {{$item->item_name}}</p>
                                <a href="/geleend/{{$item->id_lender}}&{{$item->id}}&{{$request->id}}">V</a>
                                <a href="/delete/request&{{$request->id}}">X</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                </div>
        </section>
    </main>
    @include('components.footer')
</body>
</html>
