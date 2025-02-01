<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\Color;
use App\Models\Category;
use App\Models\FlashSale;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlashSaleController extends Controller
{
    public function index()
    {
        $Products = FlashSale::with('category')->orderBy('id', 'desc')->paginate(15);
        return view('admin.flashsale.index', compact('Products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Sizes = Size::all();
        $category = Category::all();
        $Colors = Color::all();
        return view('admin.flashsale.add', compact('category', 'Sizes', 'Colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // use Illuminate\Support\Str;

    public function store(Request $request)
    {
        // Validation for file and other fields
        $request->validate([
            'Date' => 'required|date',
            'brand' => 'required|not_in:none',
            'Product' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'Price' => 'required|numeric|min:0',
            'Stock' => 'required|integer|min:1',
            'Description' => 'required',
            'LongDescription' => 'required',
            'Model' => 'required|max:255',
            'Delivery' => 'required|max:100',
             'Images' => 'required',
    'Images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $filenames = [];

        // Handle multiple image uploads
        if ($request->hasFile('Images')) {
            foreach ($request->file('Images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/flash_img'), $filename);
                $filenames[] = $filename; // Store the filename in the array
            }
        }

        else {

            $filenames[] = 'image will be here';
        }


        // Generate slug and ensure it is unique
        $slug = Str::slug($request->get('Product'));
        $originalSlug = $slug;
        $counter = 1;

        // Check for duplicate slug and append a number if needed
        while (FlashSale::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $price = $request->get('Price');
        $discount = $request->get('Discount_Price');
        $discount_Price = ($price * $discount) / 100;
        $finalPrice = $price - $discount_Price;

        // Create the product
        $product = FlashSale::create([
            'date' => $request->get('Date'),
            'category_id' => $request->get('brand'),
            'prod' => $request->get('Product'),
            'desc' => $request->get('Description'),
            'l_desc' => $request->get('LongDescription'),
            'prod_price' => $request->get('Price'),
            'selling_price' => $finalPrice,
            'discount_percent' => $discount,
            'slug' => $slug,
            'stock' => $request->get('Stock'),
            'prod_img' => json_encode($filenames),
            'model' => $request->get('Model'),
            'delivery' => $request->get('Delivery'),
            'size' =>   json_encode($request->size),


        ]);

        // if ($request->has('colors')) {
        //     foreach ($request->colors as $key => $color) {
        //         $product->product_colors()->create([
        //             'flash_id' => $request->id,
        //             'color_id' => $color,
        //             'qty' => $request->quantity[$color] ?? 0
        //         ]);
        //     }
        // }

        return redirect()->route('admin.sale.index')->with('success', 'Product created successfully.');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Product = FlashSale::findOrFail($id);
        $Sizes = Size::all();
        $category = Category::all();
        $images = json_decode($Product->prod_img);
        $product_color =  $Product->product_colors->pluck('color_id')->toArray();
        $Colors = Color::whereNotIn('id', $product_color)->get();
        return view('admin.flashsale.show', compact('category', 'Sizes', 'Colors', 'Product','images'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Product = FlashSale::findOrFail($id);
        // $names = $Product->pluck('prod_img');
        $images = json_decode($Product->prod_img);
        $sizes = json_decode($Product->size);
        // $Sizes = Size::all();
        $category = Category::all();
        $product_color =  $Product->product_colors->pluck('color_id')->toArray();
        $Colors = Color::whereNotIn('id', $product_color)->get();
        return view('admin.flashsale.edit', compact('category', 'sizes', 'Colors', 'Product','images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $Product = FlashSale::findOrFail($id);

        // Validation for file and other fields

        $request->validate([
            'Date' => 'required|date',
            'brand' => 'required|not_in:none',
            'Product' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'Price' => 'required|numeric|min:0',
            'Stock' => 'required|integer|min:1',
            'Description' => 'required',
            'LongDescription' => 'required',
            'Model' => 'required|max:255',
            'Delivery' => 'required|max:100',
             'Images' => 'required',
    'Images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $filenames = [];

        if ($request->hasFile('Images')) {
            foreach ($request->file('Images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/flash_img'), $filename); // Ensure the directory exists
                $filenames[] = $filename;
            }
        } else {

            $filenames = $Product->prod_img ? json_decode($Product->prod_img) : ['image will be here'];
        }




        // Generate slug and ensure it is unique
        $slug = Str::slug($request->get('Product'));
        $originalSlug = $slug;
        $counter = 1;

        // Check for duplicate slug and append a number if needed
        while (FlashSale::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }


    $originalPrice = $Product->prod_price;
    $originalDiscount = $Product->discount_percent;

    $newPrice = $request->get('Price');
    $newDiscount = $request->get('Discount_Price');

    $priceChanged = ($newPrice != $originalPrice); // True of False
    $discountChanged = ($newDiscount != $originalDiscount); // True of False

    $finalPrice = $originalPrice;

    if ($priceChanged || $discountChanged) {
        if ($priceChanged) {
            if ($discountChanged) {
                $discount_Price = ($newPrice * $newDiscount) / 100;
                $finalPrice = $newPrice - $discount_Price;
            } else {
                $discount_Price = ($newPrice * $originalDiscount) / 100;
                $finalPrice = $newPrice - $discount_Price;
            }
        } elseif ($discountChanged) {
            $discount_Price = ($originalPrice * $newDiscount) / 100;
            $finalPrice = $originalPrice - $discount_Price;
        }
    }

    // Now update the product record only if changes were made
    $Product->update([
        'date' => $request->get('Date'),
        'category_id' => $request->get('brand'),
        'prod' => $request->get('Product'),
        'desc' => $request->get('Description'),
        'l_desc' => $request->get('LongDescription'),
        'prod_price' => $priceChanged ? $newPrice : $originalPrice,  // Update price only if changed
        'selling_price' => $priceChanged || $discountChanged ? $finalPrice : $Product->selling_price,  // Update selling price if price or discount changed
        'discount_percent' => $discountChanged ? -$newDiscount : $originalDiscount,  // Update discount only if changed
        'slug' => $slug,
        'stock' => $request->get('Stock'),
        'prod_img' => json_encode($filenames),
        'model' => $request->get('Model'),
        'color' => $request->get('Color'),
        'delivery' => $request->get('Delivery'),
        'size' => json_encode($request->size),  // Assuming size is an array
    ]);








            if ($request->has('colors')) {
                foreach ($request->colors as $key => $color) {
                    $Product->product_colors()->create([
                        'product_id' => $request->id,
                        'color_id' => $color,
                        'qty' => $request->quantity[$color] ?? 0
                    ]);
                }
            }


            return redirect()->route('admin.sale.index');
        }
        /**
         * Remove the specified resource from storage.
         */
        public function destroy($id)
        {

            $Product = FlashSale::findOrFail($id);
            $Product->delete();
            return response()->json(['message' => 'Product Deleted successfully']);

        }
        public function ProductColorQtyUpdate(Request $request, string $productId, string $colorId)
        {
            // Find the product using the product ID
            $product = FlashSale::findOrFail($productId);

            // Find the specific product color using the color ID
            $productColor = $product->product_colors()->findOrFail($colorId);

            // Update the quantity
            $productColor->update([
                'qty' => $request->qty,
            ]);

            return response()->json(['message' => 'Product Color Quantity updated']);
        }

        public function delete($productId, $colorId)
    {
        // Check if the product exists
        $product = FlashSale::findOrFail($productId);

        // Find the product color by ID
        $productColor = $product->colors()->findOrFail($colorId);

        // Delete the product color
        $productColor->delete();



        return response()->json(['message' => 'Color deleted successfully.']);
    }
    public function activate($id)
        {
            $Category = FlashSale::find($id);
            $Category->status = 'active';
            $Category->save();

            return response()->json(['message' => 'Category activated successfully']);
        }

        public function deactivate($id)
        {
            $category = FlashSale::findOrFail($id);
            $category->status = 'deactive';
            $category->save();

            return response()->json(['message' => 'Category deactivated successfully']);
        }

}
