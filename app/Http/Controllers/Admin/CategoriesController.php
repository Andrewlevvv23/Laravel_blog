<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();                          //проходження запиту через валідатор, чи правильні поля передаються
        Category::firstOrCreate( $data);                        //занесення унікальної категорії в базу даних
        return redirect()->route('categories.index');  //повернення сторінки створення категорії після успішного завершення запиту
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();                                                       //проходження запиту через валідатор, чи правильні поля передаються
        $category->update($data);                                                            //редагування окремої категорії зарезервованим методом update() з моделі Laravel
        return redirect()->route('categories.show', compact('category'));  //повернення сторінки створення категорії після успішного завершення запиту
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();                                     //видаляю вказану категорію встроєним методом з Моделі
        return redirect()->route('categories.index');   //після видалення повертаю загальний список категорій
    }
}
