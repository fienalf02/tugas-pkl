<div class="account-wrap">
    @if (Auth::guest())
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('register') }}">Register</a></li>
    @else
    <div class="account-item clearfix js-item-menu">
        <div class="content">
            <i class="fas fa-user fa-lg fa-2.5x"></i> 
            <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
        </div>
        <div class="account-dropdown js-dropdown">
            <div class="info clearfix">
                <div class="image">
                    <i class="fas fa-user-circle fa-4x"></i>
                </div>
                <div class="content">
                    <h5 class="name">
                        <a href="#">{{ Auth::user()->name }}</a>
                    </h5>
                    <span class="username">{{ Auth::user()->username }}</span>
                </div>
            </div>
            <div class="account-dropdown__item">
                    <a href="{{ route('user.editsiswa')}}">
                        <i class="zmdi zmdi-settings"></i>Setting</a>
                </div>
            <div class="account-dropdown__footer">
                <div class="account-dropdown__item">
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="zmdi zmdi-power"></i>Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            </form>
                 </div>
            </div>
        </div>
    </div>
</div>
@endif