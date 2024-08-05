<x-layout>
    <div class="text-center py-10 space-y-3" data-aos="zoom-out">
        <h1 class="text-4xl font-bold">Admin</h1>
        <x-admin-menu>
            <a href="{{route("admin.home")}}">Cats</a>
            <a href="{{route("list.partner")}}">Partners</a>
            <a href="{{route('list.article')}}">Articles</a>
        </x-admin-menu>
    </div>

    <div class="space-y-8 pl-12 pb-16 container mx-auto" data-aos="fade-left">
        <div class="inline-flex justify-between w-full gap-6 items-center">
            <h1 class="text-2xl font-bold">Cat List</h1>

            <form action="{{route("search.table")}}" method="GET">
                @csrf
                <input type="search" name="search_table" placeholder="find cats" class="h-5 w-28 p-2 text-black rounded-sm"/>
                <button class="text-white ml-2" type="submit">Find</button>
            </form>
        </div>
        
        <x-table-cats colOne="Cats" colTwo="Description">
            @if (isset($catsTable))
                @forelse ($catsTable as $catTable)
                    <x-table-row
                        image="{{asset('storage/cats/'.$catTable->image)}}"
                        cat="{{$catTable->name}}"
                        description="{{$catTable->description}}"
                    />
                @empty
                    <p class="text-white">Cat not found</p>

                @endforelse
            @else
                @foreach($cats as $cat)
                    <x-table-row
                    image="{{asset('storage/cats/'.$cat->image)}}"
                    cat="{{$cat->name}}"
                    description="{{$cat->description}}"
                    />      
                @endforeach
            @endif
        </x-table-cats>

        @if (isset($cats))   
            <div class="text-black px-1">
                {{$cats->links()}}
            </div>
        @endif

        <x-form.store-cat />
    </div>
</x-layout>