<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withCount(['articles','authors'])->paginate(5);
        return view('cms.admin.categories.index', ['categoriesData' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cms.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name_en' => 'required|String|min:5|max:45',
            'name_ar' => 'required|String|min:5|max:45',
            'status' => 'string'
        ]);

        $category = new Category();
        $category->name_en = $request->get('name_en');
        $category->name_ar = $request->get('name_ar');
        $category->status = $request->get('status') == 'on' ? 'Visible' : 'InVisible';

        $isSaved = $category->save();
        if ($isSaved) {
            $request->session()->flash('status', 'alert-success');
            $request->session()->flash('message', 'Category created successfully');
        } else {
            $request->session()->flash('status', 'alert-danger');
            $request->session()->flash('message', 'Category create failed!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function showArticles(Request $request, $id)
    {
        $articles = Category::findOrFail($id)->articles()->with(['category', 'author'])->paginate(10);
        return view('cms.admin.articles.index', ['articles' => $articles]);
//--------------------------------------------
//        $request->request->add(['id' => $id]);
//        $request->validate(['id' => 'required|exists:categories,id|integer']);
//
//        $articles = Category::find($id)->articles()->with(['category', 'author'])->paginate(10);
//        return view('cms.admin.articles.index', ['articles' => $articles]);
//--------------------------------------------
//        $category = Category::find($id);
//        if (!is_null($category)) {
//            $articles = $category->articles()->with(['category', 'author'])->paginate(10);
//            return view('cms.admin.articles.index', ['articles' => $articles]);
//        }
//        return redirect()->back();
    }

    public function showAuthors($id){
        $authors = Category::findOrFail($id)->authors()->paginate(10);
        return view('cms.admin.authors.index', ['authorsData' => $authors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        return view('cms.admin.categories.edit', ['categoryData' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->request->add(['category_id' => $id]);
        $request->validate([
            'category_id' => 'required|exists:categories,id|integer',
            'name_en' => 'required|String|min:5|max:45',
            'name_ar' => 'required|String|min:5|max:45',
            'status' => 'string'
        ]);

        $category = Category::find($id);
        $category->name_en = $request->get('name_en');
        $category->name_ar = $request->get('name_ar');
        $category->status = $request->get('status') == 'on' ? 'Visible' : 'InVisible';
        $isUpdated = $category->save();
        if ($isUpdated) {
            return redirect()->route('categories.index');
        } else {
            echo "Category update failed";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDeleted = Category::destroy($id);
        if ($isDeleted) {
            return response()->json(['icon' => 'success', 'title' => 'Category deleted successfully']);
        } else {
            return response()->json(['icon' => 'error', 'title' => 'Category delete failed']);
        }
    }

    public function testSession(Request $request)
    {
        //ADD
        // $request->session->put('name','Laravel Course');
        //session(['name'=>'Laravel Course']);
        $request->session()->put('firstName', 'Ahmed');
        $request->session()->put('lastName', 'Mohammad');

        //GET
        // session('name');
        // session('name','Not Defined');

        // $request->session()->get('name');
        // $request->session()->get('name','Default Value');

        //ALL SESSION
        // $request->session()->forget(['name','firstName','lastName']);
        // $data =  $request->session()->all();

        //DELETE SESSION KEY
        // $value = $request->session()->pull('name');
        // $request->session()->forget('name');
        // $request->session()->forget(['name','firstName','lastName']);
        // $request->session()->flush();

        //CHECK SESSION KEY
        // $request->session()->has('Messageeee');

        $request->session()->flash('Message', 'Category Created Successfully');
        return '' . $request->session()->has('Messageeee');
        // echo('Name: '.session('nameeeeee','Not Exist'));
    }
}
