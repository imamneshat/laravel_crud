
        @include('products.nav')

        @if($message = Session::get('sucess'))
            <div class="alert alert-sucess alert-block"> 
                <strong>{{$message}}</strong>
            </div>
        @endif
        <div class="container">
            <div class="row justify-content-center">
                <h1>Edit Prodcust {{$product->name}}</h1>  
                <div class="col-md-8">
                    <div class="card p-3">
                        <div class="card-body">
                            <form method="POST" action="/product/{{$product->id}}/update" enctype="multipart/form-data">
                                @csrf 
                                @method('PUT')
                                <div class="form-group mt-3">
                                    <label for="exampleInputText">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputText" aria-describedby="" placeholder="Enter Name" value="{{ old('name', $product->name)}}"/>
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleInputdescription">Description</label>
                                    <textarea class="form-control" name="description" rows="4">{{ old('description', $product->description)}}</textarea>
                                    @if($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description')}}</span>
                                    @endif
                                </div>

                                <div class="form-group mt-3">
                                    <!-- <img src="{{$product->image}}" alt="product" class="" width="50" height="50"/> -->
                                    <label for="exampleInputimage">Photo</label>
                                    
                                    <input type="file" name="image" class="form-control" id="exampleInputimage"/>
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image')}}</span>
                                    @endif
                                </div>
                                
                                <button type="submit" class="btn btn-dark mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('products.footter')

