      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{ asset('back') }}/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
          <li class="active"><a href="{{Route('manage.dashboard')}}"> <i class="icon-home"></i>Home </a></li>
          <li><a href="#userManage" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>User Management </a>
            <ul id="userManage" class="collapse list-unstyled ">
              <li><a href="{{route('users.index')}}">User List</a></li>
              <li><a href="{{route('roles.index')}}">Role</a></li>
              <li><a href="{{route('permissions.index')}}">Permission</a></li>
            </ul>
          </li>
          <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Bulk SMS</a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
            <li class="{{ Request::is('masterNumbers*') ? 'active' : '' }}">
                <a href="{{ route('masterNumbers.index') }}"><i class="fa fa-edit"></i><span>Master Numbers</span></a>
            </li>
            </ul>
          </li>
        </ul><span class="heading">Settings</span>
        <ul class="list-unstyled">
        <li><a href="#setting" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Bot Settings</a>
            <ul id="setting" class="collapse list-unstyled ">
              <li class="{{ Request::is('statuses*') ? 'active' : '' }}">
                  <a href="{{ route('statuses.index') }}"><i class="fa fa-edit"></i><span>Statuses</span></a>
              </li>
              <li class="{{ Request::is('chatBotIntervals*') ? 'active' : '' }}">
                  <a href="{{ route('chatBotIntervals.index') }}"><i class="fa fa-edit"></i><span>Chat Bot Intervals</span></a>
              </li>
              <li class="{{ Request::is('conversionPics*') ? 'active' : '' }}">
                  <a href="{{ route('conversionPics.index') }}"><i class="fa fa-edit"></i><span>Conversion Pics</span></a>
              </li>

              <li class="{{ Request::is('conversionLinks*') ? 'active' : '' }}">
                  <a href="{{ route('conversionLinks.index') }}"><i class="fa fa-edit"></i><span>Conversion Links</span></a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->