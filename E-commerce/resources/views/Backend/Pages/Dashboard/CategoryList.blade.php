@extends('Backend.Layouts.App')

@section('content')
    <section class="container">
        <h2 class="title">Categories</h2>
        @include('Backend.Components.Categories.CategoryCreate')
        @include('Backend.Components.Categories.CategoriesTable')
        @include('Backend.Components.Categories.CategoryDelete')
        @include('Backend.Components.Categories.CategoryEdit')
    </section>
@endsection