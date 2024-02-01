<x-layout>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
{{-- 
<div class="container-fluid bgCreateAnnouncement">
    <div class="row justify-content-center">
        <div class="col-12"> --}}
            <livewire:create-announcement/>
        {{-- </div>
    </div>
</div> --}}
</x-layout>