<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ControllerHelper;
use App\Helpers\Helper;
use App\Models\Product;
use App\Models\Size;
use App\Models\Type;
use App\Services\MainService;
use App\Services\ProductService;
use Illuminate\Http\Request;

/*
 * Describes actions for Products in Admin Panel
 * */

class StoreController extends AdminController
{
    protected ProductService $productService;

    public function __construct(ProductService $productService, MainService $mainService)
    {
        parent::__construct($mainService);
        $this->modelName = "products";
        $this->productService = $productService;
    }

    public function createProduct()
    {
        $types = Type::all();
        $sizes = Size::all();

        return $this->proccessView('admin.products.create', array(
            "types" => $types,
            "sizes" => $sizes
        ));
    }

    public function editProduct($product_id)
    {
        $product = Product::find($product_id);
        $types = Type::all();
        $sizes = Size::all();

        return $this->proccessView('admin.products.edit', array(
            "product" => $product,
            "types" => $types,
            "sizes" => $sizes,
        ));
    }

    public function storeProduct(Request $request)
    {
        $images = [];

        if ($files = $request->file('image')) {
            $images = Helper::upload_image($files);
        }

        $processed = ControllerHelper::addOnlyExists($request->all());
        $sizeArray = [];
        foreach ($processed['sizes'] as $size) {
            $sizeItem['size_id'] = $size;
            $sizeItem['count'] = $processed['count-size-' . $size] ?? 0;
            array_push($sizeArray, $sizeItem);
        }

        $newProduct = array_merge(
            $processed,
            ['images' => $images, 'sizes' => $sizeArray],
        );

        $this->productService->store($newProduct);

        return redirect()->route("user.admin.index", "products")
            ->with("message", "Новий товар створено");
    }

    public function updateProduct(Request $request, $product_id)
    {
        $images = [];

        if ($files = $request->file('image')) {
            $images = Helper::upload_image($files, Product::find($product_id));
        }

        $processed = ControllerHelper::addOnlyExists($request->all());
        $sizeArray = [];

        foreach ($processed['sizes'] as $size) {
            $sizeItem['size_id'] = $size;
            $sizeItem['count'] = $processed['count-size-' . $size] ?? 0;
            array_push($sizeArray, $sizeItem);
        }

        $updatedProduct = array_merge($processed,
            [
                'images' => $images,
                'sizes' => $sizeArray,
                'product_id' => $product_id
            ]
        );

        $this->productService->update($updatedProduct);

        return redirect()->route("user.admin.index", "products")
            ->with("message", "Зміни збереженні");
    }

    public function deleteProduct($id)
    {
        $this->productService->delete($id);

        return redirect()->back()
            ->with("message", "Товар видалено");
    }

}
