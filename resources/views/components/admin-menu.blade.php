<div class="dropdown dropdown-bottom text-black">
  <div tabindex="0" role="button" class="btn m-1">
    Menu
    <span class="badge badge-xs badge-info"></span>
  </div>
  <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
    <li>
        <a>
            {{$slot}}
        </a>
    </li>
  </ul>
</div>