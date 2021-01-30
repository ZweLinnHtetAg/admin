<div class="sidebar" data-color="{{ DB::table('settings')->pluck('primary_color')[0] }}" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="" class="simple-text logo-normal">
      {{ __('Admin Panel') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'mail' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('mail') }}">
          <i class="material-icons">mail_outline</i>
            <p>{{ __('Send Mail') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#setting" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/setting.png"></i>
          <p>{{ __('Settings') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' show' : '' }}" id="setting">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                {{-- <span class="sidebar-mini"> UP </span> --}}
                <i class="material-icons">account_circle</i>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <i class="material-icons">admin_panel_settings</i>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'panel-management' ? ' active' : '' }}">
              <a class="nav-link" href="">
                <i class="material-icons">build</i>
                <span class="sidebar-normal"> {{ __('Panel Setting') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'table' || $activePage == 'typography' || $activePage == 'icons' || $activePage == 'map' || $activePage == 'notifications') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#development" aria-expanded="true">
          <i class="material-icons">integration_instructions</i>
          <p>{{ __('Development') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'table' || $activePage == 'typography' || $activePage == 'icons' || $activePage == 'map' || $activePage == "notifications") ? ' show' : '' }}" id="development">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('table') }}">
                <i class="material-icons">content_paste</i>
                  <p>{{ __('Table List') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('typography') }}">
                <i class="material-icons">library_books</i>
                  <p>{{ __('Typography') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('icons') }}">
                <i class="material-icons">bubble_chart</i>
                <p>{{ __('Icons') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('map') }}">
                <i class="material-icons">location_ons</i>
                  <p>{{ __('Maps') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('notifications') }}">
                <i class="material-icons">notifications</i>
                <p>{{ __('Notifications') }}</p>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>
