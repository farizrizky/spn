<?php

namespace App\Http\Controllers\Cms\Product;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAdditionalInformation;
use App\Models\ProductImage;
use App\Models\ProductType;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'product' => Product::with('productType')->get(),
        ];
        return view('cms.page.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'type' => Type::select('id', 'name')->where('is_active', '1')->get(),
        ];
        return view('cms.page.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'required|string|max:150|unique:product,slug',
            'description' => 'required|string',
            'status' => 'required|in:draft,published',
            'meta_description' => 'nullable|string|max:160',
        ]);

        $data = $request->only(['name', 'slug', 'description', 'status', 'meta_description']);
        $createProduct = Product::create($data);

        if ($request->images) {
            foreach ($request->images as $i) {
                $dataImages = [
                    'product' => $createProduct->id,
                    'image_path' => $i,
                ];
                ProductImage::create($dataImages);
            }
        }

        if($request->type) {
           foreach ($request->type as $t) {
                if(!Type::find($t)) {
                    $newType = Type::create([
                        'name' => $t,
                        'slug' => Str::slug($t),
                    ]);
                    $t = $newType->id;
                }
                $dataType = [
                    'product' => $createProduct->id,
                    'type' => $t,
                ];
               ProductType::create($dataType);
            }
        }

        if ($request->additional_information) {
            foreach ($request->additional_information as $key => $info) {
                $dataAdditionalInformation = [
                    'product' => $createProduct->id,
                    'title' => $info['title'],
                    'information' => $info['information'],
                ];
                ProductAdditionalInformation::create($dataAdditionalInformation);
            }
        }

        $notify = NotifyHelper::successfullyCreated();
        return redirect()->route('cms.product.index')->with('notify', $notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        if (!$product) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.product.index')->with('notify', $notify);
        }

        $data = [
            'type' => Type::select('id', 'name')->where('is_active', '1')->get(),
            'product' => $product->load(['productType', 'productImage', 'productAdditionalInformation']),
        ];
        return view('cms.page.product.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if (!$product) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.product.index')->with('notify', $notify);
        }

        $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'required|string|max:150|unique:product,slug,' . $product->id,
            'description' => 'required|string',
            'status' => 'required|in:draft,published',
            'meta_description' => 'nullable|string|max:160',
        ]);

        $data = $request->only(['name', 'slug', 'description', 'status', 'meta_description']);
        $product->update($data);

        // Delete existing images
        ProductImage::where('product', $product->id)->delete();
        if ($request->images) {
            foreach ($request->images as $image) {
                $dataImages = [
                    'product' => $product->id,
                    'image_path' => $image,
                ];
                ProductImage::create($dataImages);
            }
        }

        // Delete existing types
        ProductType::where('product', $product->id)->delete();
        if ($request->type) {
            foreach ($request->type as $t) {
                if(!Type::find($t)) {
                    $type = Type::create([
                        'name' => $t,
                        'slug' => Str::slug($t),
                    ]);
                    $t = $type->id;
                }

                $dataType = [
                    'product' => $product->id,
                    'type' => $t,
                ];
                ProductType::create($dataType);
            }
        }

        // Delete existing additional information
        ProductAdditionalInformation::where('product', $product->id)->delete();
        if ($request->additional_information) {
            foreach ($request->additional_information as $key => $info) {
                $dataAdditionalInformation = [
                    'product' => $product->id,
                    'title' => $info['title'],
                    'information' => $info['information'],
                ];
                ProductAdditionalInformation::create($dataAdditionalInformation);
            }
        }

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->route('cms.product.index')->with('notify', $notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (!$product) {
            $notify = NotifyHelper::notFound();
            return redirect()->route('cms.product.index')->with('notify', $notify);
        }

        // Delete associated images
        $product->productImage()->delete();

        // Delete associated types
        $product->productType()->delete();

        // Delete associated additional information
        $product->productAdditionalInformation()->delete();

        // Finally, delete the product itself
        $product->delete();

        $notify = NotifyHelper::successfullyDeleted();
        return redirect()->route('cms.product.index')->with('notify', $notify);
    }
}
