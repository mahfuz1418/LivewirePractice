<?php

namespace App\Livewire;

use App\Models\Todo;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class FirstComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $todo_name;
    public $profile_pic;

    public function createUser()
    {
        User::create([
            'name' => "ahad",
            'email' => "test@test.com",
            'password' => '123456'
        ]);
    }

    public function render()
    {
        $user = User::all();
        return view('livewire.first-component', compact('user'));
    }
}
