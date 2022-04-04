<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.head')
    <title>Time2Share</title>
</head>
<body class="wrapper">
    @include('components.header')

    <main class="main">
        @foreach ($items as $item)
            <section>
                <figure><img src="{{$item->image}}" alt="$item->item_name"></figure>
                <div>
                    <h2>{{$item->item_name}}</h2>
                    <p>Categorie: {{$item->kind}}</p>
                    <p>Hoeveel dagen leenbaar is: {{$item->time_loaned}} days</p>
                </div>
                <a href="/item/{{$item->id}}"> Bekijk dit product!</a>
            </section>
        @endforeach
    </main>

</body>
</html>
