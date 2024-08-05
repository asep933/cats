@props([
  'image',
  'title',
  'content'
])

<div class="card w-80 bg-base-100 shadow-xl text-black flex 
flex-shrink-0" id="container-card-list">
  <figure class="max-h-44">
    <img class="hover:scale-105 transition duration-300 ease-in-out" src="{{$image}}" alt="{{$title}}" />
  </figure>

  <div class="card-body">
    <h2 class="card-title">{{$title}}</h2>
    <p>{{Str::limit($content ?? false, 150)}}</p>
  </div>
</div>