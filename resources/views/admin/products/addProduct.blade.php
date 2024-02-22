<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addProduct</title>
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

                <div class="add">AddProduct /</div>
                <!-- start form  -->
                <div class="form">
                    <form class="addProductsForm" action="{{ url('/storeProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">

                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="add product name" autocomplete="off" name="title" required>
                        </div>
                        <div class="mb-3">

                            <!-- <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="chose size" autocomplete="off" name="size"> -->
                            <select class="form-select form-control" aria-label="Default select example" name="size">
                                <option selected>choose item size</option>
                                
                                <option value="sm">sm</option>
                                <option value="m">m</option>
                                <option value="xl">xl</option>
                                <option value="xxl">xxl</option>
                                <option value="xxxl">xxxl</option>
                                
                            </select>
                        </div>
                        <div class="mb-3">

                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter color" autocomplete="off" name="color">
                        </div>
                        <div class="mb-3">
                            <select class="form-select form-control" aria-label="Default select example" name="category">
                                <option value="" selected>choose item category</option>
                                @foreach($category as $category)
                                <option>{{ $category-> StockName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">

                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Price" autocomplete="off" name="price" required>
                            
                        </div>
                        <div class="mb-3">

                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product discount price" autocomplete="off" name="discount_price">
                        </div>
                        <div class="mb-3">

                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product quantity" autocomplete="off" name="quantity" required>
                        </div>
                        <div class="mb-3">

                            <input type="file" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="upload image" autocomplete="off" name="image">
                        </div>
                        <input type="submit" value="Save" class="form-control btn btn-primary">
                    </form>
                </div>
                <!-- end form  -->
            </div>

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->

    </div>
    <!-- container-scroller -->



    @include('admin.script')
</body>

</html>