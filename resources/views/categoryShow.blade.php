<x-layout>

    <div class="bgCategoryAnnouncement">

    <div class="container-fluid">
        <div class="row">
            <x-sidebar/>
            <div class="col-12">

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="my-5 text-center fst-italic text-yellow-custom fs-1">{{__('ui.browseCat')}}: {{__('cat.' . $category->name)}}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row justify-content-center">

                            @forelse ($category->announcements as $announcement)
                            <div class="col-12 col-md-4 mb-5 d-flex justify-content-around">


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
                                @empty

                                <div class="col-12">
                                    <h2 class="text-center">{{__('ui.noAnnouncCat')}}!</h2>
                                    <h3 class="text-center my-5">{{__('ui.postOne')}}: <a href="{{route('createAnnouncement')}}" class="btn btn-success p-2">{{__('ui.clickHere')}}!</a></h3>
                                </div>
                                @endforelse
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>

</x-layout>
