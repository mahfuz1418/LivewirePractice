<div class="container my-5">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit='createNewUser' action="">
        <div class="form-group">
            <input class="my-2 form-control" wire:model='name' type="text" placeholder="Name">

            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <input class="my-2 form-control" wire:model='email' type="text" placeholder="Email">

            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group">
            <input class="my-2 form-control" wire:model='password' type="text" placeholder="Password">

            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <button class="btn btn-info">Create User</button>
    </form>

<hr>

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>User Name</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $users->links() }}

</div>
