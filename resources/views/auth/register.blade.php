<x-layout>
  <x-sidebar/>
  <div class="container-fluid loginBg">
    <div class="row">
  <h1 class="mt-4 mb-4 h1-form text-center fst-italic text-yellow-custom fs-1">{{__('ui.login/register')}}</h1>
    
    
    <!-- REGISTRAZIONE -->

    <div class="container container-login-custom mb-5" id="container">

        <div class="row body-form">
            <div class="col-12 col-lg-12">
                <div class="form-container sign-up-container">
                    <form method="POST" class="form-custom" action="{{route('register')}}">
                        
                        @csrf
                        
                        <h2 class="h2-form-no-overlay titleFormRegister">{{__('ui.createAccount')}}</h2>
                        <input name="name" type="name"  id="exampleInputName" aria-describedby="nameHelp" placeholder="{{__('ui.name')}}" class="input-form labelFormRegister">
                        @error('name')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                        
                        <input name="email" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email" class="input-form labelFormRegister">
                        @error('email')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                        
                        <input name="password" type="password"  id="exampleInputPassword" placeholder="Password" class="input-form labelFormRegister">
                        @error('password')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                        
                        <input name="password_confirmation" type="password" id="exampleInputPasswordConfirm" placeholder="{{__('ui.confirm')}} password" class="input-form labelFormRegister">
                        @error('password')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                        
                        <button type="submit" class="mt-3 button-form">{{__('ui.register')}}</button>
                    </form>
                </div>
                
                
                <!-- LOGIN -->
                <div class="form-container sign-in-container">
                    
                    <form method="POST" class="form-custom" action="{{route('login')}}">

                        @csrf
                        
                        <h2 class="h2-form-no-overlay titleFormRegister">{{__('ui.login')}}</h2>  
                        
                        <input name="email" type="email"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" class="input-form labelFormRegister">
                        @error('email')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror 
                        <input name="password" type="password"  id="exampleInputPassword1" placeholder="Password" class="input-form labelFormRegister">
                        @error('password')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="mt-3 button-form">{{__('ui.login')}}</button>

                    </form>
                </div>
                
                <!-- LOGIN PARTE OVERLAY -->
                
                <div class="overlay-container">
                    <div class="overlay">
                        
                        <div class="overlay-panel overlay-left">
                            <h2 class="h2-form titleFormRegister">{{__('ui.welcomeBack')}}</h2>
                            <p class="p-form pFormRegister">{{__('ui.signIn')}}</p>
                            <button class="ghost button-form" id="signIn">{{__('ui.login')}}</button>
                        </div>
                        
                        <!-- REGISTRAZIONE PARTE OVERLAY -->
                        
                        <div class="overlay-panel overlay-right">
                            <h2 class="h2-form titleFormRegister">{{__('ui.hello')}}!</h2>
                            <p class="p-form pFormRegister">{{__('ui.doRegister')}}!</p>
                            <button class="ghost button-form" id="signUp">{{__('ui.register')}}</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  </div>

    

</x-layout>