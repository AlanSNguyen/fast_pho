<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Http\Requests\SubProduct\StoreRequest;
use App\Http\Requests\SubProduct\UpdateRequest;
use App\Models\Product;
use App\Models\SubProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubProductController extends Controller
{
    use ResponseTrait;

    public function all($productId): \Illuminate\Http\JsonResponse
    {
        $subProducts = SubProduct::query()->where('product_id', $productId)->get();

        return $this->responseTrait('Hiển thị thành công', true, $subProducts);
    }

    public function store($productId, StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $product = Product::query()->find($productId);

            $subProduct = SubProduct::query()->create([
                'type' => $request->get('type'),
                'total' => $request->get('total'),
                'product_id' => $productId
            ]);

            $imagePath = Storage::disk('public')->putFileAs(
                "images/products/{$product->slug}/subs/{$subProduct->id}",
                $request->file('image'),
                "image.{$request->file('image')->extension()}"
            );

            $subProduct->update([
                'image' => $imagePath,
            ]);

            return $this->responseTrait('Thêm thành công', true, $subProduct);
        } catch (\Exception $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }

    public function get($productId, $id)
    {
        $subProduct = SubProduct::query()->find($id);

        return $this->responseTrait("Thành công", true, $subProduct);
    }

    public function update($productId, $id, UpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $product = Product::query()->find($productId);
            $subProduct = SubProduct::query()->find($id);
            if (is_null($subProduct)) {
                return $this->responseTrait('Sản phẩm không tồn tại');
            }
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $imagePath = Storage::disk('public')->putFileAs(
                    "images/products/{$product->slug}/subs/{$subProduct->id}",
                    $request->file('image'),
                    "image.{$request->file('image')->extension()}"
                );
                $data['image'] = $imagePath;
            }

            $subProduct->update($data);

            return $this->responseTrait("Sửa thành công", true, $subProduct);
        } catch (\Exception $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }

    public function destroy($productId, $id): \Illuminate\Http\JsonResponse
    {
        try {
            $product = Product::query()->find($productId);
            $subProduct = SubProduct::query()->find($id);

            if (!$subProduct || !$product) {
                return $this->responseTrait('Sản phẩm không tồn tại');
            }

            $subProduct->delete();
            Storage::deleteDirectory("public/images/products/{$product->slug}/subs/{$subProduct->id}");

            return $this->responseTrait('Xóa thành công', true);
        } catch (\Exception $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }
}
