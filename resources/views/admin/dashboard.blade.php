<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add products</title>
</head>

<body>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3>Add Products</h3>
                </div>
                <div class="card-body">
                    <form action="/addproduct" method="POST" enctype="multipart/form-data" class="form-horizontal"
                        role="form">
                        @csrf

                        <div class="form-group mb-2">
                            <label>Name</label>
                            <div class="col-12">
                                <input type="text" name="name" placeholder="Enter product Name"
                                    class="form-control" value="{{ old('name') }}" autofocus>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label>Price</label>
                            <div class="col-12">
                                <input type="text" name="price" placeholder="Enter price" value="{{ old('price') }}" class="form-control">
                                @if ($errors->has('price'))
                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label>Details</label>
                            <div class="col-12">
                                <input type="text" name="details" placeholder="Enter details" value="{{ old('details') }}" class="form-control">
                                @if ($errors->has('details'))
                                    <span class="text-danger">{{ $errors->first('details') }}</span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label>Select Tyepe</label>
                            <div class="col-12">
                                <select class="form-control" name="product_type" >
                                    <option value="">-- Select Catagory--</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Beauty">Beauty</option>
                                    <option value="Kitchen">Kitchen</option>
                                    <option value="Womens_kurtis">Women's kurtis</option>
                                </select>
                                @if ($errors->has('product_type'))
                                    <span class="text-danger">{{ $errors->first('product_type') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Image</label>
                            <div class="col-12">
                                <input type="file" name="product_img" placeholder="Enter details"
                                    class="form-control">
                                @if ($errors->has('product_img'))
                                    <span class="text-danger">{{ $errors->first('product_img') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
