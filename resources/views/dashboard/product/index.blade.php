@extends('dashboard.layout')

@section('content')

@include('dashboard.partials.error')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Productos</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">{{ helpController()." - ".helpAction() }}</a></li>
          <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="container-fluid">

<a class="btn btn-success mt-3 mb-3" href="{{ route('product.create')}}">
   Crear
</a>
<table class="table table-hover table-striped text-center ">
  <thead class="thead-dark ">
    <tr>
      <th scope="col">Imagen</th>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Tipo</th>
      <th scope="col">Precio</th>
      <th scope="col">Stock</th>
      <th scope="col">Descuento</th>
      <th scope="col">Promocionado</th>
      <th scope="col">Creado</th>
      <th scope="col">Modificado</th>
      <th scope="col">Acciones </th>
    </tr>
  </thead>
  <tbody>
    @forelse ($products as $product )
      <tr>
        <td scope="col"><img style="height: 20px;" src="{{ asset("/storage/product/$product->image") }}" alt="img"></td>
        <th scope="col">{{$product->id}}</th>
        <td class="text-left" scope="col">{{$product->name}}</td>
        <td scope="col">{{$product->fk_type}}</td>
        <td scope="col">{{$product->price}}</td>
        <td scope="col">{{$product->stock}}</td>
        <td scope="col">{{$product->discount}}</td>
        <td scope="col">{{$product->featured}}</td>
        <td scope="col">{{$product->created_at->format('d-m-Y')}}</td>
        <td scope="col">{{$product->updated_at->format('d-m-Y')}}</td>
        <td scope="col">
          <div class="row">
            <a type="button" class="btn btn-sm mr-1 btn-info" href="{{ route('product.show',$product)}}">
              Ver
            </a>
            <a type="button" class="btn btn-sm mr-1 btn-warning" href="{{ route('product.edit',$product)}}">
              Editar
            </a>
            @can('destroy_products')
              <button class="btn btn-sm mr-1 btn-danger"  data-toggle="modal" data-target="#deleteModal" data-id ="{{ $product->id }}" > Eliminar</button>
            @else
            @endcan
          </div>
        </td>

      </tr>
    @empty
      <tr>
        <th colspan="9">No hay datos cargados</th>
      </tr>
    @endforelse
  </tbody>
</table>
{{ $products->links() }}


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> ¿ Desea eliminar el registro ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form id="formDelete"  data-action="{{ route('product.destroy',0)}}" method="post">
          @method('DELETE')
          @csrf
          <button  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="btn mr-1 btn-danger"  type="submit" > Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>

</div><!-- /.container-fluid -->
</section>


<script type="text/javascript">
window.onload = function () {
  $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var id = button.data('id'); // Extract info from data-* attributes
    var dataAction = $('#formDelete').attr('data-action').slice(0,-1);
    var url = dataAction + id;
     $('#formDelete').attr('action',url);
    // console.log(url );
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Eliminar registro: ' + id)
  });
}
</script>


@endsection
