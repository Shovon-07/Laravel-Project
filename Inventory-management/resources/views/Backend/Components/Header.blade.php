<div>
        <div class="header">
          <div class="container">
          <div class="searchBox">
            <i class="fa-solid fa-search"></i>
            <input type="text" placeholder="Search">
          </div>
          <div class="headerRight">
            <div>
              <i class="fa-solid fa-message"></i>
            </div>
            <div>
              <i class="fa-solid fa-bell"></i>
            </div>
            <div id="dropParent" class="profileBox">
              <div class="profile">
                <img src="{{asset('assets/images/web-page.jpg')}}" alt="">
                <span>Shovon</span>
              </div>
              <ul class="dropdown display">
                <li class="d-flex"><i class="fa-solid fa-gear leftIcon"></i><a href="">Settings</a></li>
                <li class="d-flex"><i class="fa-solid fa-right-from-bracket leftIcon"></i><a href="{{route('log.out')}}">Log out</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
</div>