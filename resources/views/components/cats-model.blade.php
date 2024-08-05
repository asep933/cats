@props([
    'description',
    'image',
    'name',    
    'descriptionSecond',
    'imageSecond',
    'nameSecond',    
])

<div class="flex items-center justify-center px-16 flex-col max-[820px]:px-4 container mx-auto">
    <div class="flex items-center py-16 max-[820px]:flex-col-reverse">
        <div class="space-y-3 w-1/2 max-[820px]:w-full" data-aos="fade-right">
            <p class="text-5xl font-bold">{{$name}}</p>
            <div class="bg-accent h-1 w-1/2"></div>
            <p class="text-sm">
                {{$description}}
            </p>
        </div>
            
        <div class="w-1/2 pl-12 max-[820px]:pl-0 max-[820px]:w-full" data-aos="fade-left">
            <img class="min-w-52" src="{{$image}}" alt="{{$name}}">
        </div>
    </div>

    <div class="flex items-center flex-row-reverse py-16 max-[820px]:flex-col-reverse">
        <div class="space-y-3 w-1/2 max-[820px]:w-full" data-aos="fade-left">
            <p class="text-5xl font-bold text-end max-[820px]:text-start">{{$nameSecond}}</p>
            <div class="w-full flex justify-end max-[820px]:justify-start">
                <div class="bg-accent h-1 w-1/2 text-right"></div>
            </div>
            <p class="text-sm text-right max-[820px]:text-left">
                {{$descriptionSecond}}
            </p>
        </div>
            
        <div class="w-1/2 pl-12 max-[820px]:pl-0 max-[820px]:w-full" data-aos="fade-right">
            <img class="min-w-72" src="{{$imageSecond}}" alt="{{$nameSecond}}">
        </div>
    </div>
</div>