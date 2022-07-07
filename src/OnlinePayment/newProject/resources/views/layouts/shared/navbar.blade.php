<style>
    li:hover, li:active, li:focus{
        background-color: lightgrey;
    }

</style>
<nav class="navbar navbar-expand-lg bg-light">
    @yield('nav')
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="{{asset('images/invoice.png')}}" width="70" height="70"/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavDropdown">
            @if (\Illuminate\Support\Facades\Auth::user())
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @if(auth()->user()->hasRole('admin'))

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('Users')}}">USERS</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('role.index')}}">ROLES</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('audit')}}">AUDIT LOG</a>
                            </li>



                            <li class="nav-item">
                                <a class="nav-link" href="{{route('company.index')}}">COMPANIES</a>
                            </li>

                    @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('invoice.index')}}">INVOICES</a>
                        </li>



                        <li class="nav-item">
                            <a class="nav-link" href="{{route('editProfile', \Illuminate\Support\Facades\Auth::user()->id)}}">PROFILE</a>
                        </li>


            @endif

                    <!-- Authentication Links -->
                    @guest

                    @else

                </ul>
                    <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}

                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>

                                </ul>
                            </li>
                    @endguest
                    </ul>
        </div>
    </div>
</nav>


