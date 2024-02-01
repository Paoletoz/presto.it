<x-layout>
    <x-sidebar />
    <div class="bgRevisorCustom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12 p-4">
                    <h2 class="text-center fst-italic text-yellow-custom fs-1">
                        @if ($announcement_to_check)
                        {{ __('ui.revTrue') }}
                        @else
                        {{ __('ui.revFalse') }}
                        @endif
                    </h2>
                </div>
            </div>
        </div>
        
        @if ($announcement_to_check)
        <div class="container">
            <div class="row">
                
                <div class="col-12 col-md-6">
                    
                    <div id="carouselExampleControls" class="carousel slide carosello-custom-padre" data-bs-ride="carousel">
                        @if (count($announcement_to_check->images) > 0)
                        {{-- usare il forelse --}}
                        <div class="carousel-inner carousel-border-custom carosello-border">
                            @foreach ($announcement_to_check->images as $image)
                            {{-- SLIDE --}}
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <div class="caroselloCustom">
                                    <img src="{{$image->getUrl(300,400)}}" class="d-block w-100"
                                    alt="">
                                    {{-- Google API necessariamente nel forEach per controllo su singola immagine --}}
                                    
                                    <div class="d-flex text-start bg-flag-custom mt-2 caroselloCustom2">
                                        
                                        <div class="col-6 align-items-center">
                                            @if ($image->labels)
                                            @foreach ($image->labels as $label)
                                            <p class="ms-2 mt-2 elencoCustom">{{ $label }}</p>
                                            @endforeach
                                            @endif
                                        </div>
                                        
                                        <div class="card-body col-6">
                                            <h4>{{ __('ui.imgRev') }}</h4>
                                            <p>18+:<span class="{{ $image->adult }}"></span></p>
                                            <p>{{ __('ui.spoof') }}:<span class="{{ $image->spoof }}"></span>
                                            </p>
                                            <p>{{ __('ui.medical') }}:<span class="{{ $image->medical }}"></span></p>
                                            <p>{{ __('ui.violence') }}:<span class="{{ $image->violence }}"></span></p>
                                            <p>Hot:<span class="{{ $image->racy }}"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="./media/Presto-logo.png" class="img-fluid p-3 rounded"
                                alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./media/Presto-logo.png" class="img-fluid p-3 rounded"
                                alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./media/Presto-logo.png" class="img-fluid p-3 rounded"
                                alt="...">
                            </div>
                        </div>
                        @endif
                        {{-- bottoni del carosello --}}
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon btnCarouselColor" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        
                    </div>
                </div>
                
                <div class="col-12 col-md-3 d-flex flex-column justify-content-evenly align-items-center">
                    
                    <div class="cardRevisorCustom mb-3">
                        <h2 class="card-title card-revisor-title text-white-custom mb-5 text-center">{{ __('ui.title') }}: {{ $announcement_to_check->title }}</h2>
                        <p class="card-text my-5 card-revisor-description text-white-custom text-center">{{ __('ui.description') }} : {{ $announcement_to_check->description }}</p>
                        <p class="card-text text-white-custom text-center">{{ __('ui.posted') }}:{{ $announcement_to_check->created_at->format('d/m/Y') }}</p>
                    </div>
                    <div class="d-flex justify-content-around"> 
                        <form action="{{ route('revisorAcceptAnnouncement', ['announcement' => $announcement_to_check]) }}" method="POST">
                            @csrf
                            @method('patch')
                            <button type="submit" class="btn btn-success mx-3 shadow">{{ __('ui.accept') }}</button>
                        </form>
                        
                        <form action="{{ route('revisorRejectAnnouncement', ['announcement' => $announcement_to_check]) }}" method="POST">
                            @csrf
                            @method('patch')
                            <button type="submit" class="btn btn-danger mx-3 shadow">{{ __('ui.reject') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @endif
        
        <form class="text-center pb-5" action="{{ route('revisorUndo', ['announcement' => $announcement_to_check]) }}"
            method="POST">
            @csrf
            @method('patch')
            <button type="submit" class="btn bg-yellow-custom shadow undoButton">{{ __('ui.undo') }}</button>
        </form>
    </div>
    
    
</x-layout>
