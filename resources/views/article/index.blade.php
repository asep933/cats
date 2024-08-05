<x-layout>
    <div class="container mx-auto py-8">
        <div class="flex flex-col items-center py-8">
            <h1 class="font-extrabold text-3xl">Baca</h1>
            <p class="text-base font-semibold">Artikel Kami</p>
        </div>

        <div class="grid gap-12 px-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 
        lg:grid-cols-4">
            @forelse ($articles as $article)
                <x-card 
                    image="{{asset('storage/articles/'.$article->image)}}"
                    title="{{$article->title}}"
                    :content="$article->content"
                />
            @empty
            <h1 class="font-bold text-2xl">Article is Empty</h1>
        @endforelse
        </div>
    </div>
</x-layout>