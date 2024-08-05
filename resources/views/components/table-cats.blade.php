<div class="overflow-x-auto text-white">
  <table class="table">
    <!-- head -->
    <thead class="text-white">
      <tr>
        <th class="text-xl font-bold">{{$colOne}}</th>
        <th class="text-xl font-bold">{{$colTwo ?? false}}</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      {{{$slot}}}
  </table>
</div>