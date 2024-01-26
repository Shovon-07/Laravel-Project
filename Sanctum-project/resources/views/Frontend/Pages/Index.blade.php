@extends('Frontend.Layouts.App')
@section('content')
    {{-- <!-=== Main Content start ===--> --}}
    <section class="main">
        {{-- <!-=== Top bar start ===--> --}}
        <section class="topbar">
            <div class="hamberger">
                <!-- <div class="bar"></div> -->
                <i class="fa-solid fa-bars"></i>
            </div>
            <form class="search-box">
                <div>
                    <input type="text" name="search" placeholder="Search products">
                    <select class="form-select">
                        <option>All Category</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                    <a href=""><i class="fa-solid fa-search"></i></a>
                </div>
            </form>
            <div class="top-right">
                <a href="">
                    <i class="fa-solid fa-retweet icon"></i>
                </a>
                <a href="">
                    <i class="fa-regular fa-heart icon"></i>
                </a>
                <a href="">
                    <i class="fa-solid fa-bag-shopping icon"></i>
                </a>
                <a href="">
                    <i class="fa-solid fa-user icon"></i>
                </a>
            </div>
        </section>
        {{-- <!-=== Top bar end ===--> --}}

        {{-- <!-=== Section 1 start ===--> --}}
        <section class="section-1">
            <div class="section-top">
                <div>
                    <li>
                        <a href="" class="active">All Pages <i class="fa-solid fa-chevron-right right-icon"></i>
                            {{-- <ul class="select-list">
                                <li><a href="">Page 1</a></li>
                                <li><a href="">Page 2</a></li>
                                <li><a href="">Page 3</a></li>
                            </ul> --}}
                        </a>
                    </li>
                    <li><a href="">Featured Brands</a></li>
                    <li><a href="">Trending Styles</a></li>
                    <li><a href="">Gift Cards</a></li>
                </div>
                <div>
                   <a href="">Free shipping on order now</a> 
                </div>
            </div>

            <div class="section-bottom">
                <div class="owl-carousel owl-theme carousel-1">
                    <a href="">
                        <div class="item">
                            <img src="{{asset('assets/frontend')}}/images/banner_1.jpg">
                        </div>
                    </a>
                    <a href="">
                        <div class="item">
                            <img src="{{asset('assets/frontend')}}/images/banner_2.jpg">
                        </div>
                    </a>
                    <a href="">
                        <div class="item">
                            <img src="{{asset('assets/frontend')}}/images/banner_3.jpg">
                        </div>
                    </a>
                    <a href="">
                        <div class="item">
                            <img src="{{asset('assets/frontend')}}/images/banner_4.jpg">
                        </div>
                    </a>
                    <a href="">
                        <div class="item">
                            <img src="{{asset('assets/frontend')}}/images/banner_5.jpg">
                        </div>
                    </a>
                </div>
            </div>
        </section>
        {{-- <!-=== Section 1 end ===--> --}}

        {{-- <!-=== Section 2 start ===--> --}}
        <section class="section section-2">
            <div class="title"><a>Product Add Center</a></div>
            <div class="owl-carousel owl-theme carousel-2">
                <div class="item">
                    <div class="card card-hover">
                        <div class="d-flex align-items-center flex-column flex-sm-row">
                            <img src="{{asset('assets/frontend')}}/images/laptop.png">
                            <div>
                                <p>Catch Big <b class="bolded">Deals</b> On The Cameras</p>
                                <a href="" class="bolded">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card card-hover">
                        <div class="d-flex align-items-center flex-column flex-sm-row">
                            <img src="{{asset('assets/frontend')}}/images/laptop.png">
                            <div>
                                <p>Catch Big <b class="bolded">Deals</b> On The Cameras</p>
                                <a href="" class="bolded">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card card-hover">
                        <div class="d-flex align-items-center flex-column flex-sm-row">
                            <img src="{{asset('assets/frontend')}}/images/laptop.png">
                            <div>
                                <p>Catch Big <b class="bolded">Deals</b> On The Cameras</p>
                                <a href="" class="bolded">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <!-=== Section 2 end ===--> --}}

        {{-- <!-=== Section 3 start ===--> --}}
        <section class="section section-3">
            <div class="title"><a>Featured</a></div>
            <div class="row parent">
                <div class="col-12 col-md-4 left mb-5">
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="" class="py-4 px-3 text-center">
                            <p class="fs-4 mb-5 text-start">Special Offer</p>
                            <img src="{{asset('assets/frontend')}}/images/laptop.png" class="img-fluid" style="width:300px;height:auto;">
                            <p class="product-title bolded my-4 blue">i5 12th generation, 8 gb ram, 1tb HDD, 128gb SSD</p>
                            <p class="text-center fs-3 my-4">$100.00</p>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-8 right">
                    <ul class="d-flex align-items-center justify-content-center mb-3 navigation">
                        <li><a class="mx-3 active">Featured</a></li>
                        <li><a class="mx-3">On Sale</a></li>
                        <li><a class="mx-3">Top Rated</a></li>
                    </ul>
                    <div class="box">
                        <div class="owl-carousel owl-theme carousel-3">
                            <div class="item">
                                <a href="">
                                    <div class="card m-2 p-4 card-hover">
                                        <p class="store-name aqua-deep">Shovon Enterprise</p>
                                        <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                        <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                        <p class="price fs-4">$200.00</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <div class="card m-2 p-4 card-hover">
                                        <p class="store-name aqua-deep">Shovon Enterprise</p>
                                        <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                        <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                        <p class="price fs-4">$200.00</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <div class="card m-2 p-4 card-hover">
                                        <p class="store-name aqua-deep">Shovon Enterprise</p>
                                        <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                        <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                        <p class="price fs-4">$200.00</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="owl-carousel owl-theme carousel-3 mb-3">
                            <div class="item">
                                <a href="">
                                    <div class="card m-2 p-4 card-hover">
                                        <p class="store-name aqua-deep">Shovon Enterprise</p>
                                        <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                        <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                        <p class="price fs-4">$200.00</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <div class="card m-2 p-4 card-hover">
                                        <p class="store-name aqua-deep">Shovon Enterprise</p>
                                        <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                        <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                        <p class="price fs-4">$200.00</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="">
                                    <div class="card m-2 p-4 card-hover">
                                        <p class="store-name aqua-deep">Shovon Enterprise</p>
                                        <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                        <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                        <p class="price fs-4">$200.00</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <!-=== Section 3 end ===--> --}}

        {{-- <!-=== Section 4 start ===--> --}}
        <section class="section section-4">
            <div class="title"><a>Best Deals</a></div>
            <ul class="d-flex align-items-center justify-content-center mb-3 navigation">
                <li><a class="mx-3 active">Best Deals</a></li>
                <li><a class="mx-3">Tv & Audio</a></li>
                <li><a class="mx-3">Cameras</a></li>
                <li><a class="mx-3">Audio</a></li>
                <li><a class="mx-3">Smartphones</a></li>
                <li><a class="mx-3">Accesoriess</a></li>
            </ul>
            <div class="box">
                <div class="owl-carousel owl-theme carousel-4">
                    <div class="item">
                        <a href="">
                            <div class="card m-2 p-4 card-hover">
                                <p class="store-name aqua-deep">Shovon Enterprise</p>
                                <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                <p class="price fs-4">$200.00</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <div class="card m-2 p-4 card-hover">
                                <p class="store-name aqua-deep">Shovon Enterprise</p>
                                <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                <p class="price fs-4">$200.00</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <div class="card m-2 p-4 card-hover">
                                <p class="store-name aqua-deep">Shovon Enterprise</p>
                                <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                <p class="price fs-4">$200.00</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="owl-carousel owl-theme carousel-4 mb-3">
                    <div class="item">
                        <a href="">
                            <div class="card m-2 p-4 card-hover">
                                <p class="store-name aqua-deep">Shovon Enterprise</p>
                                <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                <p class="price fs-4">$200.00</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <div class="card m-2 p-4 card-hover">
                                <p class="store-name aqua-deep">Shovon Enterprise</p>
                                <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                <p class="price fs-4">$200.00</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <div class="card m-2 p-4 card-hover">
                                <p class="store-name aqua-deep">Shovon Enterprise</p>
                                <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                <p class="price fs-4">$200.00</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        {{-- <!-=== Section 4 end ===--> --}}


        {{-- <!-=== Like Section 2 start ===--> --}}
        <section class="section section-2">
            <div class="title"><a>Brands</a></div>
            <div class="owl-carousel owl-theme carousel-2">
                <div class="item">
                    <div class="card d-flex align-items-center justify-content-center" style="background:var(--light-80);">
                        <img src="{{asset('assets/frontend')}}/images/apple.png" style="height:40px !important;">
                    </div>
                </div>
                <div class="item">
                    <div class="card d-flex align-items-center justify-content-center" style="background:var(--light-80);">
                        <img src="{{asset('assets/frontend')}}/images/netflix.png" style="height:40px !important;">
                    </div>
                </div>
                <div class="item">
                    <div class="card d-flex align-items-center justify-content-center" style="background:var(--light-80);">
                        <img src="{{asset('assets/frontend')}}/images/amazon.png" style="height:40px !important;">
                    </div>
                </div>
                <div class="item">
                    <div class="card d-flex align-items-center justify-content-center" style="background:var(--light-80);">
                        <img src="{{asset('assets/frontend')}}/images/bkash.png" style="height:40px !important;">
                    </div>
                </div>
                <div class="item">
                    <div class="card d-flex align-items-center justify-content-center" style="background:var(--light-80);">
                        <img src="{{asset('assets/frontend')}}/images/roket.png" style="height:40px !important;">
                    </div>
                </div>
            </div>
        </section>
        {{-- <!-=== Like Section 2 end ===--> --}}


        {{-- <!-=== Section 5 start ===--> --}}
        <section class="section section-5">
            <div class="title"><a>Best Sellers</a></div>
                <ul class="d-flex align-items-center justify-content-between mb-3">
                    <div class="navigation">
                        <li><a class="active">Best Sellers</a></li>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-3 navigation-right">
                        <li><a class="active">Top 20</a></li>
                        <li><a class="">Tv & Audio</a></li>
                        <li><a class="">Cameras</a></li>
                        <li><a class="">Audio</a></li>
                        <li><a class="">Smartphones</a></li>
                        <li><a class="">Accesoriess</a></li>
                    </div>
                </ul>
            <div class="box">
                <div class="owl-carousel owl-theme carousel-4">
                    <div class="item">
                        <a href="">
                            <div class="card m-2 p-4 card-hover">
                                <p class="store-name aqua-deep">Shovon Enterprise</p>
                                <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                <p class="price fs-4">$200.00</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <div class="card m-2 p-4 card-hover">
                                <p class="store-name aqua-deep">Shovon Enterprise</p>
                                <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                <p class="price fs-4">$200.00</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <div class="card m-2 p-4 card-hover">
                                <p class="store-name aqua-deep">Shovon Enterprise</p>
                                <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                <p class="price fs-4">$200.00</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="owl-carousel owl-theme carousel-3 mb-3">
                    <div class="item">
                        <a href="">
                            <div class="card m-2 p-4 card-hover">
                                <p class="store-name aqua-deep">Shovon Enterprise</p>
                                <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                <p class="price fs-4">$200.00</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <div class="card m-2 p-4 card-hover">
                                <p class="store-name aqua-deep">Shovon Enterprise</p>
                                <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                <p class="price fs-4">$200.00</p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <div class="card m-2 p-4 card-hover">
                                <p class="store-name aqua-deep">Shovon Enterprise</p>
                                <p class="product-title bolded my-4 blue">Perfume, Alcohol>></p>
                                <img src="{{asset('assets/frontend')}}/images/perfume.jpg" class="img-fluid">
                                <p class="price fs-4">$200.00</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        {{-- <!-=== Section 5 end ===--> --}}
    </section>
    {{-- <!-=== Main Content end ===--> --}}

  <!-- <div class="top_scroller">
    <i class="fa-sharp fa-solid fa-arrow-up" id="top_scroller"></i>
  </div> -->
@endsection
