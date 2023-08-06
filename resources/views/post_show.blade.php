@extends('layout')
@section('content')
    {{--    @dd($post)--}}


    <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white text-center">{{$post->name}}</h1>

    <div class="d-flex">
        <div class="flex items-center gap-4 ml-1">
            <a href="{{route('like',$post->id)}}" style="margin: 5px">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5"
                     class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                </svg>
            </a>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed ">{{$post->like}}</p>

            <a class="" style="margin: 10px" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                     class="bi bi-eye" viewBox="0 0 16 16" style="color: #9ca3af">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                </svg>
            </a>
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed ">{{$post->view}}</p>
        </div>
    </div>

    <h2 class="mt-6   text-gray-500 dark:text-gray-400 text-sm leading-relaxed "
        style="margin: 10px">
        {{$post->desc}}
    </h2>

    <form action="{{route('category.update',$post->id)}}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="name" class="form-control" placeholder="question`s name" id="">
        <input type="text" name="question" placeholder="describe your question" id="">

        <button type="submit" class="btn btn-outline-warning "> send</button>

    </form>

@endsection