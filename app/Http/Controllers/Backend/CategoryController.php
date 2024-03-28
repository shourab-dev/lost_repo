<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\MediaUploader;
use App\Helpers\SlugGenerator;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    use SlugGenerator, MediaUploader;


    public function category()
    {

        $categorys = Category::with('subcategories')->latest()->paginate(30);

        $parentCategories  = $categorys->where('category_id', null)->flatten();

        return view('backend.category.index', compact('categorys', 'parentCategories'));
    }



    // STORE DATA.
    public function categoryInsert(Request $request)
    {
        $request->validate([
            'icon' => "mimes:png,jpg"
        ]);

        $slug = $this->createSlug(Category::class, $request->category);
        if ($request->hasFile('icon')) {

            $iconPath  = $this->uploadSingleMedia($request->icon, $slug, 'category');
        }
        $categoryStore = new Category();
        $categoryStore->category = $request->category;
        $categoryStore->category_id = $request->category_id;
        $categoryStore->slug = $slug;
        $categoryStore->icon = $request->hasFile('icon') ? $iconPath : null;
        $categoryStore->save();
        return back();
    }


    // EDIT
    public function categoryEdit($id)
    {
        $categorys = Category::with('subcategories')->latest()->paginate(30);

        $parentCategories  = $categorys->where('category_id', null)->flatten();
        $findCategory = $categorys->where('id', $id)->first();

        return view('backend.category.index', compact('categorys', 'findCategory', 'parentCategories'));
    }



    // UPDATE
    public function categoryUpdate(Request $request, $id)
    {
        $slug = $this->createSlug(Category::class, $request->category);
        if ($request->hasFile('icon')) {

            $iconPath  = $this->uploadSingleMedia($request->icon, $slug, 'category', $request->old);
        }
        $categoryStore = Category::find($id);
        $categoryStore->category = $request->category;
        $categoryStore->category_id = $request->category_id;
        $categoryStore->slug = $slug;
        $categoryStore->icon = $request->hasFile('icon') ? $iconPath : null;
        $categoryStore->save();
        
        return back();
        // dd($updateCategory);

    }



    // DELETE
    public function categoryDelete($id)
    {
        Category::find($id)->delete();
        return back();
    }
}
