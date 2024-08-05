<x-layout>
    <div class="card bg-transparent bg-base-100 py-16 flex items-center justify-center text-center text-black">
      <form class="space-y-7" method="POST" action="{{route('article.store')}}" enctype="multipart/form-data">
        @csrf

        <h1 class="text-2xl font-bold text-white">Post Article</h1>

        @if(session('message'))
        <div role="alert" class="alert alert-success">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>{{session('message')}}!</span>
        </div>
        @endif

        <div>
            <label for="title" class="input input-bordered flex items-center gap-2">
                Title
                <input name="title" type="text" class="grow" placeholder="cat..." />
            </label>
        </div>

        <div>
            <label for="content" class="input input-bordered flex items-center gap-2">
                Content
                <input name="content" type="text" class="grow" placeholder="description..." />
            </label>
        </div>

        <div>
            <input name="image" type="file" class="file-input file-input-bordered file-input-sm w-full max-w-xs" />
        </div>

        <div class="card-actions justify-end">
          <button type="submit" class="btn btn-accent">Submit</button>
        </div>
      </form>
    </div>
</x-layout>