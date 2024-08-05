<x-layout>
    <div class="container mx-auto px-16 py-8">
        <div class="grid place-items-center">
            <x-admin-menu>
                <a href="{{route("admin.home")}}">Cats</a>
                <a href="{{route("list.partner")}}">Partners</a>
                <a href="{{route('list.article')}}">Articles</a>
            </x-admin-menu>
        </div>

       <div class="inline-flex justify-between w-full gap-6 items-center mt-8">
            <h1 class="text-2xl font-bold">Article List</h1>

            <form action="{{route("search.article-table")}}" method="GET">
                @csrf
                <input type="search" name="search_table" placeholder="find article" class="h-5 w-28 p-2 text-black rounded-sm"/>
                <button class="text-white ml-2" type="submit">Find</button>
            </form>
        </div>
        
        <x-table-cats colOne="Image" colTwo="Content">
            @if (isset($articlesTable))
                @forelse ($articlesTable as $articleTable)
                    <x-table-row
                        :image="asset('storage/articles/'.$articleTable->image)"
                        :cat="$articleTable->title"
                        :description="$articleTable->content"
                    />
                @empty
                    <p class="text-white">Article not found</p>

                @endforelse
            @else
                @foreach($articles as $article)
                    <x-table-row
                    image="{{asset('storage/articles/'.$article->image)}}"
                    cat="{{$article->title}}"
                    :description="$article->content"
                    />      
                @endforeach
            @endif
        </x-table-cats>

        @if (isset($articles))   
            <div class="text-black px-1">
                {{$articles->links()}}
            </div>
        @endif

        <div class="block active:scale-105 my-4 text-base rounded-md text-black bg-slate-100 px-2 max-w-max">
            <a href="{{route('add.article')}}">Post Article</a>
        </div>
    </div>
</x-layout>