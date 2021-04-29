@extends('partials/layout')

@section('content')
        <h1 class="h3 mb-0 text-gray-800 font-size-xs-3">Productos de ferretería</h1>
        <div class="mt-4 d-flex">
                @if(count($products) > 0)
                        <div class="d-flex w-100 flex-wrap parent-products">
                                @foreach($products as $product)
                                <div class="card size-card-product d-flex flex-column align-items-center mr-2">
                                        <img class="card-img-top w-75" height="150px" src="{{asset('/img/products/'.$product->images[0]->image)}}" alt="Card image cap">
                                        <div class="card-body d-flex flex-column align-items-center fs-14">
                                                <span class="text-dark">{{$product->name}}</span>   
                                                <span class="text-dark">Precio venta: <b class="text-bold text-success">${{number_format($product->sale_price)}}</b></span>   
                                                <span class="text-dark">Precio compra: <b class="text-bold text-success">${{number_format($product->purchase_price)}}</b></span>
                                                <div class="mt-3">
                                                        <a href="#" class="btn btn-primary">Detalles</a>
                                                        <a href="ferreteria/{{$product->id}}/edit" class="btn btn-primary">Editar</a>
                                                </div>
                                        </div>
                                </div>
                                @endforeach
                        </div>
                @else
                        <div class="d-flex flex-column align-items-center">
                                <span class="text-danger">No hay productos creados</span>
                                <a href="/ferreteria/create">Crear uno</a>
                        </div>
                @endif
        </div>
@endsection