@extends('Backend.Layouts.App')

@section('content')
    <section class="container">
        <h2 class="title">Products</h2>
        @include('Backend.Components.Products.ProductList')
        @include('Backend.Components.Products.ProductCreate')
        @include('Backend.Components.Products.ProductDelete')
        @include('Backend.Components.Products.ProductEdit')
    </section>
@endsection