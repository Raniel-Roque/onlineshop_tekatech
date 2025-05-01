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

        .image-size {
            width:150px; 
            height:150px;
        }

        .th_color {
            background:skyblue;
        }
        
        .th-deg {
            padding:30px
        }
        
        label {
            display:inline-block;
            width:200px;
        }
    </style>
</head>
  <body>
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
                    <h2 class="h2_font">Manage Product</h2>
                    <table class="center">
                        <tr class="th_color">
                            <th class="th-deg">Image</th>
                            <th class="th-deg">ID</th>
                            <th class="th-deg">Product Name</th>
                            <th class="th-deg">Description</th>
                            <th class="th-deg">Price</th>
                            <th class="th-deg">Discounted Price</th>
                        </tr>
                        @foreach($product as $product)
                            <tr>
                                <td><img class="image-size" src="product/{{$product->image}}" alt="{{$product->product_name}}"></td>
                                <td>{{$product->id}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->discounted_price}}</td>                                    
                            </tr>
                        @endforeach
                    </table>
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