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
                <img src="{{asset('Uploaded_file/Img/user.png')}}" id="userImg" alt="profile pic">
                <span id="userName"></span>
              </div>
              <ul class="dropdown display">
                <li class="d-flex"><a href="{{route('profile.view')}}"><i class="fa-regular fa-user leftIcon"></i> Profile</a></li>
                <li class="d-flex"><a href="{{route('log.out')}}"><i class="fa-solid fa-right-from-bracket leftIcon"></i> Log out</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
</div>

<script>
  window.addEventListener('load', () => {
    getData();
  });

  async function getData() {
    showLoader();
    const response = await axios.get("/admin/profile-data");
    hideLoader();

    if(response.data['status'] === 'success') {
      let userData = response.data['data'];
      document.querySelector("#userName").innerHTML = userData['lastName'];
      
      const img = userData['Img'];
      let imgPath = "{{asset('Uploaded_file/Img')}}" + `/${img}`;
      document.querySelector("#userImg").src = imgPath;

    } else {
      response.data['message'];
    }
  }
</script>