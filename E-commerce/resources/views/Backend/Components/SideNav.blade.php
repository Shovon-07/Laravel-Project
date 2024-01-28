<div class="sideNav">
    <div class="logo">
        <h4>Admin</h4>
    </div>
    <ul class="menu">
        <p class="task">Inventory</p>
        <li><a href=""><i class="fa-solid fa-house leftIcon"></i> Dashboard</a></li>
        {{-- <li id="dropParent"><a onclick="categoryList()"><i class="fa-brands fa-dribbble leftIcon"></i> Categories <i class="fa-solid fa-chevron-right rightIcon"></i></a>
            <ul class="dropdown display">
                <li><a href="">Computer & accessories</a></li>
                <li><a href="">Men's & fashions</a></li>
                <li><a href="">Woman's & fashions</a></li>
                <li><a href="">Baby dreses & toys</a></li>
            </ul>
        </li> --}}
        <li><a onclick="categoryPage()"><i class="fa-brands fa-dribbble leftIcon"></i> Categories</a></li>
        <li id="dropParent"><a><i class="fa-brands fa-slack leftIcon"></i> Brands <i class="fa-solid fa-chevron-right rightIcon"></i></a>
            <ul class="dropdown display">
                <li><a href="">Computer & accessories</a></li>
                <li><a href="">Men's & fashions</a></li>
                <li><a href="">Woman's & fashions</a></li>
                <li><a href="">Baby dreses & toys</a></li>
            </ul>
        </li>
        <li id="dropParent"><a><i class="fa-solid fa-cart-shopping leftIcon"></i> Products <i class="fa-solid fa-chevron-right rightIcon"></i></a>
            <ul class="dropdown display">
                <li><a href="">Computer & accessories</a></li>
                <li><a href="">Men's & fashions</a></li>
                <li><a href="">Woman's & fashions</a></li>
                <li><a href="">Baby dreses & toys</a></li>
            </ul>
        </li>
        <li><a href=""><i class="fa-solid fa-truck-fast leftIcon"></i> Orders</a></li>
        <li><a href=""><i class="fa-solid fa-users leftIcon"></i> Customers</a></li>
        <li id="dropParent"><a><i class="fa-solid fa-file leftIcon"></i> History <i class="fa-solid fa-chevron-right rightIcon"></i></a>
            <ul class="dropdown display">
                <li><a href="">Computer & accessories</a></li>
                <li><a href="">Men's & fashions</a></li>
                <li><a href="">Woman's & fashions</a></li>
                <li><a href="">Baby dreses & toys</a></li>
            </ul>
        </li>
        <li><a href=""><i class="fa-solid fa-pen leftIcon"></i> Posts</a></li>
    </ul>
    <div class="bottom">
        <a href="" class="button"><i class="fa-solid fa-gear leftIcon"></i> Settings</a>
    </div>
</div>

<script>
    function categoryPage() {
        window.location.href = "/admin/category-view";
    }
</script>