@if(isset($products))
<div class="">
    <div class="container">
        <div class="area-title">
            <h2>Sản phẩm vừa xem</h2>
        </div>
        <!-- our-product area start -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="features-curosel">
                        <!-- single-product start -->
                        @foreach($products as $product)
                            <div class="col-lg-3 col-md-3">
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        @if($product->p_sale > 0)
                                            <span class="p-img">{{ $product->p_sale }}%</span>
                                        @endif
                                        <a href="{{ route('get.detail.product',[$product->p_slug,$product->id]) }}">
                                            <img class="primary-image"
                                                 src="{{ pare_url_file($product->p_avatar) }}" alt=""/>
                                            <img class="secondary-image"
                                                 src="{{ pare_url_file($product->p_avatar) }}" alt=""/>
                                        </a>
                                        <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="{{ route('get.detail.product',[$product->p_slug,$product->id]) }}"
                                                   title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="#" title="Add to Wishlist"><i
                                                                    class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        @if($product->p_number < 1)
                                                            <a onclick="notiwarn()" title="Sản phẩm đã hết hàng"
                                                               disabled="disable"><i class="icon-bag"></i></a>
                                                        @else
                                                            <a onclick="notisuccess()"
                                                               href="{{ route('add.shopping.cart', $product->id) }}"
                                                               title="Thêm vào giỏ"><i class="icon-bag"></i></a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="quickviewbtn">
                                                    <a class="notify2" onclick="notify()"
                                                       title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="new-price">{{ number_format($product->p_price,0,',','.') }} đ</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a href="#">{{ $product->p_name }}</a></h2>
                                        <p>{{ $product->p_description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- our-product area end -->
    </div>
</div>
@endif
