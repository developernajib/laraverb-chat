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

    #[Computed()]
    public function users(){
        return User::find($this->ids);
    }

    #[On('echo-presence:chat.room.{room.slug},here')]
    public function setUsersHere($users){
        $this->ids = Arr::pluck($users, 'id');
    }
    
    #[On('echo-presence:chat.room.{room.slug},joining')]
    public function setUserJoining($user){
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
