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
    <link rel="shortcut icon" href="home/images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <style>
        .pagination {
            width: 450px;
            height: auto;
            padding: 5px;
            margin: 6px auto;
        }

        .table {
            margin: 50px auto;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('user.header')
        <!-- end header section -->

        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->Item}}</td>

                        <td>{{$order->price}}</td>
                        <td>{{$order->quantity}}</td>

                        @if($order->delivery_status == 'processing')
                        <td>
                            <a href="{{url('cancel', $order->id)}}" class="btn btn-danger" onclick="return confirm('are you sure want to cancel order')">canecl</a>
                        </td>
                        @elseif($order->delivery_status == 'deliverd')
                        <td>
                            <button class="btn btn-success" disabled>order deliverd</button>
                        </td>
                        @else
                        <td>
                            <button class="btn btn-danger" disabled>order canceld</button>
                        </td>
                        @endif

                        <!-- <td>{{$order->delivery_status}}</td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    </div>

    @include('user.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>

</body>

</html>