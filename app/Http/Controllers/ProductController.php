<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show(Product $product)
    {
        return Product::findOrFail($product->id);

    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        Product::create($data);

        return response()->json(['message' => 'Product created successfully'], 201);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validate([
            'article' => 'string',
            'name' => 'string',
            'unit' => 'string',
            'quantity' => 'integer',
            'price' => 'numeric',
        ]);

        $product->update($data);
        return response()->json(['message' => 'Product updated successfully']);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }

    public function uploadSecondExcel(Request $request)
    {
        try {
            // Получаем данные из второго Excel-файла
            $file = $request->file('second_excel_file');
            $data = \Excel::toArray([], $file)[0];

            // Первая строка файла должна содержать заголовки столбцов
            $headers = $data[0];

            // Индекс столбца "article"
            $articleIndex = array_search('article', $headers);

            // Если "article" не найден, выбрасываем исключение
            if ($articleIndex === false) {
                throw ValidationException::withMessages(['message' => 'Column "article" not found.']);
            }

            // Перебираем данные, начиная с первой строки (индекс 1)
            for ($i = 1; $i < count($data); $i++) {
                $rowData = $data[$i];
                $articleValue = $rowData[$articleIndex];

                // Ищем запись по полю "article"
                $product = Product::where('article', $articleValue)->first();

                if ($product) {
                    // Если запись найдена, обновляем остальные поля
                    $product->update([
                        'name' => $rowData[array_search('name', $headers)],
                        'unit' => $rowData[array_search('unit', $headers)],
                        'quantity' => $rowData[array_search('quantity', $headers)],
                        'price' => $rowData[array_search('price', $headers)],
                    ]);
                } else {
                    // Если запись не найдена, добавляем новую запись
                    Product::create([
                        'article' => $articleValue,
                        'name' => $rowData[array_search('name', $headers)],
                        'unit' => $rowData[array_search('unit', $headers)],
                        'quantity' => $rowData[array_search('quantity', $headers)],
                        'price' => $rowData[array_search('price', $headers)],
                    ]);
                }
            }

            return response()->json(['message' => 'Data updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
