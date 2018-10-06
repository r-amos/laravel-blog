<nav class="main-navigation">
    <ul class="navigation navigation__container container">
        <li class="navigation navigation__item nav-link"><a href="/">Ramblings.</a></li>
        <li class="navigation navigation__item nav-link"><a href="/about">About</a></li>
        @if(Auth::user() !== null)
            <li class="navigation navigation__item nav-link navigation__item nav-link"><a href="/tags">Tags</a></li>
            <li class="navigation navigation__item nav-link navigation__item navigation__item--logout"><a href="/logout">Log Out</a></li>
        @endif
        <!--<li class="navigation navigation__item nav-link"><a href="/contact">Contact</a></li>-->
    </ul>
</nav>