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
        .myProducts {
            width: 800px;
            margin: 50PX auto 5px;
            height: auto;
            /* border: 1px solid #000; */
        }

        .total {
            width: 800px;
            height: 40px;
            border: 1px solid #000;
            margin: 0 auto;
            /* padding: 5px; */
        }

        .total .payment_methods {
            width: 460px;
            height: 40px;
            /* border: 1px dotted #000; */
            float: left;
            text-align: center;
            padding: 5px;
        }

        .total h4 {
            width: 200px;
            height: 40px;
            /* border: 1px dotted #000; */
            float: Right;
            text-align: center;
            padding: 5px;
        }

        .deleteAll {
            width: 180px;
            /* margin-bottom: 10px */
        }
    </style>

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('user.header')
        <!-- end header section -->


        <!-- <a href="" class="btn btn-danger">Delete All</a> -->
        <div class="myProducts">
            <!-- <a href="{{ url('UserCard/deleteAll') }}" class="btn btn-danger deleteAll">Delete All</a> -->
            <table class="table" style="text-align: center">
                <thead class="thead-dark">
                    <tr>
                        <th>
                            <input type="checkbox" id="selectAll" onclick="checkAll()">
                        </th>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">quantity</th>
                        <th scope="col">price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = 1;
                    $total_price = 0;
                    ?>


                    @foreach($card as $cards)
                    <tr>
                        <td>
                            <!-- <form action=""> -->
                            <input type="checkbox" id="Check_All" class="Check_All">
                            <!-- </form> -->
                        </td>
                        <td>{{$id++}}</td>
                        <td>{{ $cards-> Item}}</td>
                        <td>{{ $cards-> Quantity}}</td>
                        <td>{{ $cards-> Price}} AED</td>
                        <td>
                            <a href="{{ url('UserCard/remove', $cards->id) }}" class="btn btn-danger" onclick="return confirm('are you sure?')">Delete</a>


                        </td>

                    </tr>

                    <?php
                    $total_price += $cards->Price;
                    ?>
                    @endforeach

                </tbody>
            </table>

        </div>



        <div class="total">






            <div class="payment_methods">
                <h6>choose how to pay:
                    <a href="{{url('/cash')}}">Cash on delivery / </a>
                    <a href="{{url('/payment', $total_price)}}" class="">Card payment</a>
                    <!-- <a href="{{url('/payment/id')}}" class="">Card payment</a>     -->
                </h6>
            </div>

            <h4 class="btn btn-primary">Total Price : $ {{$total_price}} </h4>


        </div>
        <!-- <a href="{{ url('/test') }}" class="btn btn-secondry">test</a> -->
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
        function checkAll(e) {
            $('#selectAll').click(function() {
                $('.Check_All').prop('checked', $(this).prop('checked'));
            });
        }
    </script>
</body>

</html>