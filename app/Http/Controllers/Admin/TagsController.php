<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();                     //проходження запиту через валідатор, чи правильні поля передаються
        Tag::firstOrCreate($data);                         //занесення унікальної категорії в базу даних
        return redirect()->route('tags.index');       //повернення сторінки створення категорії після успішного завершення запиту
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();             //проходження запиту через валідатор, чи правильні поля передаються
        $tag->update($data);                      //редагування окремої категорії зарезервованим методом update() з моделі Laravel
        return redirect()->route('tags.show', compact('tag'));  //повернення сторінки створення категорії після успішного завершення запиту
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();                                     //видаляю вказаний тег встроєним методом з Моделі
        return redirect()->route('tags.index');   //після видалення тегу в загальний список тегів
    }
}
