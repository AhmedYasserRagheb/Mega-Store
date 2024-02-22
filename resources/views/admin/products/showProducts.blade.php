<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>showProducts</title>
    @include('admin.style')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <div class="main-panel">
            <div class="content-wrapper">
                <!-- start adding alert message -->
                @if(session()->has('message'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session()->get('message')}}
                </div>
                @endif
                <!-- End adding alert message -->




                <div class="add">show all products</div>
                <div class="contentTable">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Size</th>
                                <th scope="col">Color</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Discount</th>
                                <th scope="col">quantity</th>
                                <th scope="col">ProductImage</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $id = 1;
                            ?>

                            @foreach($products as $product)
                            <tr>


                                <td>
                                    {{ $id++ }}

                                </td>
                                <td>{{$product-> title}}</td>
                                <td>{{$product-> size}}</td>
                                <td>{{$product-> color}}</td>
                                <td>{{$product-> category}}</td>
                                <td>{{$product-> price}}</td>
                                <td>{{$product-> discount_price}}</td>
                                <td>{{$product-> quantity}}</td>
                                <td class="img">
                                    <img src="images/{{$product->image}}" alt="Image">
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="{{url('deletProduct',$product-> id)}}" onclick="return confirm('Are You Sure to Delete')">Delet</a>

                                    <a class="btn btn-info" href="#" data-toggle="modal" data-target="#editModal" data-id="{{$product-> id}}" data-title="{{$product->title}}" data-size="{{$product->size}}" data-color="{{$product->color}}" data-category="{{$product-> category}}" data-price="{{$product-> price}}" data-discount_price="{{$product-> discount_price}}" data-quantity="{{$product-> quantity}}">

                                        Edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- start edit modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Products</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('update') }}" method="POST">
                            <div class="modal-body">

                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <input type="text" class="form-control" name="id" id="id" value="">
                                </div>

                                <div class="form-group">
                                    <label for="title" class="col-form-label">
                                        Product Title
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="size" class="col-form-label">
                                        Product Size
                                    </label>
                                    <input type="text" class="form-control" id="size" name="size_">
                                </div>
                                <div class="form-group">
                                    <label for="color" class="col-form-label">
                                        Product Color
                                    </label>
                                    <input type="text" class="form-control" id="color" name="color">
                                </div>

                                <div class="form-group">
                                    <!-- <label for="category" class="col-form-label">
                                        Product category
                                    </label>
                                    <input type="text" class="form-control" id="category" name="category"> -->
                                    <label for="category" class="col-form-label">
                                        Product category
                                    </label>
                                    <select class="form-select form-control" aria-label="Default select example" name="category" id="category">
                                        <option value="" selected>{{$product->category}}</option>
                                        @foreach($category as $category)
                                        <option>{{ $category-> StockName}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Category_Name" class="col-form-label">
                                        Product Price
                                    </label>
                                    <input type="text" class="form-control" id="price" name="price">
                                </div>

                                <div class="form-group">
                                    <label for="price" class="col-form-label">
                                        Product discountPrice
                                    </label>
                                    <input type="text" class="form-control" id="discount_price" name="discount_price">
                                </div>
                                <div class="form-group">
                                    <label for="quantity" class="col-form-label">
                                        Product quantity
                                    </label>
                                    <input type="text" class="form-control" id="quantity" name="quantity">
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end edit modal -->

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->

    </div>
    <!-- container-scroller -->



    @include('admin.script')


    <script>
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var categoryId = button.data('id')
            var productTitle = button.data('title')
            var productSize = button.data('size')
            var productColor = button.data('color')
            var productCategoty = button.data('category')
            var productPrice = button.data('price')
            var productDiscountPrice = button.data('discount_price')
            var productQuantity = button.data('quantity')


            var modal = $(this)
            modal.find('.modal-body #id').val(categoryId);
            modal.find('.modal-body #title').val(productTitle);
            modal.find('.modal-body #size').val(productSize);
            modal.find('.modal-body #color').val(productColor);
            modal.find('.modal-body #category').val(productCategoty);
            modal.find('.modal-body #price').val(productPrice);
            modal.find('.modal-body #discount_price').val(productDiscountPrice);
            modal.find('.modal-body #quantity').val(productQuantity);

        })
    </script>
</body>

</html>