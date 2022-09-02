<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{
    public $count = 0;
    public $post;

    public function like(){
        $this->count++;
    }

    public function render()
    {
        return view('livewire.show-posts', ['count' => $this->count]);
    }
}
