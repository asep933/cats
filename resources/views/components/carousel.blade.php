<div class="container-slider">
  <div class="container-cats-list">
    <div class="wraper-cats-list">
      {{$slot}}
    </div> 
  </div>
</div>

<script>
  document.querySelector('.container-cats-list').appendChild(
    document.querySelector('.wraper-cats-list').cloneNode(true)
  );
</script>