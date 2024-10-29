<div>
  <div id="kanye-refresh-btn-div">
      <button wire:click="refresh" ">Refresh</button>    
  </div>

  <div id="kanye-div">
      @foreach ($data as $d)
        <p>{{$d}}</p>
      @endforeach
  </div>
</div>


@script
<script>
    setInterval(() => {
        $wire.$refresh()
    }, 60000)
</script>
@endscript
