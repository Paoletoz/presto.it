<x-layout>
    <x-sidebar/>
    
    <div class="bgShowCustom">

        <h2 class="text-center titleShowCustom titleFormRegister fst-italic text-yellow-custom fs-1 pt-4 ">{{__('ui.detailArticle')}}:</h2>

        <div class="container-fluid detail-custom mt-5">
            
            <div class="row justify-content-center">
                
                {{-- <div class="col-md-1"></div> --}}

                <div class="col-12 col-md-4">
                    
                    <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
                                              
                        @if(count($announcement->images)>0)
                                                
                        <div class="carousel-inner carousel-border-custom">
                            @foreach($announcement->images as $image)
                            
                            <div class="carousel-item @if($loop->first)active @endif">
                                <img src="{{$image->getUrl(300, 400)}}" class="d-block w-100" alt="" />
                            </div>
                            
                            @endforeach
                        </div>
                        
                        @else
                        
                        <div class="carousel-inner">
                                                      
                            <div class="carousel-item active ">
                                <img src="./media/Presto-logo.png" class="d-block w-100" alt="" />
                            </div>
                            <div class="carousel-item  ">
                                <img src="./media/Presto-logo.png" class="d-block w-100" alt="" />
                            </div>
                            <div class="carousel-item  ">
                                <img src="./media/Presto-logo.png" class="d-block w-100" alt="" />
                            </div>
                             
                        </div>
                                     
                        @endif
                        
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        
                    </div>

                </div>

                {{-- <div class="col-md-1"></div> --}}


                    <div class="col-12 col-md-4 d-flex align-items-center">
                        <div class="text-white-custom bgShowAnnouncement">

                            <h2 class="h2-show WordCardDetailCustom1 mb-5">{{$announcement->title}}</h2>  

                            <p class="card-text fs-2 WordCardDetailCustom2"> {{$announcement->description}}</p>
                            <p class="card-text fw-bolder priceDetCustom WordCardDetailCustom3"> {{$announcement->price}} €</p>
                                                  
                            <p class="card-footer WordCardDetailCustom4"> Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</p>
                            <p class="WordCardDetailCustom5"> Da: {{$announcement->user->name ?? ''}} </p>

                            <div class="btnDetailCustom">
                                <a href="{{route('homePage')}}" class="btn button-form border-top border-dark"> Torna indietro</a>
                            </div>
                        </div>
                    </div>                  
                
            </div>
        </div>
        
    </div>

    </x-layout>