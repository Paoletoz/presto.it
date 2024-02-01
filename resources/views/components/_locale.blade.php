<form action="{{route('setLocale',$lang)}}" method="POST" class="text-end me-0">
    @csrf
    <button type="submit" class="btn"> 
        <img src="{{asset('vendor/blade-flags/language-'. $lang . '.svg')}}" class="flag-custom" alt="">
        
    </button>
</form>