@if (auth()->user()->role == "admin")
<header class="header">
    nav
    <h1><a class="h1" href="/items">Time2Share</a></h1>
    <h1><a class="h1" href="/mijnprofiel">Mijn Profiel</a></h1>
    <h1><a class="h1" href="/logout">Logout</a></h1>
</header>
@else
<header class="header">
    <h1><a class="h1" href="/items">Time2Share</a></h1>
    <h1><a class="h1" href="/mijnprofiel">Mijn Profiel</a></h1>
    <h1><a class="h1" href="/logout">Logout</a></h1>
</header>
@endif
