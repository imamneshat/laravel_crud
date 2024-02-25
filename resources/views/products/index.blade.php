
        @include('products.nav')
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1>PRODUCTS</h1>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4" style="margin-top: 6px;">
                    <a class="btn btn-info" href="product/create">CREATE NEW PRODUCT</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sr no.</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Product</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td><img src="products/{{$product->image}}" alt="product" class="rounded-circle" width="50" height="50"/></td>
                            <td>
                                <a href="product/{{$product->id}}/edit" ><i class="fa fa-pen"></i></i></a>&nbsp 
                                <a href="product/{{$product->id}}/delete" ><i class='fas fa-trash'></i></a>
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('products.footter')


