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
        select option {
            background: #191c24;
            color: white;
        }
        select option[disabled] {
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
                    <div class="col-12">
                        @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                {{session()->get('message')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title text-center mb-4" style="font-size: 1.5rem; font-weight: 500; color: #6c7293;">
                                    Edit Product - {{$product->product_name}}
                                </h2>
                                <form class="forms-sample" action="{{ url('update_product_confirm/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" style="margin-bottom: 1.5rem;">
                                        <label for="product_name">Product Name</label>
                                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{$product->product_name}}" style="background: #191c24; color: white;" required>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 1.5rem;">
                                        <label for="price">Regular Price</label>
                                        <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}" style="background: #191c24; color: white;" required>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 1.5rem;">
                                        <label for="discounted_price">Discounted Price</label>
                                        <input type="number" class="form-control" id="discounted_price" name="discounted_price" value="{{$product->discounted_price}}" style="background: #191c24; color: white;" required>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 1.5rem;">
                                        <label for="description">Product Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" style="background: #191c24; color: white; border: 1px solid #6c7293;" required>{{$product->description}}</textarea>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 1.5rem;">
                                        <label for="category">Product Category</label>
                                        <select class="form-control" id="category" name="category" style="background: #191c24; border: 1px solid #6c7293;" required>
                                            <option value="" disabled {{ !$categoryExists ? 'selected hidden' : 'hidden' }}>Choose a Category</option>
                                            @foreach($category as $cat)
                                                <option value="{{$cat->id}}" {{ $product->category == $cat->id ? 'selected' : '' }}>{{$cat->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 1.5rem;">
                                        <label>Change Product Image</label>
                                        <div class="input-group col-xs-12">
                                            <div class="custom-file" style="width: 100%;">
                                                <input type="file" name="image" class="custom-file-input" id="product-image" style="display: none;">
                                                <label class="custom-file-label" for="product-image" style="
                                                    background: #191c24;
                                                    color: #6c7293;
                                                    border: 1px solid #6c7293;
                                                    padding: 0.375rem 0.75rem;
                                                    border-radius: 4px;
                                                    cursor: pointer;
                                                    width: 100%;
                                                    margin-bottom: 0;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: space-between;
                                                ">
                                                    <span id="file-name">Choose file</span>
                                                    <i class="mdi mdi-upload" style="font-size: 1.25rem;"></i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-3" style="gap: 24px;">
                                            <!-- Current Image -->
                                            <div style="text-align: center;">
                                                <div style="font-size: 0.95rem; color: #6c7293; margin-bottom: 0.5rem;">Current Image</div>
                                                <img src="product/{{$product->image}}" alt="{{$product->product_name}}" style="max-width: 200px; max-height: 200px; border-radius: 4px; border: 1px solid #6c7293; object-fit: cover;">
                                            </div>
                                            <!-- Preview Image -->
                                            <div id="image-preview-container" style="display: none; text-align: center;">
                                                <div style="font-size: 0.95rem; color: #6c7293; margin-bottom: 0.5rem;">New Image Preview</div>
                                                <div style="position: relative; display: inline-block;">
                                                    <img id="image-preview" src="#" alt="Product Preview" style="
                                                        max-width: 200px;
                                                        max-height: 200px;
                                                        border-radius: 4px;
                                                        border: 1px solid #6c7293;
                                                        object-fit: cover;
                                                    ">
                                                    <button type="button" class="btn btn-danger btn-sm" id="remove-image" style="
                                                        position: absolute;
                                                        top: -10px;
                                                        right: -10px;
                                                        border-radius: 50%;
                                                        padding: 0;
                                                        background: #dc3545;
                                                        border: none;
                                                        color: white;
                                                        width: 24px;
                                                        height: 24px;
                                                        display: flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                        transition: all 0.3s ease;
                                                        display: none;
                                                    ">
                                                        <i class="mdi mdi-close" style="font-size: 0.875rem; line-height: 1;"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-2">Update Product</button>
                                        <a href="{{ url('/manage_product') }}" class="btn btn-light">Cancel</a>
                                    </div>
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
    @include('admin.script')
    <script>
        document.getElementById('product-image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const fileName = document.getElementById('file-name');
            const preview = document.getElementById('image-preview');
            const container = document.getElementById('image-preview-container');
            const removeButton = document.getElementById('remove-image');

            if (file) {
                fileName.textContent = file.name;
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.style.display = 'block';
                    removeButton.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('remove-image').addEventListener('click', function() {
            const fileInput = document.getElementById('product-image');
            const fileName = document.getElementById('file-name');
            const preview = document.getElementById('image-preview');
            const container = document.getElementById('image-preview-container');
            const removeButton = document.getElementById('remove-image');

            fileInput.value = '';
            fileName.textContent = 'Choose file';
            preview.src = '#';
            container.style.display = 'none';
            removeButton.style.display = 'none';
        });

        document.getElementById('remove-image').addEventListener('mouseover', function() {
            this.style.background = '#c82333';
        });

        document.getElementById('remove-image').addEventListener('mouseout', function() {
            this.style.background = '#dc3545';
        });

        // Handle category select color
        const categorySelect = document.getElementById('category');
        categorySelect.style.color = categorySelect.value === '' ? '#6c7293' : 'white';
        categorySelect.addEventListener('change', function() {
            this.style.color = this.value === '' ? '#6c7293' : 'white';
        });
    </script>
  </body>
</html>