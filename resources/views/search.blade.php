<x-layout>
    <div class="container mx-auto">
        <h1 class="font-extrabold text-2xl text-white my-4">Result:</h1>

        <div class="flex flex-wrap justify-between w-full items-center max-[820px]:flex-col 
        max-[820px]:space-y-3 py-8">

            <div class="flex flex-wrap gap-3">
                @if (count($cats) > 0)
                    @foreach ($cats as $cat)
                    <div class="bg-slate-200 rounded-md mb-3 max-w-64 overflow-hidden">
                        <div data-aos="fade-right">
                            <img class="w-full" src="{{asset('storage/cats/'.$cat->image)}}" alt="{{$cat->name}}" class="w-full max-[820px]:px-4 max-[820px]:pt-4">
                        </div>
                        
                        <div class="pl-4 my-4 max-[820px]:pl-0 pb-4" data-aos="fade-left">    
                            <p class="max-[820px]:px-4 text-black w-full">{{Str::limit($cat->description, 70)}}</p>
                        </div>
                    </div>
                    @endforeach
                @else
            </div>
            <div class="w-full">
                <h1 class="text-red-500 text-center text-3xl flex justify-center items-center">cat not found</h1>
            </div>
        @endif
        </div>
    </div>
</x-layout>