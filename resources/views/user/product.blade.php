<section class="product_section layout_padding" id="products">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{ url('details',$product->id)}}" class="option1">
                                More details
                            </a>
                           
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="images/{{$product->image}}" alt="productImage">

                    </div>
                    <div class="detail-box">
                        <h5>
                            {{$product -> title}}
                        </h5>

                        @if($product -> discount_price)

                        <div>
                            <span>price</span>
                            <h6 style="color: red; text-decoration:line-through">
                                {{$product -> price}}
                            </h6>
                        </div>

                        <div>
                            <span>discount</span>
                            <h6 style="color:blue">
                                {{$product -> discount_price}}
                            </h6>
                        </div>




                        @else
                        <div>
                            <span>price</span>
                            <h6 style="color:blue">
                                {{$product -> price}}
                            </h6>
                        </div>

                        @endif

                    </div>
                </div>
            </div>
            @endforeach


            <div class="pagination">

                {{$products->links()}}
            </div>

        </div>




    </div>

    
    <!-- </script> -->
</section>