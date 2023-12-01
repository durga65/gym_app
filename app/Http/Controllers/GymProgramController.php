<?php

namespace App\Http\Controllers;
use App\Models\Program;
use App\Models\Tag;
use Illuminate\Http\Request;

class GymProgramController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {

//         $programs = Program::with('tag')->get();
//         $tags = Tag::with('program')->get();
        
//         return view('programs.index', compact('programs', 'tags'));
//         /*$programs = Program::latest()->paginate(5);
    
//         return view('programs.index',compact('programs'))
//             ->with('i', (request()->input('page', 1) - 1) * 5);*/
//     }
     
//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         $tags = Tag::all();
        
//         return view('programs.create');
//     }
    
//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required',
//             'description' => 'required',
//             'progress' => 'required',
//             'tag_id'=>'requied|array',
            
//         ]);

    
//         Program::create($request->all());
     
//         return redirect()->route('programs.index', compact('tags'))
//                         ->with('success','Program created successfully.');
//     }
     
//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
//     public function show(Program $program)
//     {
//         return view('programs.show',compact('program'));
//     } 
     
//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(Program $program)
//     {
//         return view('programs.edit',compact('program'));
//     }
    
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, Program $program)
//     {
//         $request->validate([
//             'name' => 'required',
//             'description' => 'required',
//             'progress' => 'required',
//             'tag_id'=>'required'

//         ]);
    
//         $program->update($request->all());
    
//         return redirect()->route('programs.index')
//                         ->with('success','Program updated successfully');
//     }
    
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Product  $product
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Program $program)
//     {
//         $program->delete();
    
//         return redirect()->route('programs.index')
//                         ->with('success','Program deleted successfully');
//     }
{
    public function index()
    {
        $programs = Program::all();
        return view('programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::all();
        return view('programs.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation logic
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'progress' => 'required',
            'tags' => 'required|array',
        ]);

        // Saving logic
        $program = Program::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'progress' => $request->input('progress') ,
        ]);

        // Syncing roles
        $program->tags()->sync($request->input('tags'));

        // Redirect to index or show view
        return redirect()->route('programs.index')->with('success', 'Program created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(Program $program)
    {
        $tags = Tag::all();
        return view('programs.edit', compact('program', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Program $program)
    {
        // Validation logic
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'progress' => 'required',
            'tags' => 'required|array',
        ]);

        // Updating logic
        $program->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'progress' => $request->input('progress'),
        ]);

        // Syncing roles
        //$program->tags()->sync($request->input('tags'));

        // Redirect to index or show view
        return redirect()->route('programs.index')->with('success', 'program updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Program $program)
    {
        $program->delete();
        
        // Redirect to index or show view
        return redirect()->route('programs.index')->with('success', 'Program deleted successfully.');
    }
}
