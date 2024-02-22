<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>All Orders</title>
  @include('admin.style')
  <style>
    .search {
      width: 350px;
      height: 30px;
      padding: 20px;
      margin: 20px auto;
    }

    .pagination {
      margin: 5px auto;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.navbar')
    <div class="main-panel">

      <!-- <div class="content-wrapper"> -->

      <div class="search">
        <!-- <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="" method="get">

          @csrf
          <input type="text" class="form-control" placeholder="Search Order" name="search" autocomplete="off">

          <button type="submit" class="btn btn-outline-primary">Search</button>
        </form> -->
        <!-- <form action="{{url('/search')}}" method="get">
          @csrf
          <input type="text" name="search" placeholder="Search...">
          <button class="btn btn-outline-info">Search</button>
        </form> -->
      </div>

      <table class="table">
        <thead class="table-light">
          <tr>
            <!-- <th scope="col">User Id</th> -->

            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <!-- <th scope="col">Address</th> -->

            <!-- <th scope="col">ProductId</th> -->
            <th scope="col">Product title</th>
            <!-- <th scope="col">Size</th> -->
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>

            <!-- <th scope="col">Payment Method</th> -->
            <th scope="col">Payment Status</th>
            <th scope="col">Delivery Status</th>

            <!-- <th scope="col">Deliverd</th> -->
            <th scope="col">Print</th>

          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
          <tr>
            <td>{{$order->Name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->phone}}</td>
            <!-- <td>{{$order->address}}</td> -->

            <!-- <td>{{$order->Product_id}}</td> -->
            <td>{{$order->Item}}</td>
            <td>{{$order->quantity}}</td>
            <td>{{$order->price}}</td>
            <!-- <td>{{$order->address}}</td>  -->


            <td>{{$order->payment_status}}</td>
            <!-- <td>{{$order->delivery_status}}</td> -->

            <td>


              @if($order->delivery_status == 'processing')
              <a class="btn btn-primary" href="{{ url('deliver', $order->id) }}" onclick="return confirm('are you sure')">
                processing
              </a>
              @elseif($order->delivery_status == 'deliverd')
              <button class="btn btn-success" disabled>Deliverd</button>
              @else

              <button class="btn btn-danger" disabled>Canceld</button>
              @endif

            </td>

            <td>
              <a href="{{ url('print_pdf', $order->id) }}" class="btn btn-info">Pdf</a>
            </td>

          </tr>
          @endforeach

        </tbody>

      </table>
      <!-- </div> -->
      <div class="pagination">
        {{$orders->links()}}
      </div>
      <!-- partial:partials/_navbar.html -->

      <!-- partial -->
      <!-- main-panel ends -->

    </div>



    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  @include('admin.script')
</body>

</html>