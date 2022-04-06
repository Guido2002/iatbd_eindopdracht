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
    <a href="/mijnprofiel">{{auth()->user()->name}}</a>
    <main>
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
    <script>
        filterSelection("all");
        function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        if (c == "all") c = "";

        for (i = 0; i < x.length; i++) {
            removeClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) addClass(x[i], "show");
        }
        }

        function addClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
            element.className += " " + arr2[i];
            }
        }
    }
        function removeClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
        }

        var btnContainer = document.getElementById("myBtn");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
        }
</script>
    @endif
    @include('components.footer')
</body>
</html>
