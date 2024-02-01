<x-layout>
 <x-sidebar/>
    
    @if (session()->has('message'))
    <div class="flex flex-row justify-content-center text-center alert alert-success alert-message">
        {{session('message')}}
    </div>
    @endif
    
    <section id="revisorWrapper" class="wrapper-work bgWorkWithUs">
        <div class="container-work">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="img__container d-flex justify-content-center">
                        <img src="/media/WorkWithUs.png" alt="salad" class="img-work"> 
                    </div>   
                    <div class=" content-work">
                        <h2 class="subtitle-work">{{__('ui.wantBecomeRevisor')}}?</h2>
                        <h5 class="title-work text-center">{{__('ui.sendRequestRev')}}!</h5>
                        <a class="btn my-3 subscribe-work" href="{{route('becomeRevisor')}}">{{__('ui.sendRequestCandid')}}</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    
</x-layout>

