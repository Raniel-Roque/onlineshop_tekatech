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

        .custom-table-hover tbody tr {
            background-color: #191c24 !important;
            color: white !important;
        }
        .custom-table-hover tbody tr:hover {
            background-color: #2c2e33 !important;
            color: white !important;
        }
        .btn-custom {
            padding: 0.5rem 1rem;
            border: none;
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
                    <div class="col-12">
                        @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                {{ session()->get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title text-center mb-4" style="font-size: 1.5rem; font-weight: 500; color: #6c7293;">Add Category</h2>
                                <form class="forms-sample" action="{{url('/add_category')}}" method="POST">
                                    @csrf    
                                    <div class="form-group" style="margin-bottom: 1.5rem;">
                                        <label for="category" class="mb-2">Category Name</label>
                                        <div class="input-group">
                                            <input type="text" name="category" class="form-control" id="category" placeholder="Enter Product Category" style="background: #191c24; color: white;" required>
                                            <button type="submit" class="btn btn-primary btn-custom ms-2" style="margin-left: 0;">+ Add</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="table-responsive mt-5">
                                    <table class="table custom-table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center text-muted border-bottom">Category Name</th>
                                                <th class="text-center text-muted border-bottom">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $data)
                                            <tr>
                                                <td class="text-center">{{$data->category_name}}</td>
                                                <td class="text-center">
                                                    <a href="{{url('delete_category', $data->id)}}"
                                                       onclick="return confirm('Are you sure you want to delete {{$data->category_name}}.')"
                                                       class="btn btn-danger btn-sm btn-custom" style="background: #dc3545;">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- card-body -->
                        </div> <!-- card -->
                    </div> <!-- col-12 -->
                </div> <!-- row -->
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