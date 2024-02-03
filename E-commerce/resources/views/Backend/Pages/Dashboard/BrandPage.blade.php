@extends('Backend.Layouts.App')

@section('content')
    <section class="container">
        <h2 class="title">Brands</h2>
        @include('Backend.Components.Brands.BrandList')
        @include('Backend.Components.Brands.BrandCreate')
        @include('Backend.Components.Brands.BrandDelete')
        @include('Backend.Components.Brands.BrandEdit')
    </section>
@endsection