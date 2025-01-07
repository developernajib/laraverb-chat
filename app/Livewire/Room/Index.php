<?php

namespace App\Livewire\Room;

use Livewire\Component;
use App\Models\Room;
use Livewire\Attributes\Layout;

class Index extends Component
{
    protected $listeners = ['roomCreated' => '$refresh'];

    #[Layout('layouts.app')]
    public function render()
    {
        $rooms = Room::all();
        return view('livewire.room.index', compact('rooms'));
    }
}