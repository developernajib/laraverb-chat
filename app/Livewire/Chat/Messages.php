<?php

namespace App\Livewire\Chat;

use Livewire\Component;
use App\Models\Room;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use App\Models\Message;

class Messages extends Component
{

    public Room $room;

    public Collection $messages;

    public function mount(){
        $this->fill([
            'messages' => $this->room->messages()->with('user')->oldest()->take(100)->get(),
        ]);
    }

    #[On('message.created')]
    public function prependMessage($id){
        $this->messages->push(Message::with('user')->find($id));
    }

    public function render()
    {
        return view('livewire.chat.messages');
    }
}
