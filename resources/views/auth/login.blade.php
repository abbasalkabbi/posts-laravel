@extends("layouts.app")

@section('content')
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        {{-- start Form --}}
        <form action="{{route('login')}}" method="POST" >
            @csrf
            {{-- error  --}}
            @if (session('status'))
                <div class=" bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{session('status')}}
                </div>
                
            @endif
            {{-- error End  --}}
            {{--  Start Email--}}
            <div class="mb-4">
                <label for="email-address" class="sr-only">Email address</label>
                <input id="email-address" name="email" type="email" autocomplete="email"  
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm
                @error('email')
                border-red-500
                @enderror
                " 
                value="{{old('email')}}"
                placeholder="Email address">
                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                   {{$message}}
                </div>
                @enderror
            </div>
            {{-- End Email --}}
            {{-- Start password --}}
            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password" type="password" autocomplete="password"  
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm
                @error('password')
                border-red-500
                @enderror
                " 
                value="{{old('password')}}"
                placeholder="choose a Password ">
                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                   {{$message}}
                </div>
                @enderror
            </div>
            {{-- End Password --}}
            
            {{-- submit --}}
            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                      <!-- Heroicon name: solid/lock-closed -->
                      <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                      </svg>
                    </span>
                      Login
                  </button>
            </div>
            {{-- submit --}}
        </form>
        {{-- end From --}}
       
    </div>
</div> 

@endsection