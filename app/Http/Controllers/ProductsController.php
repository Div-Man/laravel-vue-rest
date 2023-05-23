<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller {

    public function index(Request $request) {
        $sort = $request->query('sort') ?? 'asc';

        return ProductResource::collection(Products::orderBy('created_at', $sort)->paginate(5));
    }

    public function create(Request $request) {
        return view('product.edit');
    }

    public function store(Request $request) {

        $rules = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ];

        $messages = [
            'name.required' => 'Введите название',
            'description.required' => 'Введите текст',
            'price.required' => 'Введите цену',
            'price.numeric' => 'Допускаются только цифры',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $product_name = $request->input('name');
        $product_price = $request->input('price');
        $product_description = $request->input('description');

        $product = Products::create([
                    'name' => $product_name,
                    'price' => $product_price,
                    'description' => $product_description,
        ]);
        return response()->json([
                    'data' => new ProductResource($product)
                        ], 201);
    }

}
