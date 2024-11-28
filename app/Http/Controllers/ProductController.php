<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Show the product list.
     *
     * @return View
     */
    public function index(): View
    {
        // Get all products and paginate
        $products = Product::latest()->paginate(10);

        // Return the index view with products
        return view('products.index', compact('products'));
    }

    /**
     * Show the form to create a new product.
     *
     * @return View
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a new product in the database.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        // Handle the image upload
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/products'), $imageName);

        // Create the product
        Product::create([
            'title'         => $request->get('title'),
            'description'   => $request->get('description'),
            'price'         => $request->get('price'),
            'stock'         => $request->get('stock'),
            'image'         => $imageName
        ]);

        // Redirect to the products index with a success message
        return redirect()->route('products.index')->with('success', 'Product successfully created!');
    }

    /**
     * Show the details of a product.
     *
     * @param  string  $id
     * @return View
     */
    public function show(string $id): View
    {
        // Find the product by ID or fail
        $product = Product::findOrFail($id);

        // Return the product detail view
        return view('products.show', compact('product'));
    }

    /**
     * Show the form to edit a product.
     *
     * @param  string  $id
     * @return View
     */
    public function edit(string $id): View
    {
        // Get the product by ID or fail
        $product = Product::findOrFail($id);

        // Return the edit view with the product data
        return view('products.edit', compact('product'));
    }

    /**
     * Update an existing product in the database.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // Validate the incoming request data
        $request->validate([
            'image'         => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);

        // Check if a new image has been uploaded
        if ($request->hasFile('image')) {
            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/products'), $imageName);

            // Delete the old image if it exists
            if ($product->image && Storage::exists('public/products/' . $product->image)) {
                Storage::delete('public/products/' . $product->image);
            }

            // Update the product with the new image
            $product->update([
                'image'         => $imageName,
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);
        } else {
            // Update product data without changing the image
            $product->update([
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);
        }

        // Redirect to the product index page with a success message
        return redirect()->route('products.index')->with('success', 'Product successfully updated!');
    }

    /**
     * Delete a product from the database.
     *
     * @param  string  $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        // Find the product by ID or fail
        $product = Product::findOrFail($id);

        // Delete the product image if it exists
        if ($product->image && Storage::exists('public/products/' . $product->image)) {
            Storage::delete('public/products/' . $product->image);
        }

        // Delete the product from the database
        $product->delete();

        // Redirect to the product index page with a success message
        return redirect()->route('products.index')->with('success', 'Product successfully deleted!');
    }
}
