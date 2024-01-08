<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

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

        request()->validate([
            'update-content' => 'required|min:5|max:240'
        ]);

        $idea->content = request()->get('update-content', '');

        $idea->save();

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea created successfully!');
    }



    public function store(){

        request()->validate([
            'idea-content' => 'required|min:5|max:240'
        ]);

        $idea = Idea::create(
            [
                'content' =>  request()->get('idea-content')
            ]
        );
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
