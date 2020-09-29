@extends('dashboard.layout')

@section('content')

@include('dashboard.partials.error')
<section class="content">
    <div class="container-fluid">

<a class="btn btn-success mt-3 mb-3" href="{{ route('product.index')}}">
   Index
</a>
  <h1>Crear Producto</h1>
  <form action="{{ route("product.update",$product) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @include('dashboard.product._form')
  </form>
    </div>
</section>
@endsection
