<?php

namespace App\Http\Controllers;

use App\Button;
use Illuminate\Http\Request;

class ButtonController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $buttons = Button::all();
        return view('buttons.index', compact('buttons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('buttons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $request->validate(['value' => 'required', 'color' => 'required', 'link' => 'required']);
        $button = new Button(['value' => $request->get('value'), 'color' => $request->get('color'), 'link' => $request->get('link')]);
        $button->save();
        return redirect('/buttons')->with('success', 'Button saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $button = Button::find($id);
        return view('buttons.edit', compact('button'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate(['value' => 'required', 'color' => 'required', 'link' => 'required']);
        $button = Button::find($id);
        $button->value = $request->get('value');
        $button->color = $request->get('color');
        $button->link = $request->get('link');
        $button->save();
        return redirect('/buttons')->with('success', 'Button updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $button = Button::find($id);
        $button->delete();
        return redirect('/buttons')->with('success', 'Button deleted!');
    }

}
