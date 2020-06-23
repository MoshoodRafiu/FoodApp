@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">Foods
                        <span class="float-right">
                            <a href="{{route('food.create')}}" class="btn btn-primary text-white">Create Food</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tfoot>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tfoot>
                            <tbody>
                                @if(count($foods) > 0)
                                    @foreach($foods as $key=>$food)
                                        <tr>
                                            <td><img src="{{asset('images')}}/{{$food->image}}" width="100px"></td>
                                            <td>{{$food->name}}</td>
                                            <td>{{$food->description}}</td>
                                            <td>NGN {{number_format($food->price)}}</td>
                                            <td>{{$food->category->name}}</td>
                                            <td>
                                                <a href="{{route('food.edit', $food->id)}}">
                                                    <button type="submit" class="btn btn-outline-primary">Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal{{$food->id}}">Delete</button>
                                                <div class="modal fade" id="deleteModal{{$food->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$food->id}}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel{{$food->id}}">Modal title</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete the food <strong>{{$food->name}}</strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form action="{{route('food.destroy', $food->id)}}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td>No food added</td>
                                @endif
                            </tbody>
                        </table>
                        {{$foods->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
