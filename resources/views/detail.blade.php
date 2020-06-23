@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Product</div>
                    <div class="card-body">
                        <img src="{{asset('images')}}/{{$food->image}}" class="img img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Details</div>
                    <div class="card-body">
                        <p><span class="font-weight-bold">Name: </span>{{$food->name}}</p>
                        <p><span class="font-weight-bold">Description: </span>{{$food->description}}</p>
                        <p><span class="font-weight-bold">Category: </span>{{$food->category->name}}</p>
                        <p><span class="font-weight-bold">Price: </span>NGN{{number_format($food->price)}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
