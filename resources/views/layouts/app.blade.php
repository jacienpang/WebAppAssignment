<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name','UTAR Mega Mall') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ "http://localhost:8000/directory" }}">
                    {{ config('app.name', 'Mall Directory | UTAR Mega Mall') }}
                </a>
            </div>

            <!-- Left Side Of Navbar -->
                  <ul class="nav navbar-nav navbar-left">
                    @guest
                    @else
                    <!-- Tenant Side -->
                    <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ 'Tenant' }} <span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu">
                        <li>
                        <a class="dropdown-item" href="{{ route('tenant.index') }}" onclick="event.preventDefault(); document.getElementById('tenant-form').submit();">
                          Tenant List
                        </a>

                        <form id="tenant-form" action="{{ route('tenant.index') }}">
                          {{ csrf_field() }}
                        </form>
                      </li>
                      <li>
                        <a class="dropdown-item" href="{{ route('tenant.create') }}" onclick="event.preventDefault(); document.getElementById('create-form').submit();">
                          Add Tenant
                        </a>

                        <form id="create-form" action="{{ route('tenant.create') }}">
                          {{ csrf_field() }}
                        </form>
                      </li>
                    </ul>
                    </li>
                    <!-- Floor Side -->
                    <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ 'Floor' }} <span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu">
                        <li>
                        <a class="dropdown-item" href="{{ route('floor.index') }}" onclick="event.preventDefault(); document.getElementById('floorlist-form').submit();">
                          Floor List
                        </a>

                        <form id="floorlist-form" action="{{ route('floor.index') }}">
                          {{ csrf_field() }}
                        </form>
                      </li>
                      <li>
                        <a class="dropdown-item" href="{{ route('floor.create') }}" onclick="event.preventDefault(); document.getElementById('addfloor-form').submit();">
                          Add Floor
                        </a>

                        <form id="addfloor-form" action="{{ route('floor.create') }}">
                          {{ csrf_field() }}
                        </form>
                      </li>
                    </ul>
                    </li>

                    <!-- Category Side -->
                    <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ 'Category' }} <span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu">
                        <li>
                        <a class="dropdown-item" href="{{ route('category.index') }}" onclick="event.preventDefault(); document.getElementById('categorylist-form').submit();">
                          Category List
                        </a>

                        <form id="categorylist-form" action="{{ route('category.index') }}">
                          {{ csrf_field() }}
                        </form>
                      </li>
                      <li>
                        <a class="dropdown-item" href="{{ route('category.create') }}" onclick="event.preventDefault(); document.getElementById('addcategory-form').submit();">
                          Add Category
                        </a>

                        <form id="addcategory-form" action="{{ route('category.create') }}">
                          {{ csrf_field() }}
                        </form>
                      </li>
                    </ul>
                    </li>

                    <!-- Zone Side -->
                    <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ 'Zone' }} <span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu">
                        <li>
                        <a class="dropdown-item" href="{{ route('zone.index') }}" onclick="event.preventDefault(); document.getElementById('zonelist-form').submit();">
                          Zone List
                        </a>

                        <form id="zonelist-form" action="{{ route('zone.index') }}">
                          {{ csrf_field() }}
                        </form>
                      </li>
                      <li>
                        <a class="dropdown-item" href="{{ route('zone.create') }}" onclick="event.preventDefault(); document.getElementById('addzone-form').submit();">
                          Add Zone
                        </a>

                        <form id="addzone-form" action="{{ route('zone.create') }}">
                          {{ csrf_field() }}
                        </form>
                      </li>
                    </ul>
                    </li>
                    @endguest
                  </ul>
            <div>
                <ul class="nav navbar-nav justify-content-end">
                    @if (Auth::guest())

                    @else
                        <li>
                            <div class="dropdown show">
                                <a href="#" class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </div>
</nav>


@yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
