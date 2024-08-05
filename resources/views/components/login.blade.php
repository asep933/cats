<!-- You can open the modal using ID.showModal() method -->
<div id="my_modal_3" class="card text-black">
  <div class="modal-box">
    <div class="w-full flex justify-center">
        <!-- <h1 class="text-3xl font-bold">Login</h1> -->
        <div class="card shrink-0 w-full max-w-sm bg-base-100">
        <form class="card-body" method="POST" action="{{route('auth.login')}}">
            @csrf
            
            <h1 class="text-center text-2xl font-bold">Login</h1>
            <div class="form-control">
            <label class="label">
                <span class="label-text">Email</span>
            </label>
            <input name="email" id="email" type="email" placeholder="email" class="input input-bordered" required />
            </div>
            <div class="form-control">
            <label class="label">
                <span class="label-text">Password</span>
            </label>
            <input name="password" id="password" type="password" placeholder="password" class="input input-bordered" required />
            <label class="label">
                <a href="#" class="label-text-alt link link-hover">Forgot password?</a>
            </label>
            </div>
            <div class="form-control mt-6">
            <button class="btn btn-neutral">Login</button>
            </div>
        </form>
        </div>
    </div>
</div>
</div>