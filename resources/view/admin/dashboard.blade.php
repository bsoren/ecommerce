@extends('admin.layouts.base')

@section('title','Dasbboard')

@section('content')

    <div class="dasboard">

        <div class="row expanded">

                <h2>Dashboard</h2>

            <p> {!! \App\classes\CSRFToken::_token() !!}</p>
            <p> {!! \App\classes\Session::get('token') !!}</p>

            <p> {!! \App\classes\CSRFToken::verifyCSRFToken(\App\classes\Session::get('token')) !!}</p>


            <form action="/admin" method="post" enctype="multipart/form-data">
                <input name="product" value="testing">
                <input type="file" name="image">
                <input type="submit" value="Go" name="submit">
            </form>

        </div>
    </div>

@endsection