<div id="container" class="container-partner">
    <div class="wraper">
        {{$slot}}
    </div>
</div>

<script>
    
    document.querySelector(".container-partner").appendChild(
        document.querySelector(".wraper").cloneNode(true)
    )
</script>