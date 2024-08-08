<x-layout>
    <div class="container mx-auto flex justify-center">
        <form class="space-y-7 w-1/3" method="POST" action="{{route("update.partner", $partner)}}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <h1 class="text-2xl font-bold">Update Partner</h1>

            <div>
                <label for="title" class="input text-black input-bordered flex items-center gap-2">
                    Title
                    <input name="title" type="text" class="grow" value="{{old($partner->title, $partner->title)}}" placeholder="cat..." />
                </label>
            </div>

            <div>
                <input name="image" type="file" class="file-input text-black file-input-bordered file-input-sm w-full max-w-xs" />
            </div>

            <div class="card-actions justify-end">
                <button type="submit" class="btn btn-accent">Update</button>
            </div>
        </form>
      </div>
</x-layout>