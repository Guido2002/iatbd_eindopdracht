@if (auth()->user()->blocked == 1)
        <p>U bent geblokkeerd door de beheerder</p>
        <a href="/logout">Terug naar loginpagina</a>
    @elseif (auth()->user()->role == "admin")
    <li class="funct_list">
        <a class="funct" href="/logout">Uitloggen</a>
        <a class="funct" href="/block">Blokkeren</a>
        <a class="funct" href="/delete">Product verwijderen</a>
        <a class="funct" href="/create">Nieuw product</a>
    </li>
    @elseif (auth()->user()->role != "admin")
    <li class="funct_list">
        <a class="funct" href="/logout">Uitloggen</a>
        <a class="funct" href="/delete">Product verwijderen</a>
        <a class="funct" href="/create">Nieuw product</a>
    </li>
    @endif
