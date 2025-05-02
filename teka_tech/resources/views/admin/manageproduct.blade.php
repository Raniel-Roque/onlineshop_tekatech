<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Teka Tech Admin</title>
    
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    
    <!-- Custom Styles -->
    <style>
        .custom-table-hover tbody tr {
            background-color: #191c24 !important;
            color: white !important;
        }

        .custom-table-hover tbody tr:hover {
            background-color: #2c2e33 !important;
        }

        .table-cell-ellipsis {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .btn-custom {
            padding: 0.5rem 1rem;
            border: none;
        }
    </style>
  </head>
  <body class="sidebar-icon-only">
    <div class="container-scroller">
      @include('admin.sidebar')
      <div class="container-fluid page-body-wrapper">
        @include('admin.header')
        <div class="main-panel">
          <div class="content-wrapper">
            @if(session()->has('message'))
              <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title text-center mb-4" style="font-size: 1.5rem; font-weight: 500; color: #6c7293;">Manage Products</h2>
                    <div class="table-responsive">
                      <table class="table custom-table-hover">
                        <thead>
                            <tr>
                                <th class="text-center text-muted border-bottom">Image</th>
                                <th class="text-center text-muted border-bottom">ID</th>
                                <th class="text-center text-muted border-bottom">Product Name</th>
                                <th class="text-center text-muted border-bottom">Description</th>
                                <th class="text-center text-muted border-bottom">Category</th>
                                <th class="text-center text-muted border-bottom">Price</th>
                                <th class="text-center text-muted border-bottom">Discounted Price</th>
                                <th class="text-center text-muted border-bottom" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($product as $product)
                            <tr>
                              <td class="text-center">
                                <img src="product/{{$product->image}}" alt="{{$product->product_name}}" class="img-fluid rounded" style="width: 100px; height: 100px; object-fit: cover;">
                              </td>
                              <td class="text-center">{{$product->id}}</td>
                              <td class="text-center">{{$product->product_name}}</td>
                              <td class="text-start table-cell-ellipsis">{{$product->description}}</td>
                              <td class="text-center">
                                {{ $product->categoryRelation ? $product->categoryRelation->category_name : 'N/A' }}
                              </td>
                              <td class="text-start">${{ number_format($product->price, 2) }}</td>
                              <td class="text-start">${{ number_format($product->discounted_price, 2) }}</td>
                              <td class="text-center" colspan="2">
                                <div class="d-flex justify-content-center">
                                  <a href="{{ url('update_product', $product->id) }}" class="btn btn-primary btn-custom me-2">Edit</a>
                                  <a href="{{ url('delete_product', $product->id) }}" onclick="return confirm('Are you sure you want to delete {{$product->product_name}}?')" class="btn btn-danger btn-custom">Delete</a>
                                </div>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    @include('admin.script')
  </body>
</html>