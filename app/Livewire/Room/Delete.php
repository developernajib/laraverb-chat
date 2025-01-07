<?php

namespace App\Livewire\Room;

use Livewire\Component;
use App\Models\Room;

class Delete extends Component
{
    public $roomId;
    public $confirming = false;

    public function mount($roomId)
    {
        $this->roomId = $roomId;
    }

    public function confirmDelete()
    {
        $this->confirming = true;
    }

    public function deleteRoom()
    {
        $room = Room::findOrFail($this->roomId);
        $room->delete();

        $this->emit('roomDeleted');
    }

    public function render()
    {
        return view('livewire.room.delete');
    }
}
