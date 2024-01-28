@extends('Backend.Layouts.App')

@section('content')
    <section class="container">
        @include('Backend.Components.CreateCategories')
        @include('Backend.Components.CategoriesTable')
        @include('Backend.Components.CategoryDelete')
        @include('Backend.Components.CategoryEdit')
    </section>
@endsection