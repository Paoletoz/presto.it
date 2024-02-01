<x-layout>

    <div class="bgAllAnnouncement">

    <div class="container-fluid">
        <div class="row altezzaCustomRow">
            <div class=" col-12 col-md-2 p-0 ">
                <x-sidebar/> 
                
                
            </div>
            
            <div class="col-md-8 bg-indexAnnouncement-custom shadow my-5 rounded-2">
                
                
                
                
                
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="h2Annunci text-center py-5 fst-italic text-yellow-custom fs-1">{{__('ui.allAnnouncements')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                @foreach ($announcements as $announcement)
                                <div class="col-12 col-md-4 my-4 d-flex justify-content-around">
                                    
                                    
                                    <div class="card">
                                        <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300,400) : 'https://picsum.photos/300'}}" class="card-img-top  rounded " alt="">
                                        
                                        <a href="{{route('showCategory',['category'=>$announcement->category])}}" class="btn btn1 ">{{__('cat.' . $announcement->category->name)}}</a> 
                                        <div class="card-content">
                                            <h5 class="card-title text-center text-blue-custom"> {{$announcement->title}} </h5>
                                            <p class="card-price text-center pb-5 fw-bold"> {{$announcement->price}} €</p>
                                            <p class=" my-2 text-center"> <span class="fw-bold text-blue-custom">{{__('ui.posted')}}:</span> {{$announcement->created_at->format('d/m/Y')}}</p>
                                            <p class="text-center mt-0"> <span class="fw-bold text-blue-custom">{{__('ui.by')}}:</span> {{$announcement->user->name ?? ''}}</p>
                                            {{-- <p class="card-description py-3 text-center"> {{$announcement->description}}</p>  --}}
                                            
                                            <div class="text-center">     
                                                <a href="{{route('showAnnouncements', compact('announcement'))}}" class="btn button-form   ">{{__('ui.details')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                @endforeach
                                
                                {{$announcements->links()}}
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</x-layout>