    @csrf
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto" value="{{old('name',$product->name)}}">
  </div>
  <div class="form-group">
    <label for="description">Descripcion</label>
    <textarea class="form-control" id="descriptionContent" name="description" rows="3" placeholder="Descripcion del producto">{{old('description',$product->description)}}</textarea>
  </div>
  <div class="form-group">
    @if ($product->image)
      <img style="height: 20px;" src="{{ asset("/storage/product/$product->image") }}" alt="img">
    @endif
    <label for="image">Imagen</label>
    <input type="file" class="form-control-file" id="image" name="image" placeholder="Seleccionar foto de producto">
  </div>
  <div class="form-group">
    <label for="price">Precio</label>
    <input  type="number" min="0" step="any"class="form-control" id="price" name="price" placeholder="$137.59" value="{{old('price',$product->price)}}">
  </div>
  <div class="form-group">
    <label for="stock">Stock</label>
    <input  type="number" min="0" class="form-control" id="stock" name="stock" placeholder="Cantidad actual" value="{{old('stock',$product->stock)}}">
  </div>
  <div class="form-group">
    <label for="discount">Descuento</label>
    <input  type="number" min="0" class="form-control" id="discount" name="discount" placeholder="Ej: si quiere aplicar ''%20'' , solo ingrese ''20'' " value="{{old('discount',$product->discount)}}">
  </div>
  <div class="form-check">
    <input type="checkbox" name="featured" class="form-check-input" id="featured" value="1" @if (old('featured')== 1 || $product->featured == '1' ) checked @endif>
    <label class="form-check-label" for="featured">Promocionado</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
