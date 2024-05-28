<x-Layout>
    <x-gallery-list>
        @foreach ($cats as $cat)
            <x-gallery-image 
                image="{{asset('storage/cats/'.$cat->image)}}"
                name="{{$cat->name}}"
            />
        @endforeach
    </x-gallery-list>
</x-Layout>