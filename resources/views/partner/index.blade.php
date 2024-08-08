<x-layout>
    <div class="container mx-auto px-16 py-8">
        <div class="grid place-items-center">
            <x-admin-menu>
                <a href="{{route("admin.home")}}">Cats</a>
                <a href="{{route("list.article")}}">Article</a>
                <a href="{{route('list.partner')}}">partners</a>
            </x-admin-menu>
        </div>

        <div class="inline-flex justify-between w-full gap-6 items-center mt-8">
            <h1 class="text-2xl font-bold">Partner List</h1>

            <form action="{{route("search.partner-table")}}" method="GET">
                @csrf
                <input type="search" name="search_table" placeholder="find partner" class="h-5 w-28 p-2 text-black rounded-sm"/>
                <button class="text-white ml-2" type="submit">Find</button>
            </form>
        </div>

        <x-table-cats colOne="Partners">
            @if (isset($partnersTable))
                @forelse ($partnersTable as $partnerTable)
                    <x-table-row
                        :image="asset('storage/partners/'.$partnerTable->image)"
                        :cat="$partnerTable->title"
                        :actionUpdate="route('show.partner', $partnerTable->id)"
                        :actionDelete="route('delete.partner', $partnerTable->id)"
                    />
                @empty
                    <p class="text-white">Partner not found</p>

                @endforelse
            @else
                @foreach($partners as $partner)
                    <x-table-row
                    image="{{asset('storage/partners/'.$partner->image)}}"
                    cat="{{$partner->title}}"
                    :actionEdit="route('show.partner', $partner)"
                    :actionDelete="route('delete.partner', $partner)"
                    />      
                @endforeach
            @endif
        </x-table-cats>

        @if (isset($partners))   
            <div class="text-black px-1">
                {{$partners->links()}}
            </div>
        @endif

        <div class="block active:scale-105 my-4 text-base rounded-md text-black bg-slate-100 px-2 max-w-max">
            <a href="{{route('add.partner')}}">Insert Partner</a>
        </div>
    </div>

</x-layout>