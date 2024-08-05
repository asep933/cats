<x-Layout>
    <x-gallery-list>
        <div class="layout-gallery">
            @foreach ($cats as $cat)
                <x-gallery-image 
                    image="{{asset('storage/cats/'.$cat->image)}}"
                    name="{{$cat->name}}"
                />
            @endforeach
        </div>
    </x-gallery-list>
</x-Layout>