<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('menus.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'max:6',
            'nama' => 'required|max:255',
            'rekomendasi' => 'required|integer|max:2',
            'harga' => 'required|min:0|max:9999999'
        ]);

        $menu = Menu::create($validateData);

        $menu->save();

        $request->session()->flash('success', "Successfully adding {$validateData['nama']}!");
        return redirect()->route('menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        // $nextId = Menu::orderBy('id', 'desc')->first()->id + 1;
        $validateData = $request->validate([
            'id' => 'max:6',
            'nama' => 'required|max:255',
            'rekomendasi' => 'required|integer|max:2',
            'harga' => 'required|min:0|max:9999999'
        ]);

        $menu->update($validateData);

        $menu->save();

        $request->session()
            ->flash('success', "Successfully updating {$validateData['nama']}!");
        return redirect()->route('menus.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with(
            'success',
            "Successfully deleting {$menu['nama']}!"
        );
    }
}
