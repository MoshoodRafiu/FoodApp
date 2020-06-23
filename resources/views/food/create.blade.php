@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">Create Food</div>

                    <div class="card-body">
                        <form action="{{route('food.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="from-group">
                                <label for="name">Name</label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="form-control
                                    @error('name')
                                        is-invalid
                                    @enderror
                                        ">
                            </div>
                            @error('name')
                            <span><strong class="text-danger">{{$message}}</strong></span>
                            @enderror
                            <div class="from-group">
                                <label for="description">Description</label>
                                <textarea
                                    type="text"
                                    id="description"
                                    name="description"
                                    class="form-control
                                    @error('description')
                                        is-invalid
                                    @enderror
                                        ">{{ old('description') }}</textarea>
                            </div>
                            @error('description')
                            <span><strong class="text-danger">{{$message}}</strong></span>
                            @enderror
                            <div class="from-group">
                                <label for="price">Price(NGN)</label>
                                <input
                                    type="number"
                                    id="price"
                                    name="price"
                                    value="{{ old('price') }}"
                                    class="form-control
                                    @error('price')
                                        is-invalid
                                    @enderror
                                        ">
                            </div>
                            @error('price')
                            <span><strong class="text-danger">{{$message}}</strong></span>
                            @enderror
                            <div class="from-group">
                                <label for="category">Category</label>
                                <select
                                    type="text"
                                    id="category"
                                    name="category"
                                    value="{{ old('category') }}"
                                    class="form-control
                                    @error('category')
                                        is-invalid
                                    @enderror
                                        ">
                                    <option value="">---Select Category---</option>
                                    @foreach(App\Category::all() as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category')
                            <span><strong class="text-danger">{{$message}}</strong></span>
                            @enderror
                            <div class="from-group">
                                <label for="image">Image</label>
                                <input
                                    type="file"
                                    id="image"
                                    name="image"
                                    class="form-control
                                    @error('image')
                                        is-invalid
                                    @enderror
                                        ">
                            </div>
                            @error('image')
                            <span><strong class="text-danger">{{$message}}</strong></span>
                            @enderror
                            <div class="from-group my-3">
                                <button
                                    type="submit"
                                    class="btn btn-outline-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
