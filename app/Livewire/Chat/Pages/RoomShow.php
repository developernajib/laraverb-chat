<?php

namespace App\Livewire\Chat\Pages;

use Livewire\Component;
use App\Models\Room;
use App\Models\Message;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use App\Events\MessageCreated;

class RoomShow extends Component
{
    public Room $room;

    #[Validate('required|min:1')]
    public string $message = '';

    public function submit(){
        $this->validate();

        $message = Message::make($this->only('message'));
        $message->room()->associate($this->room);
        $message->user()->associate(auth()->user());
        $message->save();

        $this->reset('message');

        $this->dispatch('message.created', $message->id);

        broadcast(new MessageCreated($this->room, $message))->toOthers();
    } 

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.chat.pages.room-show');
    }
}
