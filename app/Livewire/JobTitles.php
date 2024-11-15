<?php

namespace App\Livewire;

use App\Models\job_title;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;


class JobTitles extends Component
{
    // #[Validate('alpha_dash','required')]
    public $title = '';
    public $search = '';
    public $jobs;
    public function mount(job_title $job_title) {
        $this->jobs = $job_title;
    }
    public function create() {
        if(!empty($this->title)){
            job_title::create([
                "name" => $this->title
            ]);
        }
    }
    public function take($id) {
        session(['id'=>$id]);
    }
    public function showJobs() {
        return $this->searchData() ??  $this->jobs::paginate(20);
    }
    public function searchData() {
        return $this->jobs::where('name','like',"%{$this->search}%")->paginate(20);
    }
    public function render()
    {
        return view('livewire.job-titles');
    }
}
