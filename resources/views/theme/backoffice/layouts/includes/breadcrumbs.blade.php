<div id="breadcrumbs-wrapper">
    <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore">
    </div>
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title">@yield('title')</h5>
                <ol class="breadcrumbs">
                    <li> <a href="#">Panel de Administración</a></li>
                    @yield('breadcrumbs')
                </ol>
            </div>

            <div class="col s2 m6 l6">
                <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!"
                    data-activates="dropdown1">
                    <i class="material-icons hide-on-med-and-up">Settings</i>
                    <span class="hide-on-small-on1">Acciones</span>
                    <i class="material-icons right">arrow_drop_down</i>
                </a>
                <ul id="dropdown1" class="dropdown-content"
                    style="white-space: nowrap; opacity:1; left: 1735.67px; position: absolute; top:130px; display:none;">
                    @yield('dropdown_settings')
                </ul>
            </div>
        </div>
    </div>
</div>