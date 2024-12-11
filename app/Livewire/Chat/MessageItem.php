<?php

namespace App\Livewire\Chat;

use Livewire\Component;
use App\Models\Message;

class MessageItem extends Component
{
    public Message $message;

    public function render()
    {
        return view('livewire.chat.message-item');
    }
}
