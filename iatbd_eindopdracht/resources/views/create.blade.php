<!DOCTYPE html>
<html lang="nl">
<head>
    @include('components.head')
    <title>Time2Share</title>
</head>
<body class="wrapper">
    @include('components.header')
    <a href="/mijnprofiel">{{auth()->user()->name}}</a>

    <main class="main">
        <form action="/items" method="POST">
            @csrf

            <label for="name"> Naam </label>
            <input name="name" id="name" type="text">

            <label for="kind">Soort </label>
            <select name="kind" id="kind">
                @foreach ($kind_of_item as $kind_of_item)
                    <option value="{{$kind_of_item->kind}}">{{$kind_of_item->kind}}</option>
                @endforeach
            </select>

            <label for="description"> Description </label>
            <input name="description" id="description" type="text">

            <label for="image"> Afbeelding </label>
            <select name="image" id="image">
                @foreach ($items as $item)
                    <option value="{{$item->image}}">{{$item->image}}</option>
                @endforeach
            </select>

            <label for="leentijd"> Leentijd in dagen </label>
            <input name="leentijd" id="leentijd" type="text">

            <button type="submit">Film aanmaken</button>
    </main>
    @include('components.footer')
</body>
</html>
