<div id="alert-success" class="px-16 py-8">
    <div class="bg-slate-100 w-full h-16 flex justify-center items-center text-red-500 rounded-xl">
        <p class="text-lg font-semibold">{{$message}}</p>
    </div>
</div>

<script>
  window.addEventListener("click", () => {
    if(document.querySelector("#alert-success")) {
    document.querySelector("#alert-success").style.display = "none"
    } else {
        return
    }
  });
</script>