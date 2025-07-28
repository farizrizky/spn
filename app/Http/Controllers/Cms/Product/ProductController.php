<?php

namespace App\Http\Controllers\Cms\Product;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAdditionalInformation;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductQualityLevel;
use App\Models\QualityLevel;
use App\Models\SpecificationVariable;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'product' => Product::with('productCategory')->get(),
        ];
        return view('cms.page.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'product_category' => ProductCategory::select('id', 'name')->get(),
            'quality_levels' => QualityLevel::select('id', 'name')->get(),
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
            'product_category' => 'required|exists:product_category,id',
            'description' => 'required|string',
        ]);

        $data = $request->only(['name', 'slug', 'product_category', 'description', 'status']);
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

        if($request->quality_level) {
           foreach ($request->quality_level as $ql) {
                if(!QualityLevel::find($ql)) {
                    $newQualityLevel = QualityLevel::create(['name' => $ql]);
                    $ql = $newQualityLevel->id;
                }

                $dataQualityLevel = [
                    'product' => $createProduct->id,
                    'quality_level' => $ql,
                ];
               ProductQualityLevel::create($dataQualityLevel);
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
            'product_category' => ProductCategory::select('id', 'name')->get(),
            'quality_levels' => QualityLevel::select('id', 'name')->get(),
            'product' => $product->load(['productCategory', 'productImage', 'qualityLevel', 'productAdditionalInformation']),
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
            'product_category' => 'required|exists:product_category,id',
            'description' => 'required|string',
        ]);

        $data = $request->only(['name', 'slug', 'product_category', 'description', 'status']);
        $product->update($data);

        // Delete existing images
        $product->productImage()->delete();
        if ($request->images) {
            foreach ($request->images as $image) {
                $dataImages = [
                    'product' => $product->id,
                    'image_path' => $image,
                ];
                ProductImage::create($dataImages);
            }
        }

        // Delete existing quality levels
        $product->productQualityLevel()->delete();
        if ($request->quality_level) {
            foreach ($request->quality_level as $ql) {
                if(!QualityLevel::find($ql)) {
                    $newQualityLevel = QualityLevel::create(['name' => $ql]);
                    $ql = $newQualityLevel->id;
                }
                
                $dataQualityLevel = [
                    'product' => $product->id,
                    'quality_level' => $ql,
                ];
                ProductQualityLevel::create($dataQualityLevel);
            }
        }

        // Delete existing additional information
        $product->productAdditionalInformation()->delete();
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

        // Delete associated quality levels
        $product->productQualityLevel()->delete();

        // Finally, delete the product itself
        $product->delete();

        $notify = NotifyHelper::successfullyDeleted();
        return redirect()->route('cms.product.index')->with('notify', $notify);
    }
}
