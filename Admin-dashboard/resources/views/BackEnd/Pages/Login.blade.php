@extends('BackEnd.Layouts.Links')

<!--=== Loader ===-->
<div id="loader" class="LoadingOverlay d-none">
    <div class="Line-Progress">
        <div class="indeterminate"></div>
    </div>
</div>

<!--=== Login form ===-->
<div class="card w-50 m-auto mt-5 pt-3 px-5">
    <h3 class="m-auto mt-2 mb-4 text-danger">Login</h3>
    <div class="mb-4">
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter email">
    </div>
    <div class="mb-4">
        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="password">
    </div>
    <div class="mb-4 m-auto">
        <button type="submit" class="btn bg-success text-light" id="login">Login</button>
    </div>
    <div class="mb-4 m-auto">
        <p>Don't have an account? <a href="{{route('regester.view')}}">Create account</a></p>
    </div>
</div>