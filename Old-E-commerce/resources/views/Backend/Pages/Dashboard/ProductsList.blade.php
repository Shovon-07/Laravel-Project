@extends('Backend.Layouts.App')

@section('content')
    <section class="container">
        <h2 class="title">Products</h2>
        @include('Backend.Components.Products.ProductsCreate')
        @include('Backend.Components.Products.ProductsTable')
        @include('Backend.Components.Products.ProductsDelete')
        @include('Backend.Components.Products.ProductsEdit')
    </section>
@endsection