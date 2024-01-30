@extends('Backend.Layouts.App')

@section('content')
    <section class="container">
        <h2 class="title">Brands</h2>
        @include('Backend.Components.Brands.BrandsCreate')
        @include('Backend.Components.Brands.BrandsTable')
        @include('Backend.Components.Brands.BrandsDelete')
        @include('Backend.Components.Brands.BrandsEdit')
    </section>
@endsection