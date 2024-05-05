<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class FirstComponent extends Component
{
    use WithPagination;

    #[Validate('required|min:2|max:50')]
    public $name = '';

    #[Validate('required|email|unique:users')]
    public $email = '';

    #[Validate('required|min:2|max:20')]
    public $password = '';

    public function createNewUser()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);

        $this->reset(['name', 'email', 'password']);

        session()->flash('success', 'User Created Successfully');
    }

    public function render()
    {
        $users = User::paginate(5);
        return view('livewire.first-component', compact('users'));
    }
}
