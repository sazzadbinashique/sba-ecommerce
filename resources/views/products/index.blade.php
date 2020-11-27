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
                                    {{--<li class="nav-item">
                                        <a  class="nav-link" href="">Product Manage</a>
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
            <div class="col-md-10 ">
                <div class="card">
                    <div class="card-header">Products</div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <th class="text-center">Name</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="text-center">{{ $product->name }}</td>
                                    <td class="text-center">{{ $product->price }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('products.edit', $product->id ) }}" class="btn btn-success btn-xs">Edit</a>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-xs btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                       {{-- <div class="float-right ">
                            <div class="col-lg-12">{{ $products->links()  }}</div>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
