<header class="section page-header header-absolute">
    <p> локаль: {{ app()->getLocale() }}</p>





    <!--RD Navbar-->
    <div class="rd-navbar-wrap">

        <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-aside-outer rd-navbar-collapse">
                <!--RD Navbar Brand-->
                <div class="rd-navbar-aside">
                    <div class="rd-navbar-brand">
                        <!--Brand--><a class="brand" href="index.html"><img class="brand-logo-dark" src="{{ asset('images/logo-default-154x53.png') }}"  alt="" width="77" height="26"/><img class="brand-logo-light" src=" {{ asset('images/logo-inverse-154x53.png') }}" alt="" width="77" height="26"/></a>
                        <a class="brand" href="{{ route('lang', ['locale' => 'en']) }}">English</a>
                        <a class="brand" href="{{ route('lang', ['locale' => 'uk']) }}">Ukrainian</a>
                    </div>
                    <div class="contacts-wrap">
                        <address class="contact-info reveal-sm-inline-block text-start offset-none">
                            <div class="p unit unit-spacing-xs unit-horizontal">
                                <div class="unit-left"><span class="icon icon-xs icon-circle icon-white-17 mdi mdi-phone"></span></div>
                                <div class="unit-body"><a class="text-white" href="tel:#">1-800-1234-567</a><br><a class="text-white" href="tel:#">1-800-3214-654</a></div>
                            </div>
                        </address>
                        <address class="contact-info reveal-sm-inline-block text-start">
                            <div class="p unit unit-horizontal unit-spacing-xs">
                                <div class="unit-left"><span class="icon icon-xs icon-circle icon-white-17 mdi mdi-map-marker"></span></div>
                                <div class="unit-body"><a class="text-white" href="#">2130 Fulton Street San Diego<br>CA 94117-1080 USA</a></div>
                            </div>
                        </address>
                    </div>
                </div>
            </div>
            <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                    <!--RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                        <!--RD Navbar Toggle-->
                        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        <!--RD Navbar Brand-->
                        <div class="rd-navbar-brand">
                            <!--Brand--><a class="brand" href="index.html"><img class="brand-logo-dark" src=" {{ asset('images/logo-default-154x53.png') }}" alt="" width="77" height="26"/><img class="brand-logo-light" src=" {{ asset('images/logo-inverse-154x53.png') }}" alt="" width="77" height="26"/></a>
                        </div>
                    </div>
                    <div class="rd-navbar-main-element">
                        <div class="rd-navbar-nav-wrap">
                            <ul class="rd-navbar-nav">
                                <li class="rd-nav-item active"><a class="rd-nav-link"href="{{ route('main.index') }}">@lang('messages.Home')</a>
                                </li>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('main.about') }}"> @lang('messages.About')</a>
                                </li>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('main.team') }}">@lang('messages.Team')</a></li>

                                <li class="rd-nav-item"><a class="rd-nav-link">@lang('messages.Pages')</a>
                                    <ul class="rd-menu rd-navbar-megamenu">
                                        <li class="rd-megamenu-item">
                                            <h6 class="rd-megamenu-title">@lang('messages.Elements')</h6>
                                            <ul class="rd-megamenu-list">
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="typography.html">@lang('messages.Typography')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="forms.html">@lang('messages.Forms')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="buttons.html">@lang('messages.Buttons')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="grid-system.html">@lang('messages.Grid')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="tabs-and-accordions.html">@lang('messages.Tabs and Accordions')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="progress-bars.html">@lang('messages.Progress bars')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="icons.html">@lang('messages.Icons')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="tables.html">@lang('messages.Tables')</a></li>
                                            </ul>
                                        </li>
                                        <li class="rd-megamenu-item">
                                            <h6 class="rd-megamenu-title">@lang('messages.Pages 1')</h6>
                                            <ul class="rd-megamenu-list">
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="team-member.html">@lang('messages.Team Member Profile')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="careers.html">@lang('messages.Careers')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="faq.html">@lang('messages.FAQ Page')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="pricing.html">@lang('messages.Pricing')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="coming-soon.html">@lang('messages.Coming Soon')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="maintenance.html">@lang('messages.Maintenance')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="under-construction.html">@lang('messages.Under Construction')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="login.html">@lang('messages.Login/Register')</a></li>
                                            </ul>
                                        </li>
                                        <li class="rd-megamenu-item">
                                            <h6 class="rd-megamenu-title">@lang('messages.Pages 2')</h6>
                                            <ul class="rd-megamenu-list">
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="clients.html">@lang('messages.Clients')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="partners.html">@lang('messages.Partners')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="privacy-policy.html">@lang('messages.Privacy Policy')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="search-results.html">@lang('messages.Search Results')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="404.html">@lang('messages.404 Page')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="503.html">@lang('messages.503 Page')</a></li>
                                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="make-an-appointment.html">@lang('messages.Make an Appointment')</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('main.services') }}">@lang('messages.Services')</a>
                                </li>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('main.departments') }}">@lang('messages.Departments')</a>
                                </li>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('main.timetable') }}">@lang('messages.Timetable')</a>
                                </li>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="#">@lang('messages.Gallery')</a>
                                    <ul class="rd-menu rd-navbar-dropdown">
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="grid-gallery.html">@lang('messages.Grid Gallery')</a>
                                        </li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="grid-gallery-no-padding.html">@lang('messages.Gallery Without Padding')</a>
                                        </li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="masonry-gallery.html">@lang('messages.Masonry Gallery')</a>
                                        </li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="cobbles-gallery.html">@lang('messages.Cobbles Grid')</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="blog-masonry.html">@lang('messages.Blog')</a>
                                    <ul class="rd-menu rd-navbar-dropdown">
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="blog-masonry.html">@lang('messages.Blog Masonry')</a>
                                        </li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="blog-modern.html">@lang('messages.Blog Modern')</a>
                                        </li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="blog-classic.html">@lang('messages.Blog Classic')</a>
                                        </li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="blog-grid.html">@lang('messages.Blog Grid')</a>
                                        </li>
                                        <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="single-post.html">@lang('messages.Single Post')</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="rd-nav-item"><a class="rd-nav-link"  href="{{ route('main.contacts') }}">@lang('messages.Contacts')</a>
                                </li>
                            </ul>
                        </div>
                        <!--RD Navbar Search-->
                        <div class="rd-navbar-search">
                            <button class="rd-navbar-search-toggle rd-navbar-fixed-element-2" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                            <form class="rd-search" action="search-results.html" data-search-live="rd-search-results-live" method="GET">
                                <div class="form-wrap">
                                    <label class="form-label" for="rd-navbar-search-form-input">@lang('messages.Type and hit enter...')</label>
                                    <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off">
                                    <div class="rd-search-results-live" id="rd-search-results-live"></div>
                                </div>
                                <button class="rd-search-form-submit fa-search" type="submit"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
