<!DOCTYPE html>
<html lang="nl">
<head>
    @include('components.head')
    <title>Mijn Profiel</title>
</head>
<body class="wrapper" id="mijnprofiel">
    @include('components.header')
    @include('components.userchecker')
    @if (auth()->user()->blocked ==0)
    <main class="items">
        <div id="myBtn">
            <button class="btn active" onclick="filterSelection('producten')"> Mijn Producten </button>
            <button class="btn" onclick="filterSelection('leen')"> Geleende producten</button>
            <button class="btn" onclick="filterSelection('reviews')"> Reviews</button>
            <button class="btn" onclick="filterSelection('verzoeken')"> Verzoeken </button>
        </div>
        <section class="filter producten">
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
        </section>
        <section class="filter leen">
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
        </section>
        <section class="filter reviews">

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
        </section>
        <section class="filter verzoeken">
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
        </section>
    </main>
    @endif
    @include('components.footer')
</body>
</html>
@include("components.jsmijnprofiel")

