<!DOCTYPE html>
<html lang="nl">
<head>
    @include('components.head')
    <title>Profiel van {{auth()->user()->name}}</title>
</head>
<body class="wrapper" id="mijnprofiel">
    @include('components.header')

    <h2>Mijn Profiel</h2>

    <main class="profielmain">
        <h3>Jouw producten</h3>
        <section class="mijnproducten">
            @foreach ($items as $item)
            @if ($item->id_lender == $login_user)
                <section class="item_card item_profiel">
                    <figure><img class="item_img" src="{{$item->image}}" alt="$item->item_name"></figure>
                    <div>
                        <h2>{{$item->item_name}}</h2>
                        <p>Categorie: {{$item->kind}}</p>
                        <p>Hoeveel dagen leenbaar: {{$item->time_loaned}} dagen</p>
                    </div>
                    <a href="/item/{{$item->id}}"> Bekijk dit product!</a>
                </section>
                @endif
        @endforeach
        @if ($item->id_lender != $login_user)
        <p>Je hebt momenteel geen producten</p>
        @endif
        </section>
        <section>
            <h3>Producten die momenteelt leent</h3>
            @foreach ($items as $item)
            @if ($item->id_borrower == $login_user)
                <section class="item_card">
                    <figure><img class="item_img" src="{{$item->image}}" alt="{{$item->item_name}}"></figure>
                    <div>
                        <h2>{{$item->item_name}}</h2>
                        <p>Categorie: {{$item->kind}}</p>
                        <p>Hoeveel dagen leenbaar: {{$item->time_loaned}} dagen</p>
                    </div>
                    <a href="/item/{{$item->id}}"> Bekijk dit product!</a>
                </section>
                @endif
        @endforeach
        </section>
        <section>
            <h3>Reviews</h3>
            @foreach ($reviews as $review)
                @if ($review->reader == $login_user)
                    <p>{{$review->review}}</p>
                    <p>Cijfer voor het lenen van product: {{$review->cijfer}}</p>
                @endif
            @endforeach
        </section>
    </main>
    @include('components.footer')
</body>
</html>
