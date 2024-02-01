

<div>
  
  
  @if (session()->has('message'))
  <div class="flex flex-row justify-content-center alert alert-success alert-message text-center">
    {{session('message')}}
  </div>
  @endif
  
  <div class="bgPageCreate pb-5">


  <div class="container-fluid">
    <div class="row">
      <div class="col-12 my-5">
        <h2 class="text-center fst-italic textAnnouncement">{{__('ui.createYourAnnouncements')}}</h2>
        
      </div>
    </div>
  </div>
  


  <div class="container-fluid d-flex justify-content-center bgCreateAnnouncement container-create-custom">
    
    <div class="row justify-content-between align-items-center p-5 rounded shadow bg-form-create">
      <x-sidebar/>
      
      
      <div class="col-12 col-md-5 d-flex justify-content-center align-items-center flex-column">
        <h3 class="my-3 mx-4 text-center fw-bold text-blue-custom">Presto.it</h3>
        <p class="my-3 mx-4 text-center text-blue-custom">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis veritatis quo facilis velit reicice nteris deleniti, commodi sunt. Officiis, deleniti nesciunt?</p>
        <p class="my-3 mx-4 text-center text-blue-custom">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam quibusdam maxime cumque quo nesciunt facilis itaque, quia expedita, ipsum porro animi reprehenderit iste asperiores enim a explicabo voluptatibus amet ipsam.</p>
      </div>
      
      <div class="col-12 col-md-6 d-flex flex-column align-items-center mx-1 px-0 mt-2">
        
        <form wire:submit.prevent="store">
          
          {{-- TITOLO --}}
          <div class="mb-3">
            <label for="title" class="form-label fw-bold text-blue-custom">{{__('ui.title')}}</label>
            <input wire:model.lazy="title" type="text" class="input-form shadow"  id="exampleInputName"  aria-describedby="nameHelp" placeholder="{{__('ui.titleAnnounc')}}">
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          
          {{-- DESCRIZIONE --}}
          <div class="mb-3">
            <label for="description" class="form-label fw-bold text-blue-custom" >{{__('ui.description')}}</label>
            <textarea wire:model="description" id="exampleInputDescription" cols="30" rows="3" class="input-form shadow" placeholder="{{__('ui.descriptionAnnounc')}}"></textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          
          {{-- PREZZO --}}
          <div class="mb-3">
            <label for="price" class="form-label fw-bold text-blue-custom" >{{__('ui.price')}}</label>
            <input wire:model="price" type="number" class="input-form shadow" id="exampleInputPrice" placeholder="{{__('ui.price')}}">
            @error('price')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          
          {{-- CATEGORIA --}}
          <div class="mb-3">
            <label for="category" class="fw-bold text-blue-custom">{{__('ui.category')}}</label>
            <select wire:model.defer="category" id="category" class="input-form shadow">
              <option value="">{{__('ui.categoryAnnounc')}}</option>
              @foreach ($categories as $category)
              <option value="{{$category->id}}">{{__('cat.' . $category->name)}}</option>
              @endforeach
            </select>
          </div>
          
          <div>
            <label for="price" class="form-label fw-bold text-blue-custom" >{{__('ui.addPhoto')}}</label>
          </div>
          
          <div class="mb-3">
            <input wire:model="temporary_images" type="file" name="images" multiple class="input-form shadow @error('temporary_images.*') is-invalid @enderror" placeholder="{{__('ui.insertImage')}}">
            @error('temporary_images.*')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          
          
          {{-- ANTEPRIMA FOTO --}}
          @if (!empty($images))
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header bg-white-custom">
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body small d-flex flex-column justify-content-between offcanvaCustom">
              @foreach ($images as $key => $image)
              <div class="col my-3">
                <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}}); "></div>
                <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">{{__('ui.remove')}}</button>
              </div>
              @endforeach
            
            </div>
          </div>
          @endif
          <button type="submit" class="btn btn-primary button-form">{{__('ui.create')}}</button>
          <button class="btn btn-primary button-form" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">{{__('ui.preview')}}</i></button>
        </form>
      </div>
      
      
    </div>
  </div>
  
</div>

</div>