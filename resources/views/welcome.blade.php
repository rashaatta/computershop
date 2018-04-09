<html>
    <head>
        <title>Computer Shop</title>  
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="_token" content="{{csrf_token()}}" />

        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <div class="panel panel-primary" style="    margin-top: 60px;">
                <div class="panel-heading">Products
                    <button id="btn_add" name="btn_add" class="btn btn-default pull-right" style="    margin-top: -7px;margin-right: -10px;">Add Product</button>
                </div> 
                <div class="panel-body"> 
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="products-list" name="products-list">
                            @foreach ($products as $product)
                            <tr id="product{{$product->id}}">
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->type}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->product_image}}</td>
                                <td>
                                    <button class="btn btn-warning btn-detail open_modal" value="{{$product->id}}">Edit</button>
                                    <button class="btn btn-danger btn-delete delete-product" value="{{$product->id}}">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Product</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
    <!--                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />--> 
                                <div class="form-group error">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="inputName" class="col-sm-3 control-label">Name</label>
                                        <div class="input-group col-sm-9">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign blue"></i></span>
                                            <input type="text" class="form-control has-error" id="name" name="name" placeholder="Product Name" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 ">
                                        <label for="inputType" class="col-sm-3 control-label">Type</label>
                                        <div class="input-group col-sm-9">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign blue"></i></span>
                                            <input type="text" class="form-control" id="type" name="type" placeholder="type" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="inputPrice" class="col-sm-3 control-label">Price</label>
                                        <div class="input-group col-sm-9">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-usd blue"></i></span>
                                            <input type="text" class="form-control" id="price" name="price" placeholder="price" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="catagry_name"  class="col-sm-3 control-label">Logo</label>
                                        <div class="input-group col-sm-9">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-file blue"></i></span>
                                            <input type="file" class="form-control" name="product_image" id="product_image">

                                        </div>
                                        <p id="p_product_image"></p>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                            <input type="hidden" id="product_id" name="product_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="{{asset('js/product.js')}}"></script>
    </body>
</html>