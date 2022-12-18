<?php

namespace App\Http\Controllers;

use App\Models\MyModel;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Debug;
// use Barryvdh\Debugbar;
class MyModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return 'Hello, World!';

        // error_log(MyModel::with('user')->latest()->get());
        return view('blog.index', [
            'chirps' => MyModel::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->myBlog()->create($validated);

        return redirect(route('my-blog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyModel  $myModel
     * @return \Illuminate\Http\Response
     */
    public function show(MyModel $myModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyModel  $myModel
     * @return \Illuminate\Http\Response
     */
    public function edit(MyModel $myModel)
    {
        //

        // $this->authorize('update', $myModel);
        // Debugbar::info($myModel);
        // Debugbar
        $test = 10;
        error_log($test);
        error_log($myModel->get());
        return view('blog.edit', [
            'chirp' => $myModel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyModel  $myModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyModel $myModel)
    {
        //
        // $this->authorize('update', $myModel);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $myModel->update($validated);

        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyModel  $myModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyModel $myModel)
    {
        //
    }
}
