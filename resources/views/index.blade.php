@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($categories as $category)
        <div class="col-md-12">
            <h2 class="text-primary">{{$category->name}}</h2>
            <div class="jumbotron">
                <div class="row">
                    @foreach(App\Food::where('category_id',$category->id)->get() as $food)
                    <div class="col-md-3 my-3">
                        <img src="{{asset('images')}}/{{$food->image}}" alt="food" width="100%">
                        <p class="text-center my-2">{{$food->name}}
                            <span>NGN{{number_format($food->price)}}</span>
                        </p>
                        <p class="text-center"><a class="btn btn-outline-danger" href="{{route('food.view', $food->id)}}">View
                            </a></p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
