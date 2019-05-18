<?php

namespace App\Http\Controllers;

use App\Category;
use App\Expertness;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpertnessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('expertness.create', compact('categories'));
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



        $expertness = new Expertness();
        $expertness->category_id = $request->category_id;
        $expertness->title = $request->title;
        $expertness->user_id = auth()->id();
        $expertness->workout_time = now();
        $expertness->save();

        $expertness->tag($request->tags);

        return redirect(route('expertness.show', $expertness->id));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expertness  $expertness
     * @return \Illuminate\Http\Response
     */
    public function show(Expertness $expertness)
    {
        $workout_time = Carbon::make($expertness->workout_time);
        $totalTime = $workout_time->diffInSeconds($expertness->created_at);
        $totalTime = gmdate('d H:i:s', $totalTime);

        $expertness->totalTime = $totalTime;

        return view('expertness.show', compact('expertness'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expertness  $expertness
     * @return \Illuminate\Http\Response
     */
    public function edit(Expertness $expertness)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expertness  $expertness
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expertness $expertness)
    {
        // TODO Varsa Post Oluştur

        $request->validate([
            'hour' => 'required|integer',
        ]);

        $expertness->workout_time = Carbon::make($expertness->workout_time)->addHour($request->hour);
        $expertness->save();

        if ($request->data) {
            $post = new Post();
            $post->user_id = auth()->id();
            $post->post_type = 'App\Expertness';
            $post->post_type_id = $expertness->id;
            $post->data = $request->data;
            $post->workout_hour = $request->hour;
            $post->save();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expertness  $expertness
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expertness $expertness)
    {
        //
    }
}
