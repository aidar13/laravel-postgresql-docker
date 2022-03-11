<?php

namespace App\Http\Controllers;

use App\Jobs\ProductCreated;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::whereDeletedAt(null)
            ->orderBy('id', 'DESC')
            ->paginate(5);

        return view('admin.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:10'],
            'article' => [
                'required', Rule::unique('products', 'article'),
            ]
        ]);

        $product = new Product();
        $product->name = $request->get('name');
        $product->article = $request->get('article');
        $product->data = json_encode($request->get('data'));
        $product->status = $request->get('status');
        $product->save();

        ProductCreated::dispatch($product);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::whereId($id)
            ->whereDeletedAt(null)
            ->firstOrFail();

        return view('admin.pages.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::whereId($id)
            ->whereDeletedAt(null)
            ->firstOrFail();

        return view('admin.pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        $product = Product::whereId($id)
            ->whereDeletedAt(null)
            ->firstOrFail();

        $this->validate($request, [
            'name' => ['required', 'min:10'],
            'article' => [
                'required', Rule::unique('products', 'article')->ignore($id),
            ]
        ]);

        $product->name = $request->get('name');
        $product->article = $request->get('article');
        $product->data = json_encode($request->get('data'));
        $product->status = $request->get('status');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        $product = Product::whereId($id)
            ->whereDeletedAt(null)
            ->firstOrFail();

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
