<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class FirstComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    #[Validate('required|min:2|max:50')]
    public $name = '';

    #[Validate('required|email|unique:users')]
    public $email = '';

    #[Validate('required|min:2|max:20')]
    public $password = '';

    #[Validate('required|image|max:1024')] // 1MB Max
    public $photo;


    public function createNewUser()
    {
        $this->validate();

        if ($this->photo) {
           $path =  $this->photo->store(path: 'photos');
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'photo' => $path,
        ]);

        $this->reset(['name', 'email', 'password', 'photo']);


        session()->flash('success', 'User Created Successfully');
    }

    public function render()
    {
        $users = User::paginate(5);
        return view('livewire.first-component', compact('users'));
    }
}
