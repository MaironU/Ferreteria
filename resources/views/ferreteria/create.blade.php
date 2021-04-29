@extends('partials/layout')

@section('content')
    <div class="col-lg-8" style="margin: 0 auto">
        <div class="p-3">
            <div class="text-center d-flex justify-content-end">
                <a href="/ferreteria">Productos</a>
            </div>
            @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    {!! \Session::get('success') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Crear producto</h1>
            </div>
            <form class="user" method="POST" action="{{ url('ferreteria') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text"
                        id="name" class="form-control form-control-user @error('name') is-invalid @enderror" aria-describedby="nameHelp"
                        placeholder="Nombre del producto" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <textarea type="description" class="form-control form-control-user @error('description') is-invalid @enderror"
                        id="description" placeholder="Descripción del producto" name="description" autocomplete="current-description" value="{{ old('description') }}"></textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <input type="number" class="form-control form-control-user @error('sale_price') is-invalid @enderror"
                        id="sale_price" placeholder="Precio de venta" name="sale_price" autocomplete="current-sale_price" value="{{ old('sale_price') }}">

                        @error('sale_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <input type="number" class="form-control form-control-user @error('purchase_price') is-invalid @enderror"
                        id="purchase_price" placeholder="Precio de compra" name="purchase_price" autocomplete="current-purchase_price" value="{{ old('purchase_price') }}">

                        @error('purchase_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>  
                <!--<div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                            Me</label>
                    </div>
                </div>-->
                <div class="mb-4">
                    <div class="text-center mb-3">
                        <h1 class="h4 text-gray-900 mb-4">Imágenes del producto</h1>
                        <input type="file" id="images_products" name="images_products[]" multiple accept="image/png, image/jpeg" value="{{ old('images_products') }}">
                    </div>
                    @error('images_products')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="d-flex flex-wrap justify-content-center" id="products_images">
                        
                    </div>
                </div>


                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Crear producto   
                </button>
                    <!--<a href="index.html" class="btn btn-google btn-user btn-block">
                    <i class="fab fa-google fa-fw"></i> Login with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                </a>-->
            </form> 
            <!--<div class="text-center">
                <a class="small" href="register.html">Create an Account!</a>
            </div>-->
        </div>
    </div>
@endsection