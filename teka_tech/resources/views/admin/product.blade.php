<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Teka Tech Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style type="text/css">
        .div_center{
            text-align:center;
            padding-top:40px;
        }

        .h2_font{
            font-size:40px;
            padding-bottom:40px;
        }

        .input_color{
            color:black;
        }

        .center {
          margin:auto;
          width:50%;
          text-align:center;
          margin-top:30px;
          border:2px red solid;
        }

        .div-design {
            padding-bottom: 15px;
        }
        label {
            display:inline-block;
            width:200px;
        }
        /* Remove number input spinners */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type=number] {
            -moz-appearance: textfield;
        }
        /* Hide placeholder option in dropdown */
        select option[value=""][disabled] {
            display: none;
            color: #6c7293;
        }
        /* Style for the placeholder text when no option is selected */
        select:invalid {
            color: #6c7293;
        }
    </style>
</head>
    <body class="sidebar-icon-only">
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar');
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header');
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title text-center mb-4" style="font-size: 1.5rem; font-weight: 500; color: #6c7293;">Create New Product</h2>
                                @if(session()->has('message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{session()->get('message')}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                <form class="forms-sample" action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="product_name">Product Name</label>
                                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" style="background: #191c24; color: white;">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Regular Price</label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter regular price" style="background: #191c24; color: white;">
                                    </div>
                                    <div class="form-group">
                                        <label for="discounted_price">Discounted Price</label>
                                        <input type="number" class="form-control" id="discounted_price" name="discounted_price" placeholder="Enter discounted price" style="background: #191c24; color: white;">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Product Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter detailed product description" style="background: #191c24; color: white; border: 1px solid #6c7293;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Product Category</label>
                                        <select class="form-control" id="category" name="category" style="background: #191c24; color: #6c7293; border: 1px solid #6c7293;" required>
                                            <option value="" disabled selected>Choose a Category</option>
                                            @foreach($category as $category)
                                                <option value="{{$category->id}}" style="color: white;">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Image</label>
                                        <input type="file" name="image" class="file-upload-default" style="background: #191c24; color: white;">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload product image" style="background: #191c24; color: white;">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                            </span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Add Product</button>
                                    <button class="btn btn-light">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>