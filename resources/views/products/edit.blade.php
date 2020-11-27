@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <div class="sidebar">
                            <ul class="navbar-nav">
                               {{-- <li class="nav-item">
                                    <a  class="nav-link" href="">Product</a>
                                </li>--}}
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Product Manage
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('products.index') }}">Products</a>
                                        <a class="dropdown-item" href="{{ route('products.create') }}">Add Product</a>
                                    </div>
                                </li>
                            </ul>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Product Edit</div>

                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image">Price</label>
                                <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <button class="form-control btn btn-success">Save Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
