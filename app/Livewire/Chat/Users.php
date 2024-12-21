<?php

namespace App\Livewire\Chat;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Room;
use Illuminate\Support\Arr;
use Livewire\Attributes\Computed;
use App\Models\User;

class Users extends Component
{

    public Room $room;
    public array $ids = [];
    public array $typingIds = [];

    #[Computed()]
    public function users(){
        return User::find($this->ids);
    }

    #[On('echo-private:chat.room.{room.slug},.client-typing')]
    public function setTyping($user){
        if(in_array($user['id'], $this->typingIds)){
            return;
        }
        $this->typingIds[] = $user['id'];
    }

    #[On('echo-private:chat.room.{room.slug},.client-not-typing')]
    public function setNotTyping($user){
        $this->typingIds = array_diff($this->typingIds, [$user['id']]);
    }

    #[On('echo-presence:chat.room.{room.slug},here')]
    public function setUsersHere($users){
        $this->ids = Arr::pluck($users, 'id');
    }
    
    #[On('echo-presence:chat.room.{room.slug},joining')]
    public function setUserJoining($user){
        if(in_array($user['id'], $this->ids)){
            return;
        }
        $this->ids[] = $user['id'];
    }

    #[On('echo-presence:chat.room.{room.slug},leaving')]
    public function setUserLeaving($user){
        $this->ids = array_diff($this->ids, [$user['id']]);
    }

    public function render()
    {
        return view('livewire.chat.users');
    }
}
