<x-layout>
    <div class="flex justify-between w-full items-center max-[820px]:flex-col max-[820px]:space-y-3 px-8 py-8">
    @if (count($cats) > 0)
        @foreach ($cats as $cat)
            <div data-aos="fade-right">
                <img src="{{asset('storage/cats/'.$cat->image)}}" alt="{{$cat->name}}" class="w-full max-[820px]:px-4 max-[820px]:pt-4">
            </div>
            
            <div class="pl-4 max-[820px]:pl-0 pb-4" data-aos="fade-left">    
                <p class="max-[820px]:px-4 text-white w-full">{{$cat->description}}</p>
            </div>
        @endforeach
    @else
        <div class="w-full">
            <h1 class="text-red-500 text-center text-3xl flex justify-center items-center">cat not found</h1>
        </div>
    @endif
    </div>
</x-layout>