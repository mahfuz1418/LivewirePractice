<div class="container my-5">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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

        <div class="form-group">
            <input class="my-2 form-control" wire:model='photo' type="file">

            @error('photo')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            @if ($photo)
                <img style="width: 200px" class="my-2" src="{{ $photo->temporaryUrl() }}">
            @endif
        </div>


        <button class="btn btn-info">Create User</button>
    </form>

<hr>

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>User Name</th>
            <th>Email</th>
            <th>Image</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td> <img src="{{asset('storage/app/photos/24FSfVrbMX6vOlCgO2vUVOTyI8BxW9F04ST1cI6w.jpg')}}" alt=""> </td>
                    <td> <img src="{{ Storage::url($user->photo) }}" alt=""> </td>

                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $users->links() }}

</div>
