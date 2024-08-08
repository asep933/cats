<!-- You can open the modal using ID.showModal() method -->
<button class="btn btn-sm" onclick="my_modal_3.showModal()">Insert Data</button>
<dialog id="my_modal_3" class="modal">
  <div class="modal-box">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-black">✕</button>
    </form>

    <div class="card bg-transparent bg-base-100 flex items-center justify-center text-center text-black">
      <form class="space-y-7" method="POST" action="{{route('cat.store')}}" enctype="multipart/form-data">
        @csrf

        <h1 class="text-2xl font-bold">Insert Cat</h1>

        <div>
            <label for="name" class="input input-bordered flex items-center gap-2">
                Cat
                <input name="name" type="text" class="grow" placeholder="cat..." />
            </label>
        </div>

        <div>
            <label for="description" class="input input-bordered flex items-center gap-2">
                Description
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