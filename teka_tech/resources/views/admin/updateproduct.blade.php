<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
                @if(session()->has('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <div class="div_center">
                    <h2 class="h2_font">Edit Product - {{$product -> product_name}}</h2>
                    <form action="{{ url('update_product_confirm/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf    
                        <div class="div-design">
                            <label for="product_name">Product Name</label>
                            <input class="input_color" type="text" name="product_name" id="product_name" placeholder="Name of Product" value="{{$product -> product_name}}">
                        </div>
                        <div class="div-design">
                            <label for="price">Product Price</label>
                            <input class="input_color" type="number" name="price" id="price" placeholder="Price of Product" value="{{$product -> price}}">
                        </div>
                        <div class="div-design">
                            <label for="discounted_price">Product Discounted Price</label>
                            <input class="input_color" type="number" name="discounted_price" id="discounted_price" placeholder="Discounted Price of Product" value="{{$product -> discounted_price}}">
                        </div>
                        <div class="div-design">
                            <label for="description">Product Description</label>
                            <input class="input_color" type="text" name="description" id="description" placeholder="Description of Product" value="{{$product -> description}}">
                        </div>
                        <div class="div-design">
                            <label for="category">Product Category</label>
                            <select class="input_color" name="category" id="category">
                                <option value="{{$categoryName}}" selected>{{$categoryName}}</option>
                                @foreach($category as $category)
                                    <option value="{{$category-> id}}">{{$category-> category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="div-design">
                            <label for="image">Current Product Image</label>
                            <img style="margin:auto" height="100" width="100" src="product/{{$product->image}}" alt="{{$product -> product_name}}">
                        </div>

                        <div class="div-design">
                            <label for="image">Change Product Image</label>
                            <input type="file" name="image" id="image">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Update Product">
                    </form>
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