<x-layout>
    <div class="text-center py-10 space-y-3" data-aos="zoom-out">
        <h1 class="text-4xl font-bold">Admin</h1>
        <x-admin-menu>
            <x-form.store-partner />
        </x-admin-menu>
    </div>

    <div class="space-y-8 pl-12 pb-16" data-aos="fade-left">
        <h1 class="text-2xl font-bold">Cat List</h1>
        
        <x-table-cats>
            @foreach($cats as $cat)
            <x-table-row
            image="{{asset('storage/cats/'.$cat->image)}}"
            cat="{{$cat->name}}"
            description="{{$cat->description}}"
            />
            @endforeach
        </x-table-cats>

        <x-form.store />
    </div>
</x-layout>