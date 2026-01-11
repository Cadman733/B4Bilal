<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display the public Marketplace (Buy page).
     */
    public function index()
    {
        // Fetch all products with their associated user data to prevent N+1 issues
        $products = Product::with('user')->latest()->get();
        return view('buy', compact('products'));
    }

    /**
     * Show the form for selling a new item.
     */
    public function create()
    {
        return view('sell');
    }

    /**
     * Store the new item in the database.
     */
    public function store(Request $request)
    {
        // 1. Validation
        $request->validate([
            'name'           => 'required|string|max:255',
            'description'    => 'required|string',
            'price'          => 'required|numeric|min:0',
            'category'       => 'required|string',
            'contact_number' => 'required|string',
            'picture'        => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // 2. Handle Image Upload
        $imageName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('uploads/products'), $imageName);

        // 3. Create the record
        Product::create([
            'user_id'        => Auth::id(),
            'name'           => $request->name,
            'description'    => $request->description,
            'price'          => $request->price,
            'category'       => $request->category,
            'contact_number' => $request->contact_number,
            'picture'        => $imageName,
        ]);

        // 4. Redirect back with a custom session key for the SweetAlert popup
        return redirect()->route('products.create')->with('item_uploaded', true);
    }

    /**
     * Display the user's personal dashboard to manage their own listings.
     */
    public function manage()
    {
        $products = Product::where('user_id', Auth::id())->latest()->get();
        return view('manage', compact('products'));
    }

    /**
     * Show the edit form for a specific item.
     */
    public function edit(Product $product)
    {
        // Security: Ensure only the owner can edit
        if (Auth::id() !== $product->user_id) {
            abort(403, 'Unauthorized action.');
        }
        return view('edit', compact('product'));
    }

    /**
     * Update an existing item in the database.
     */
    public function update(Request $request, Product $product)
    {
        // Security check
        if (Auth::id() !== $product->user_id) {
            abort(403);
        }

        $request->validate([
            'name'           => 'required|string|max:255',
            'description'    => 'required',
            'price'          => 'required|numeric|min:0',
            'category'       => 'required|string',
            'contact_number' => 'required',
            'picture'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->contact_number = $request->contact_number;

        // Update image if a new one is provided
        if ($request->hasFile('picture')) {
            // Remove old image file from storage
            if (File::exists(public_path('uploads/products/' . $product->picture))) {
                File::delete(public_path('uploads/products/' . $product->picture));
            }
            
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads/products'), $imageName);
            $product->picture = $imageName;
        }

        $product->save();
        
        // Redirect to management page with success message
        return redirect()->route('products.manage')->with('success', 'Item updated successfully!');
    }

    /**
     * Remove an item from the listing.
     */
    public function destroy(Product $product)
    {
        // Security check
        if (Auth::id() !== $product->user_id) {
            abort(403);
        }

        // Delete the image file from the folder
        if (File::exists(public_path('uploads/products/' . $product->picture))) {
            File::delete(public_path('uploads/products/' . $product->picture));
        }

        $product->delete();
        return back()->with('success', 'Item has been removed.');
    }
}