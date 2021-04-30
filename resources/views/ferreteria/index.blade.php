@extends('partials/layout')

@section('content')
        <h1 class="h3 mb-0 text-gray-800 font-size-xs-3 ml-3">Productos de ferretería</h1>
        @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2 mx-4" role="alert">
                        {!! \Session::get('success') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
        @endif
        <div class="mt-4 d-flex">
                @if(count($products) > 0)
                        <div class="d-flex w-100 flex-wrap parent-products">
                                @foreach($products as $product)        
                                <div class="card size-card-product d-flex flex-column align-items-center mr-2 position-relative">
                                        <form id="form_delete_{{$product->id}}" action="{{ url('ferreteria/'.$product->id) }}" method="POST" class="position-absolute" style="right: 7px; top: 7px">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}    
                                                <input type="hidden" id="product_id" value="{{$product->id}}">   
                                                <button type="button" class="border-0 bg-white delete_product">
                                                        <i class="fas fa-trash-alt text-danger"></i>
                                                </button> 
                                        </form>        
                                        <img class="card-img-top w-75" loading="lazy" height="150px" src="{{asset('/img/products/'.$product->images[0]->image)}}" alt="Card image cap">
                                        <div class="card-body d-flex flex-column align-items-center fs-14">
                                                <span class="text-dark">{{$product->name}}</span>   
                                                <span class="text-dark">Precio venta: <b class="text-bold text-success">${{number_format($product->sale_price)}}</b></span>   
                                                <span class="text-dark">Precio compra: <b class="text-bold text-success">${{number_format($product->purchase_price)}}</b></span>
                                                <div class="mt-3">
                                                        <a href="#" class="btn btn-primary" data-target="#detalle_product-{{$product->id}}" data-toggle="modal" id="detail_product">Detalles</a>
                                                        <a href="ferreteria/{{$product->id}}/edit" class="btn btn-primary">Editar</a>
                                                </div>
                                        </div>
                                </div>

                                <div class="modal fade" id="detalle_product-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="detalle_product" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">{{$product->name}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">
                                                                <div>   
                                                                        <div class="owl-carousel owl-theme">
                                                                                @foreach($product->images as $image)
                                                                                <div class="item w-100">
                                                                                        <img style="width: 70%!important; margin: 0 auto" src="{{asset('img/products/'.$image->image)}}" alt="">
                                                                                </div>
                                                                                @endforeach
                                                                        </div>

                                                                        <div class="d-flex flex-column align-items-center">
                                                                             <p style="font-size: 20px; word-break: break-all">{{$product->description != "" ? $product->description : "Sin descripción"}}</p>   
                                                                             <span class="text-dark">Precio venta: <b class="text-bold text-success">${{number_format($product->sale_price)}}</b></span>   
                                                                                <span class="text-dark">Precio compra: <b class="text-bold text-success">${{number_format($product->purchase_price)}}</b></span>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                @endforeach
                        </div>
                @else
                        <div class="d-flex flex-column align-items-center cont-no-products">
                                <span class="text-danger">No hay productos creados</span>
                                <a href="/ferreteria/create">Crear uno</a>
                        </div>
                @endif
        </div>
@endsection