<?php

namespace App\Http\Controllers;

use App\Category;
use App\Habbit;
use App\HabbitDate;
use App\Post;
use Illuminate\Http\Request;

class HabbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('habit.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'tags' => 'string|max:255'
        ]);



        $habbit = new Habbit();
        $habbit->category_id = $request->category_id;
        $habbit->title = $request->title;
        $habbit->user_id = auth()->id();
        $habbit->now = now();
        $habbit->save();

        $habbit->tag($request->tags);

        return redirect(route('habbit.show', $habbit->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Habbit  $habbit
     * @return \Illuminate\Http\Response
     */
    public function show(Habbit $habbit)
    {
        return view('habit.show', compact('habbit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Habbit  $habbit
     * @return \Illuminate\Http\Response
     */
    public function edit(Habbit $habbit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habbit  $habbit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habbit $habbit)
    {
//        $request->validate([
//            'check_date' => 'boolean',
//        ]);


        $habbitDate = new HabbitDate();
        $habbitDate->checked = $request->check_date ? true : false ;
        $habbitDate->habit_id = $habbit->id;
        $habbitDate->check_date = now();
        $habbitDate->save();

//        dd($habbitDate->checked);


        if ($request->data) {
            $post = new Post();
            $post->user_id = auth()->id();
            $post->post_type = 'App\Habbit';
            $post->post_type_id = $habbit->id;
            $post->data = $request->data;
            $post->workout_hour = now()->milliseconds;
            $post->save();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habbit  $habbit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habbit $habbit)
    {
        //
    }
}
