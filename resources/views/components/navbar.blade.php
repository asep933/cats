<div class="navbar bg-neutral text-neutral-content">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </div>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow 
      rounded-box w-52 bg-neutral text-neutral-content">
        <li><a href="/" class="hover:text-accent active:text-white">Home</a></li>
        <li>
          <a href="/about" class="hover:text-accent active:text-white">About</a>
        </li>
        <li><a href="/gallery" class="hover:text-accent active:text-white">Gallery</a></li>
        <li><a href="/article" class="hover:text-accent active:text-white">Article</a></li>
      </ul>
    </div>
    <a href="/" class="btn btn-ghost text-xl">Cats</a>
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li>
        <a href="/" class="hover:text-accent active:text-white">Home</a>
      </li>
      <li>
        <a href="/about" class="hover:text-accent active:text-white">About</a>
      </li>
      <li>
        <a href="/gallery" class="hover:text-accent active:text-white">Gallery</a>
      </li>
      <li>
        <a href="/article" class="hover:text-accent active:text-white">Article</a>
      </li>
    </ul>
  </div>
  <div class="navbar-end">
    <x-modal-search />

    @auth
      <form action="{{route('auth.logout')}}" method="POST" class="btn btn-xs">
        @csrf  
        @method("delete")
      
        <button type="submit">Logout</button>
      </form>
    @endauth

    <a href="{{route('admin.home')}}" class="ml-2 btn btn-xs">Admin</a>
  </div>
</div>

@if (session("message"))
  <x-alert.success 
    :message="session('message')"
  />
@endif

@if (session("error"))
  <x-alert.error 
    :message="session('error')"
  />
@endif

@if ($errors->any())
  @foreach ($errors->all() as $error)
    <x-alert.error 
      :message="$error"
    />
  @endforeach  
@endif