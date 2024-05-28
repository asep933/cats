@props([
  'image',
  'title',
  'icon' => null,
  'iconSecond' => null
])

<div class="card w-80 bg-base-100 shadow-xl text-black flex 
flex-shrink-0" id="container-card-list">
  <figure class="max-h-44">
    <img class="hover:scale-105 transition duration-300 ease-in-out" src="{{$image}}" alt="{{$title}}" />
  </figure>

  <div class="card-body">
    <h2 class="card-title">{{$title}}</h2>

    {{-- @if ($icon)
    <div class="card-actions justify-end">
        <button class="animate-pulse hover:animate-none">
          <img class="" src="{{$iconSecond}}" alt="icon whatsapp" width="40px" />
        </button>
        <a href="https://wa.me/6285872256552" target="_blank" class="animate-pulse hover:animate-none">
          <img class="" src="{{$icon}}" alt="icon whatsapp" width="40px" />
        </a>
      </div>
    @endif --}}
  </div>

  {{-- @push('scripts')
      <script>
        let container = document.querySelector('#container-card-list');

        conosole.log(container)
      </script>
  @endpush --}}
</div>