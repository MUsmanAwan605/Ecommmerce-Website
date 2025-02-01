<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Categories=Category::orderBy('id', 'desc')->paginate(15);
        return view('admin.category.index',compact('Categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Date'=>'required|date',
            'title'=>'required|string',

        ]);

         // Handle the image upload
    if (request()->hasFile('file')) {
        $file = request()->file('file');
        $filename = md5($file->getClientOriginalName()).time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/brand_img'), $filename);
    } else {
        $filename = 'Image will be here';

    }

        Category::create([
            'date'=>$request->get('Date'),
            'title'=>$request->get('title'),
            'descp'=>$request->get('descp'),
            'b_img'=>$filename
        ]);

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::findorfail($id);
        return view('admin.category.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Date'=>'required|date',
            'title'=>'required|string',
            'descp'=>'required',

        ]);
        Category::create([
            'date'=>$request->get('Date'),
            'title'=>$request->get('title'),
            'descp'=>$request->get('descp'),
        ]);

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $Category = Category::find($id);

    if ($Category) {
        $Category->delete();
        return response()->json(['message' => 'Category Deleted successfully']);
    } else {
        return response()->json(['message' => 'Category not found'], 404);
    }
}

 /**
     * Status Active and Deactivate
     */


     public function activate($id)
     {
        $Category = Category::find($id);
        $Category->status = 'active';
        $Category->save();

        return response()->json(['message' => 'Category activated successfully']);
     }

     public function deactivate($id)
     {
        $category = Category::findOrFail($id);
        $category->status = 'deactive';
        $category->save();

        return response()->json(['message' => 'Category deactivated successfully']);
     }


//      public function toggleStatus(Request $request)
// {
//     $Category = Category::find($request->id);

//     if ($Category->status == 'active') {
//         $Category->status = 'deactive';
//     } else {
//         $Category->status = 'active';
//     }

//     $Category->save();

//     return response()->json(['message' => $Category->status]);
// }

     public function search(Request $request){

        $searchQuery = $request->input('search');

        $Categories=Category::where(function($query) use ($searchQuery) {
            $query->where('title', 'LIKE',"%{$searchQuery}%");
        })->paginate(15);

        // $records = Category::where(function ($query) use ($searchQuery) {
        //     $query->where('cni_no', 'LIKE', "%{$searchQuery}%");
        // })->paginate(15);
return view('admin.category.vieww', compact('Categories', 'searchQuery'));
     }

}
