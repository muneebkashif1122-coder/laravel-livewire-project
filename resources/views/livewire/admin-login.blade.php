<div class="d-flex justify-content-center align-items-center vh-100">
  <!-- Limit width so form does not stretch full-screen -->
  <div style="width: 100%; max-width: 400px;" class="p-3">
    
    {{-- <form action="{{route('login-user')}}" method="post"> --}}
        {{-- @csrf --}}
    <form wire:submit.prevent="submitLogin">
        <h2>Login</h2>
        <hr>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        {{-- <input type="email" class="form-control" name="email" value="{{old('email')}}"> --}}
        <input type="email" class="form-control" wire:model="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        <span class="text danger">@error('email') {{$message}} @enderror</span>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        {{-- <input type="password" class="form-control" name="password"> --}}
        <input type="password" class="form-control" wire:model="password">
        <span class="text danger">@error('password') {{$message}} @enderror</span>
      </div>
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

  </div>
</div>