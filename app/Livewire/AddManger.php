<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AddManger extends Component
{
    public $project;
    public $searchInput = '';
    public $results = [];

    public function  addNewManger(User $user)  {
        if(!$user->isManger($this->project)) {
            $user->projects()->attach($this->project,['isManger'=> 0]);
        }
    }
    public function  removeManger(User $user)  {
        $user->projects()->detach($this->project);
    }

    public function render()
    {
        $this->results = [];
        $this->results = User::where('username', "LIKE", $this->searchInput . '%')->get(['id','name','username','image']);
        return view('livewire.add-manger',[
            'results' => $this->results
        ]);
    }
}
