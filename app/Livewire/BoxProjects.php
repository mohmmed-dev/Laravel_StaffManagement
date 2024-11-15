<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class BoxProjects extends Component
{
      use WithPagination;
    public $projects;
    public function away($id)  {
        return to_route('projects.show',$id);
    }
    public function render()
    {
        return view('livewire.box-projects', [
            'Projects' => Project::paginate(10),
        ]);
    }
}
