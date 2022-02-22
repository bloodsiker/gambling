<ul class="nav nav-pills card-header-pills float-end">
    <li class="nav-item">
        <a class="nav-link small @if (request()->route()->getName() == 'game.index') active @endif" href="{{ route('game.index') }}">Game</a>
    </li>
    <li class="nav-item">
        <a class="nav-link small @if (request()->route()->getName() == 'game.history') active @endif" href="{{ route('game.history') }}">History</a>
    </li>
</ul>
