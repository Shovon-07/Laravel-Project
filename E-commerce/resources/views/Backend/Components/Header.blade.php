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
            <span id="imgParent">
              {{-- <img id="userImg"> --}}
            </span>
            <span id="userName">User</span>
          </div>
          <ul class="dropdown display">
            <li class="d-flex"><a href="{{route('profile.view')}}"><i class="fa-regular fa-user leftIcon"></i> Profile</a></li>
            <li class="d-flex"><a href="{{route('logout')}}" class="logout"><i class="fa-solid fa-right-from-bracket leftIcon"></i> Log out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  window.addEventListener('load', () => {
    getData();
  });

  async function getData() {
    const response = await axios.get("/admin/profile-data");

    if(response.data['status'] === 1) {
      const data = response.data['data'];
    
      // Show profile pic
      let imgPath = "{{asset('Uploaded_file')}}" + `/${data['Img']}`;
      let img = $('<img id="userImg">');
      img.attr('src', imgPath);
      img.appendTo('#imgParent');

      // Show user name
      $("#userName").html(`<span>${data['Name']}</span>`); 

    } else {
      response.data['message'];
    }   
  }
</script>