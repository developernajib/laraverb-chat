<?php

namespace App\Livewire\Room;

use Livewire\Component;
use App\Models\Room;

class Edit extends Component
{
    public $roomId;
    public $name;
    public $open = false;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function mount($roomId)
    {
        $room = Room::findOrFail($roomId);
        $this->roomId = $room->id;
        $this->name = $room->name;
    }

    public function updateRoom()
    {
        $this->validate();

        $room = Room::findOrFail($this->roomId);
        $room->name = $this->name;
        $room->save();

        $this->reset(['open']);
        $this->emit('roomUpdated');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.room.edit');
    }
}
