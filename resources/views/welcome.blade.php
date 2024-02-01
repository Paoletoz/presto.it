<x-layout>
    @if (session()->has('access.denied'))
    <div class="flex flex-row justify-center text-center alert alert-danger alert-message">
        {{ session('access.denied') }}
    </div>
    @endif
    @if (session()->has('message'))
    <div class="flex flex-row justify-center text-center alert alert-success alert-message">
        {{ session('message') }}
    </div>
    @endif

    <section class="container-fluid">
        <div class="row">
            <x-sidebar/>
            <header class="container-fluid headImg">
                <div class="row align-items-center justify-content-center mt-2">
                    <div class="col-12">
                        <h1 class="text-center text-white-custom title-welcome-custom">{{__('ui.titleHome')}}</h1>
                    </div>
                </div>
                <div class="row align-items-end justify-content-center h-75">
                    <div class="col-12 d-flex flex-column align-items-center">
                        <p class="text-white-custom fw-bold fs-3">{{__('ui.lastAnnounc')}}</p>
                        <a href="#jumpDown"><i class="fa-solid fa-3x fa-chevron-down"></i></a>
                    </div>
                </div>
            </header>
            
            <div class="container-fluid" id="jumpDown">
                <div class="row justify-content-center">
                    
                    @foreach ($announcements as $announcement)
                    <div class="col-12 col-md-4 my-4 d-flex justify-content-around">
                        
                        
                        <div class="card">
                            <img src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(300, 400): 'https://picsum.photos/300' }}"
                            class="card-img-top  rounded " alt="">
                            
                            <a href="{{ route('showCategory', ['category' => $announcement->category]) }}"
                                class="btn btn1 ">{{__('cat.' .  $announcement->category->name)}}</a>
                                <div class="card-content">
                                    <h5 class="card-title text-center text-blue-custom"> {{ $announcement->title }}
                                    </h5>
                                    <p class="card-price text-center pb-5 fw-bold"> {{ $announcement->price }} €</p>
                                    <p class=" my-2 text-center"> <span class="fw-bold text-blue-custom">{{__('ui.posted')}}:</span> {{ $announcement->created_at->format('d/m/Y') }}</p>
                                    <p class="text-center mt-0"> <span class="fw-bold text-blue-custom">{{__('ui.by')}}:</span> {{ $announcement->user->name ?? '' }}</p>
                                    {{-- <p class="card-description py-3 text-center"> {{$announcement->description}}</p>  --}}
                                    
                                    <div class="text-center">
                                        <a href="{{ route('showAnnouncements', compact('announcement')) }}"
                                        class="btn button-form">{{__('ui.details')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                {{-- </div> --}}
            </div>
        </section>
        
    </x-layout>
    