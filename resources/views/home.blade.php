<x-layout>
    <x-hero />
    <div data-aos="fade-right">
        <x-why-us />
    </div>

    <div id="cat" class="w-full py-12 container mx-auto" data-aos="fade-right">
        <h1 class="text-5xl px-16 font-bold mb-4">Cats List</h1>

        <div 
        class="w-full">
            <x-carousel>
                @foreach($cats as $cat)
                    <x-card 
                        image="{{asset('storage/cats/'.$cat->image)}}"
                        title="{{$cat->name}}"
                        icon="icon-whatsapp.png"
                        iconSecond="icon-info.png"
                    />
                @endforeach
            </x-carousel>
        </div>
    </div>

    <div class="py-12">
        <x-info />
    </div>

    <div class="py-12 container mx-auto px-16">
        <h1 class="text-5xl font-bold mb-12 text-center" data-aos="zoom-in">Gallery</h1>
        
        <x-gallery-home>
            @foreach ($cats as $cat)
            <div class="relative rounded overflow-hidden">
                <img src="{{asset('storage/cats/'.$cat->image)}}" alt="Hanging Planters" class="w-full">
                <p
                class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
                {{$cat->name}}
                </p>
            </div>
            @endforeach
        </x-gallery-home>
    </div>

    <x-cats-model 
        description="The British Shorthair is a medium to large-sized cat with a solid, muscular body and a dense, plush coat. They have a round face with chubby cheeks, large round eyes, and a short nose. This breed is known for its calm and easygoing temperament, 
        making them excellent companions for families and individuals alike."
        image="british-shorthair.png"
        name="British sorthair"
        descriptionSecond="The domestic cat, also known as Felis catus, is a small carnivorous mammal that has been domesticated for thousands of years. Domestic cats come in a wide variety of breeds, colors, and coat patterns, but they all share common characteristics such as a flexible body, sharp retractable claws, keen senses, 
        and a specialized digestive system adapted for hunting small prey."
        imageSecond="olen.png"
        nameSecond="Domestic"
    />

    <div class="w-full bg-slate-100 pb-12">
        <h1 class="text-5xl font-bold py-12 text-black text-center" data-aos="zoom-in">Partners</h1>

        <div class="flex w-full justify-center container mx-auto" data-aos="flip-up">
            <x-carousel-partner>
                @foreach($partners as $partner)
                    <x-card
                        image="{{asset('storage/partners/'.$partner->image)}}"
                        title="{{$partner->title}}"
                    />
                @endforeach
            </x-carousel-partner>
        </div>
    </div>

    <div class="pt-16 container mx-auto">
        <x-map />
    </div>
    
</x-layout>