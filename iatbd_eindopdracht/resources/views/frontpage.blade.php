<!DOCTYPE html>
<html lang="nl">
<head>
    @include('components.head')
    <title>Time2Share</title>
</head>
<body class="wrapper" >
    @include('components.header')
    <a href="/mijnprofiel">{{auth()->user()->name}}</a>

    <main>
        <section class="mijnproducten">
            @foreach ($items as $item)
            @if ($login_user != $item->id_lender)
            <section class="item_card">
                <figure class="figure_img"><img class="item_img" src="{{$item->image}}" alt="$item->item_name"></figure>
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
    @include('components.footer')
</body>
</html>
