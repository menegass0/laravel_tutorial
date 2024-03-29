<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;

class IdeaController extends Controller
{  
    public function show(Idea $idea){


        return view('ideas.show', [
            'idea' => $idea
        ]);
    }



    public function edit(Idea $idea){

        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }



    public function update(Idea $idea){

        $validated = request()->validate([
            'update-content' => 'required|min:5|max:240'
        ]);

        $idea->update(['content' =>$validated['update-content']]);

        // $idea->save();

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea created successfully!');
    }



    public function store(){

        $validated = request()->validate([
            'idea-content' => 'required|min:5|max:240'
        ]);

        // $idea = Idea::create(
        //     [
        //         'content' =>  request()->get('idea-content')
        //     ]
        // );

        $idea = Idea::create(['content' => $validated['idea-content']]);

        // $idea = new Idea([
        //     'content' => request()->get('idea-content')
        // ]);
        // $idea->save();

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
            
    }



    public function destroy(Idea $idea){
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
