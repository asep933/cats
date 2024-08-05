@props([
    'image',
    'cat',
    'description' => false
])

<tr>
    <td>
        <div class="flex items-center gap-3">
        <div class="avatar">
            <div class="mask mask-squircle w-12 h-12">
            <img src="{{$image}}" alt="{{$cat}}" />
            </div>
        </div>
        <div>
            <div class="font-bold">{{$cat}}</div>
        </div>
        </div>
    </td>
    <td>
        <h1>{{$description}}</h1>
    </td>
</tr>