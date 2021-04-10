<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
          'name.required' => 'El nombre es requerido.',
          'description.required' => 'La descripción es requerida.',
          'image.image' => 'La imagen debe tener un formato jpeg, png, jpg, gif o svg.',
          'image.mimes' => 'La imagen debe tener un formato jpeg, png, jpg, gif o svg.',
          'image.max' => 'La imagen debe tener un tamaño maximo de 2Mb.',
          'price.required' => 'El precio es requerido.',
          'stock.required' => 'El Stock es requerido.',
          'discount.required' => 'El descuento es requerido.',
          'name.min' => 'El nombre debe tener al menos 3 caracteres.',
          'description.min' => 'La descripción debe tener al menos 3 caracteres.',
          'stock.numeric' => 'El stock debe ser solo numeros.',
          'discount.numeric' => 'El descuento debe ser solo numeros.',
          'price.numeric' => 'El precio debe ser solo numeros.',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
          "name" =>  "required|string|min:3",
          "description" => "required|string|min:3",
          "price" => "required|numeric|min:0",
          "stock" => "required|numeric|min:0",
          "discount" => "required|numeric|min:0",
          "featured" =>  "boolean",
          "image" => "file|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
        ];
    }
}
