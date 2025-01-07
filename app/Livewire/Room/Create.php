<?php

namespace App\Livewire\Room;

use Livewire\Component;
use App\Models\Room;
use Illuminate\Support\Str;

class Create extends Component
{
    public $open = false;
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function createRoom()
    {
        $this->validate();

        Room::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);

        $this->reset(['open', 'name']);
        $this->emit('refetchData');
    }

    public function render()
    {
        return view('livewire.room.create');
    }
}