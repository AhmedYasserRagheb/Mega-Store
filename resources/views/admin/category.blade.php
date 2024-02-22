<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
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



                <!-- start add category  -->
                <div class="add">
                    Add Category :
                </div>
                <!-- end add category  -->

                <!-- start category form  -->
                <form class="category_form" style="width: 500px; height: auto; margin: 15px auto" method="POST" action="{{ url('/store') }}" style="width: 500px; height: 30px; margin:30px auto">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" id="StockName" placeholder="StockName" aria-label="StockName" name="StockName" autocomplete="off">
                        </div>
                        <div class="col mb-3">
                            <!-- <input type="text" class="form-control" placeholder="StockCount" aria-label="StockCount" name="StockCount" autocomplete="off"> -->
                            <input type="submit" class="btn btn-primary mb-3 form-control" value="AddCategory">

                            
                        </div>

                    </div>
                    <!-- <input type="submit" class="btn btn-primary mb-3 form-control" value="Add"> -->
                </form>

               <form class="deleteAll_form" action="{{ url('deleteAll') }}" method="GET">
                <input type="submit" name="delete" value="deleteAll" class="btn btn-danger mb-3 form-control">
               </form>
                
                <!-- end category form  -->


                <!-- start category table -->
                <div id="cat_table">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>StockName</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- $count;
                            
                            <?php
                            $id = 1;
                            ?>
                            $i = $data-> id; -->
                            @foreach($data as $data)

                            <tr>
                                <td>
                                    {{ $id++ }}
                                </td>
                                <td>
                                    {{ $data-> StockName}}
                                </td>

                                </td>
                                <td>
                                    <!-- <a onclick="return confirm('Are You Sure to Delete')" class="btn btn-danger" href="{{ url('delete', $data->id) }}">
                                        Delete
                                    </a> -->
                                    <a onclick="return confirm('Are You Sure to Delete')" class="btn btn-danger" href="{{ url('delete', $data->id) }}">
                                        Delete
                                    </a>

                                    <!-- <a class="btn btn-info" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" href="{{ url('edit', $data->id) }}">

                                        Edit
                                    </a> -->

                                    <!-- <a href="{{ url('edit', $data->id) }}" class="edit btn btn-info" value=" {{$data->id}} ">
                                        edit
                                    </a> -->
                                    <a class="btn btn-info" href="#"
                                        data-toggle="modal" 
                                        data-target="#editModal"
                                        data-id = "{{ $data -> id}}"        
                                        data-name="{{ $data-> StockName}}">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end category table  -->
        
            </div>




            <!-- start edit modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('update') }}" method="POST">
                            <div class="modal-body">
                               
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" id="id" value="">
                                </div>

                                <div class="form-group">
                                    <label for="Category_Name" class="col-form-label">
                                        Category Name
                                    </label>
                                    <input type="text" class="form-control" id="StockName" name="stock">
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
            var categoryName = button.data('name')    
              
            var modal = $(this)
            modal.find('.modal-body #id').val(categoryId);
            modal.find('.modal-body #StockName').val(categoryName);
            
        })
    </script>
</body>

</html>