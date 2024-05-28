<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
    <!-- Open the modal using ID.showModal() method -->
    <button class="btn btn-ghost btn-circle" onclick="my_modal_2.showModal()">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
    </button>
    <dialog id="my_modal_2" class="modal">
    <div class="modal-box">

      {{--action search--}}
      <form action="{{route('search.get')}}" method="GET" enctype="multipart/form-data">
      @csrf
        <label for="search" class="input input-bordered flex items-center gap-2 text-black">
          <input name="search" type="text" class="grow" placeholder="Search" />
        
          <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" /></svg>
          </button>
        </label>
      </form>

    </div>
    <form method="dialog" class="modal-backdrop">
      <button>close</button>
    </form>
  </dialog>
</div>