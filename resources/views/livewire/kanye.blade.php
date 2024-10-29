<div id="kanye-root" class="md:max-lg:flex p-6">
  <div id="kanye-refresh-btn-div">
      <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
       wire:click="refresh">
        Refresh
     </button>    
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
    }, {{config('kanye.quote_internal')}})
</script>
@endscript
