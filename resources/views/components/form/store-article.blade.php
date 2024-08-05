<!-- You can open the modal using ID.showModal() method -->
<button class="btn btn-sm" onclick="my_modal_3.showModal()">Post Article</button>
<dialog id="my_modal_3" class="modal">
  <div class="modal-box">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-black">✕</button>
    </form>

    <div class="card bg-transparent bg-base-100 flex items-center justify-center text-center text-black">
      <form class="space-y-7" method="POST" action="{{route('article.store')}}" enctype="multipart/form-data">
        @csrf

        <h1 class="text-2xl font-bold">Post Article</h1>

        @if(session('message'))
        <div role="alert" class="alert alert-success">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>{{session('message')}}!</span>
        </div>
        @endif

        <div>
            <label for="name" class="input input-bordered flex items-center gap-2">
                Title
                <input name="name" type="text" class="grow" placeholder="cat..." />
            </label>
        </div>

        <div>
            <label for="description" class="input input-bordered flex items-center gap-2">
                Content
                <input name="description" type="text" class="grow" placeholder="description..." />
            </label>
        </div>

        <div>
            <input name="image" type="file" class="file-input file-input-bordered file-input-sm w-full max-w-xs" />
        </div>

        <div class="card-actions justify-end">
          <button type="submit" class="btn btn-accent">Insert</button>
        </div>
      </form>
  </div>
</div>
</dialog>