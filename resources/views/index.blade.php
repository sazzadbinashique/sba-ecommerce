@extends('layouts.frontend')

@section('content')
    <div class="container">
        <section class="featured-search">
            <div class="row mb30">
                <form action="{{route('product.search')}}" method="get">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="align-center ">
                            <input class="search  bg-boxed-dark" type="text" placeholder="Search Book..." name="q"  autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-medium btn--dark">
                            <span class="text">Search</span>
                            <span class="semicircle"></span>
                        </button>
                    </div>
                </form>
            </div>
        </section>
        <section class="featured-category mb30">
            <div class="container">
                <div class="col-lg-12">
                    <div class="loop owl-carousel col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="books-item">
                            <div class="books-item-thumb">
                                <img src="{{asset('app/img/book6.png')}}" alt="book">
                            </div>
                            <a href="19_cart.html" class="btn btn-small btn--dark add">
                                <span class="text">Category Name</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="row pt120">
            <div class="books-grid">
                <div class="book-title">
                    <h2>Our Books</h2>
                </div>
                <div class="row mb30">
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb30">
                            <div class="books-item">
                                <div class="books-item-thumb">
                                    <img src="{{ asset($product->image)}}" alt="book">
                                    <div class="new">New</div>
                                    <div class="sale">Sale</div>
                                    <div class="overlay overlay-books"></div>
                                </div>

                                <div class="books-item-info">
                                    <a href="{{route('product.single', $product->id)}}">
                                        <h5 class="books-title">{{$product->name}}</h5>
                                    </a>
                                    <p class="books-author">Sazzad Bin Ashique</p>


                                    <div class="books-price">{{$product->price}} &#2547;</div>
                                </div>

                                <a href="{{route('cart.rapid.add', $product->id)}}" class="btn btn-small btn--dark add">
                                    <span class="text">Add to Cart</span>
                                    <i class="seoicon-commerce"></i>
                                </a>

                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="row pb120">
                    <div class="col-lg-12">{{ $products->links()  }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
