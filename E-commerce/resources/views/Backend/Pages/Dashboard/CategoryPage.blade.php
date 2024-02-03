@extends('Backend.Layouts.App')

@section('content')
    <section class="container">
        <h2 class="title">Categories</h2>
        @include('Backend.Components.Category.CategoryList')
        @include('Backend.Components.Category.CategoryCreate')
        @include('Backend.Components.Category.CategoryDelete')
        @include('Backend.Components.Category.CategoryEdit')
    </section>
@endsection