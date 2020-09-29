@extends('dashboard.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
  <a class="btn btn-success mt-3 mb-3" href="{{ route('product.index')}}">
     Index
  </a>

  <h1>Ver Producto</h1>

  <div class="form-group">
    <label for="name">Nombre</label>
    <input readonly type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto" value="{{$product->name}}">
  </div>
  <div class="form-group">
    <label for="description">Descripcion</label>
    <textarea readonly class="form-control" id="description" rows="3" placeholder="Descripcion del producto">{{$product->description}}</textarea>
  </div>
  <div class="form-group">
    <label for="image">Imagen</label>
    <input readonly type="file" class="form-control-file" id="image" name="image" placeholder="Seleccionar foto de producto">
  </div>
  <div class="form-group">
    <label for="price">Precio</label>
    <input readonly  type="number" min="0" step="any"class="form-control" id="price" name="price" placeholder="$137.59" value="{{$product->price}}">
  </div>
  <div class="form-group">
    <label for="stock">Stock</label>
    <input readonly  type="number" min="0" class="form-control" id="stock" name="stock" placeholder="Cantidad actual" value="{{$product->stock}}">
  </div>
  <div class="form-group">
    <label for="discount">Descuento</label>
    <input readonly  type="number" min="0" class="form-control" id="discount" name="discount" placeholder="Ej: si quiere aplicar ''%20'' , solo ingrese ''20'' " value="{{$product->discount}}">
  </div>
  <div class="form-check">
    <input disabled type="checkbox" name="featured" class="form-check-input" id="featured" value="1" @if ($product->featured == 1) checked   @endif>
    <label class="form-check-label" for="featured">Promocionado</label>
  </div>
  </div>
  </section>
@endsection
