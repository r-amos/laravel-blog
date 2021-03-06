<nav class="main-navigation">
    <ul class="navigation navigation__container container">
        <li class="navigation navigation__item nav-link"><a href="/ramblings">Ramblings.</a></li>
        <li class="navigation navigation__item nav-link"><a href="/about">About</a></li>
        @if(Auth::user() !== null)
            <li class="navigation navigation__item nav-link navigation__item nav-link"><a href="/tags">Tags</a></li>
            <li class="navigation navigation__item nav-link navigation__item navigation__item--logout"><a href="/logout">Log Out</a></li>
        @endif
        <!--<li class="navigation navigation__item nav-link"><a href="/contact">Contact</a></li>-->
    </ul>
    <div type="checkbox" class="">
        <input class="navigation__hamburger-checkbox" id="hamburger" name="hamburger" type="checkbox" />
        <label class="navigation__hamburger-label" for="hamburger">
            <div class="navigation__hamburger-container">
                <div span class="navigation__hamburger-icon-container">
                    <span class="navigation__hamburger-icon"></span>
                    <span class="navigation__hamburger-icon"></span>
                    <span class="navigation__hamburger-icon"></span>
                </div>
                <span class="navigation__hamburger-title"></span>
            </div>
        </label>
        <div class="navigation__hamburger-menu">
            <ul>
                <li><a href="/ramblings">Ramblings.</a></li>
                <li><a href="/about">About</a></li>
                @if(Auth::user() !== null)
                    <li><a href="/tags">Tags</a></li>
                    <li><a href="/logout">Log Out</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>