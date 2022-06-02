@extends("layouts.app")

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        {{-- if loginn --}}
        @auth
        {{-- form add post --}}
         <form action="{{ route('posts') }}" method="post" class="mb-4">
             @csrf
             <div class="mb-4">
                 <label for="body" class="sr-only">Body</label>
                 <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>
   
                 @error('body')
                     <div class="text-red-500 mt-2 text-sm">
                         {{ $message }}
                     </div>
                 @enderror
             </div>
   
             <div>
                 <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
             </div>
         </form>
         {{-- end from --}}
       @endauth
       {{-- end if login --}}
       @if($posts->count())
          @foreach ($posts as $post)
              <div class="mb-4">
                  {{-- author --}}
                  <a href="" class="font-bold">{{$post->user->name}}</a>
                  {{-- date --}}
                  <span class=" text-gray-500 text-sm">
                      {{$post->created_at->diffForHumans()}}
                  </span>
                  {{-- body --}}
                  <p class="mb-2">
                      {{$post->body}}
                  </p>
              </div>
              <div class="flex items-center">
                    {{-- like form --}}
                    @if(!$post->likedBy(auth()->user()))
                    <form action="{{route("post.like",$post->id)}}" method="POST" class="mr-1">
                        @csrf
                        <button type="submit" class="text-blue-500">Like</button>
                    </form>
                    {{-- like form ENd --}}
                    @else
                     {{-- unlike form --}}
                     <form action="{{route("post.unlike",$post->id)}}" method="POST" class="mr-1">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="text-blue-500">UnLike</button>
                    </form>
                    {{-- unlike form ENd --}}
                    @endif
                    <span>{{$post->likes->count()}}{{Str::plural("like",$post->likes->count())}}</span>
              </div>
          @endforeach
       @else
       <p>There Is No Post</p>
       @endif
         {{-- paginate --}}
         <div class="row">
            <div class="col-md-12">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
    
</div> 

@endsection