<!DOCTYPE html>
<html lang="nl">
<head>
    @include('components.head')
    <title>Profiel van {{auth()->user()->name}}</title>
</head>
<body class="wrapper" id="mijnprofiel">
    @include('components.header')
    <main class="profielmain">
        <h2>Jouw producten</h2>
        <section class="mijnproducten">
            @foreach ($items as $item)
            @if ($item->id_lender == $login_user)
                <section class="item_card item_profiel">
                    <figure><img class="item_img" src="{{$item->image}}" alt="$item->item_name"></figure>
                    <h2>{{$item->item_name}}</h2>
                    <div class="text">
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
        <h2>Producten die u momenteelt leent</h2>
        <section class="mijnproducten">
            @foreach ($items as $item)
            @if ($item->id_borrower == $login_user)
                <section class="item_card item_profiel">
                    <figure><img class="item_img" src="{{$item->image}}" alt="{{$item->item_name}}"></figure>
                    <h2>{{$item->item_name}}</h2>
                    <div class="text">
                        <p>Categorie: {{$item->kind}}</p>
                        <p>Hoeveel dagen leenbaar: {{$item->time_loaned}} dagen</p>
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
    </main>
    @include('components.footer')
</body>
</html>
