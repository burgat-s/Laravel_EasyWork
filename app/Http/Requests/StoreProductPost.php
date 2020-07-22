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
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
          'name.required' => 'El nombre es requerido.',
          'description.required' => 'La descripción es requerida.',
          'file.required' => 'La imagen es requerida.',
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
    public function rules()
    {
        return [
          "name" =>  "required|string|min:3",
          "description" => "required|string|min:3",
          "price" => "required|numeric|min:0",
          "stock" => "required|numeric|min:0",
          "discount" => "required|numeric|min:0",
          "featured" =>  "string",
          "file" => "required",
        ];
    }
}
