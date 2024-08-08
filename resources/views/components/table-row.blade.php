@props([
    'image' => false,
    'cat',
    'description' => false,
    'actionEdit' => false,
    'actionDelete' => false,
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
    <td>
        <div class="flex gap-2">
            <form action="{{$actionEdit}}" method="GET">
                <button type="submit" class="btn btn-xs">Edit</button>
            </form>
            
            <form action="{{$actionDelete}}" method="POST">
                @csrf
                @method("delete")
                <button type="submit" class="btn btn-xs">Delete</button>
            </form>
        </div>
    </td>
</tr>