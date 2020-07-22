@extends('dashboard.layout')

@section('content')

@include('dashboard.partials.error')

  <h1>Crear Producto</h1>

  <form action="{{ route("product.store") }}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto">
  </div>
  <div class="form-group">
    <label for="description">Descripcion</label>
    <input type="text" class="form-control" id="description" name="description" placeholder="Descripcion del producto">
  </div>
  <div class="form-group">
  <label for="image">Imagen</label>
  <input type="file" class="form-control-file" id="image" placeholder="Seleccionar foto de producto">
  </div>
  <div class="form-group">
    <label for="price">Precio</label>
    <input  type="number" min="0" step="any"class="form-control" id="price" name="price" placeholder="$137.59">
  </div>
  <div class="form-group">
    <label for="stock">Stock</label>
    <input  type="number" min="0" class="form-control" id="stock" name="stock" placeholder="Cantidad actual">
  </div>
  <div class="form-group">
    <label for="discount">Descuento</label>
    <input  type="number" min="0" class="form-control" id="discount" name="discount" placeholder="Ej: si quiere aplicar ''%20'' , solo ingrese ''20'' ">
  </div>
  <div class="custom-control custom-checkbox">
    <input type="checkbox" name="featured" class="custom-control-input" id="featured">
    <label class="custom-control-label" for="featured">Promocionado</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
