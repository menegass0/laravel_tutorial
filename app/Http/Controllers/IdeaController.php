<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{  
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

    public function destroy($id){
        $idea = Idea::where('id', $id)->first();
 
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
