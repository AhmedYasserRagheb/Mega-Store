<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ url('home/images/favicon.png') }}" type="">
    <title>product details</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ url('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ url('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ url('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ url('home/css/responsive.css') }}" rel="stylesheet" />

    <style>
        h5 {
            color: red;
        }

        h6 {
            display: inline;
            font-weight: bold;
        }

        span {
            color: blue;
        }

        .detailsContainer {
            /* border: 1px solid #000; */
            width: 80%;
            height: auto;
            margin: 30px auto;
        }

        .product_details {
            width: 400px;
            height: auto;
            /* border: 1px solid #000; */
            /* text-align: center; */
            margin: 10px 117px;
            padding: 29px;
            float: left;
        }

        .image {
            width: 224px;
            height: 221px;
            margin-bottom: 5px;
        }

        .addToCard {
            display: block;
            width: 250px;
            height: 300px;
            float: right;
            margin: 95px 85px;
            padding: 30px;
            border: 1px solid #000;
            border-radius: 10px;
            /* text-align: center; */
        }

        .action_btn {
            margin: 10px 0px 0px 32px;
            width: 120px;
        }

        .addToCard a {
            display: block;
            margin: 5px auto;
            border-radius: 50px;
            /* text-align: center */

        }



        .card_order {
            width: 179px;
            height: auto;
            text-align: center;
        }

        .select {
            border-radius: 7px;
            margin-bottom: 5px;
            margin-top: 10px;
            padding: 5px 10px;
        }

        .card_order .btn {
            display: block;
            margin: 5px auto;
            border-radius: 50px
        }

        .inStock {
            color: red;
            margin-top: 40px;
        }

        .back {
            margin: 0px 0 8px 0px;
        }

        .comments_section {
            width: 100%;
            height: auto;
            padding: 20px;

        }

        .user_comment {
            width: 50%;
            height: 150px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .show_all_comments {
            width: 60%;
            height: auto;
            text-align: left;
            padding: 20px;
        }

        .reply_box {
            width: 60%;
            height: auto;
            /* border: 1px solid red; */
            display: none;
            padding: 10px;
            /* margin: 0px 0px 0px 50px; */
        }
        .time{
            font-size: 10px;
            color: gray
        }
    </style>

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('user.header')
        <!-- end header section -->

        @if(session()->has('message'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('message')}}
        </div>
        @endif

        

        <div class="detailsContainer">

        @include('sweetalert::alert')

            <div class="product_details">
                <a class="btn btn-primary back" href="{{url('/')}}"> <--Back </a>
                        <br>
                        <!-- <div class="product_image"> -->
                        <img class="image" src="{{ url('images', $product->image)}}" alt="product_iamge">
                        <div class="title">
                            <h6 class="product_Title" ">product title: </h6>
               <span>{{$product->title}}</span>
               <!-- </div> -->
            </div>
            <div class=" descriptain">
                                <h6>Product details: </h6>


                                <p>
                                    this is {{ $product->color }} {{ $product->title }} with size {{ $product->size }} for Men`s
                                </p>
                        </div>

                        @if($product->discount_price)
                        <h5>price:
                            <span style="text-decoration:line-through; color: Red">
                                {{$product->price}} AED
                            </span>
                        </h5>

                        <h5 title="price after discount">new price:
                            <span>
                                {{$product->discount_price}} AED
                            </span>
                        </h5>
                        @else
                        <h5>price:
                            <span>
                                {{$product->price}} AED
                            </span>
                        </h5>
                        @endif


            </div>


            <div class="addToCard">

                @if($product->discount_price)

                <h5>Price: <span style="color: blue">{{$product->discount_price}} AED</span></h5>

                @else

                <h5>price:
                    <span>
                        {{$product->price}} AED
                    </span>
                </h5>
                @endif

                <h5 class="inStock">IN stock : </h5>

                @php
                $count = $product->quantity;
                @endphp
                <!-- <h4>In Stock</h4> -->
                <form class="card_order" action="{{ url('addToCard', $product->id) }}" method="get">
                    @csrf
                    <select class="select" type="number" value="" name="order_quantity">
                        <option value="" selected disabled>choose quantity</option>
                        @for ($i = 1; $i <= $count; $i++) <option value="{{$i}}" name="order">
                            {{ $i }}
                            </option>
                            @endfor
                    </select>

                    <button class="btn btn-warning" type="submit">Add To Card</button>
                </form>
                
            </div>
        </div>

        <div class="comments_section">
           
            <form action="{{url('show_comment', $product->id)}}" method="GET" class="user_comment">
                <input type="text" name="user_comment" placeholder="add comment...">
                <button type="submit" class="btn btn-info">comment</button>
            </form>
        
            <div class=" show_all_comments">
                    @foreach($user_comment as $comment)

                        @if($comment->product_id == $product->id)
                        
                            <div style="margin-bottom: 10px">
                                <h6>{{$comment->user}} <span class="time">({{$comment->created_at}})</span></h6>
                                <p>{{$comment->comments}}</p>

                            </div>
                        @endif
                    @endforeach

                  
        </div>
    </div>


    </div>


    <!-- footer start -->
    @include('user.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQery -->
    <script src="{{ url('home/js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ url('home/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ url('home/js/bootstrap.js') }}"></script>
    <!-- custom js -->
    <script src="{{ url('home/js/custom.js') }}"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
</body>

</html>