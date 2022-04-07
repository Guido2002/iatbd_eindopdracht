@if (auth()->user()->role == "admin")
<header class="header">
    <div class="container">
        <h1><a class="h1" href="/items">⌛</a></h1>
        <h1><a class="h1" href="/create">💡</a></h1>
        <h1><a class="h1" href="/mijnprofiel">🧔</a></h1>
        <h1><a class="h1" href="/delete">❌</a></h1>
        <h1><a class="h1" href="/block">💀</a></h1>
        <h1><a class="h1" href="/logout">😴</a></h1>
    </div>
</header>
@else
<header class="header">
    <h1><a class="h1" href="/items">⌛</a></h1>
    <h1><a class="h1" href="/create"></a>💡</h1>
    <h1><a class="h1" href="/mijnprofiel">🧔</a></h1>
    <h1><a class="h1" href="/delete">❌</a></h1>
    <h1><a class="h1" href="/logout">😴</a></h1>
    </div>
</header>
@endif
