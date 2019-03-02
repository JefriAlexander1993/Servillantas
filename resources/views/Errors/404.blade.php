@extends('errors::layout')
@section('title',404)
@section('message')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1 style="font-size:400px ">
                    404 </h1>
                <div class="error-details">
                    Pagina no encontrada.!
                </div>
                <div class="error-actions">
                    <a href="{{url('/home')}}" class="btn btn-primary  btn-lg">Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
@endsection
