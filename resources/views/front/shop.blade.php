@extends('front.layouts.app')

@section('content')
    <section class="section-6 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 sidebar">
                    <div class="sub-title">
                        <h2>Categories</h2>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="accordion accordion-flush" id="accordionExample">
                                @if ($categories->isNotEmpty())
                                    @foreach ($categories as $category)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{ $category->id }}">
                                                <a class="accordion-button collapsed" role="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $category->id }}"
                                                    aria-expanded="false" aria-controls="collapse{{ $category->id }}"
                                                    onclick="filterProducts('{{ $category->id }},{{ Str::slug($category->name) ?? '' }}')">
                                                    {{ $category->name }}
                                                </a>
                                            </h2>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="sub-title mt-5">
                        <h2>Price</h3>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    $0-$100
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    $100-$200
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    $200-$500
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    $500+
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row pb-3">
                        <div class="col-12 pb-1">
                            <div class="d-flex align-items-center justify-content-end mb-4">
                                <div class="ml-2">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown">Sorting</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Latest</a>
                                            <a class="dropdown-item" href="#">Price High</a>
                                            <a class="dropdown-item" href="#">Price Low</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($products->isNotEmpty())
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-md-3 mb-4 product-category-{{ $product->category_id }}">
                                        <div class="card product-card">
                                            <div class="product-image position-relative">
                                                <a href="" class="product-img"><img class="card-img-top"
                                                        src="{{ asset('assets/img/product.png') }}" alt=""></a>
                                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                                <div class="product-action">
                                                    <a class="btn btn-dark" href="#">
                                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body text-center mt-3">
                                                <a class="h6 link" href="product.php">{{ $product->title }}</a>
                                                <div class="price mt-2">
                                                    <span class="h5" id="style-price"><strong>{{ $product->price }}</strong></span>
                                                    <span class="h6 text-underline" id="style-price"><del>{{ $product->compare_price }}</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
