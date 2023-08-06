<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Answer and question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: 1100px">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <button class="btn btn-outline-primary m-3" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-bs-whatever="@mdo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="20" fill="currentColor"
                             class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>
                    </button>

                    {{--create modal--}}

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">create category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('category.store')}}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">category`s name:</label>
                                            <input type="text" class="form-control" name="name" id="recipient-name">
                                        </div>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-outline-primary">Send message</button>
                                    </form>
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-hover">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>question</th>
                            <th>Post name</th>
                            <th>status</th>
                            <th class="text-center">action</th>
                        </tr>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->question}}</td>


                                <th>{{$contact->post->name}}</th>
                                <th>@if($contact->status == 1) answered @elseif($contact->status==0) <p class="text-red">question</p>  @else <p class="primary">answer</p> @endif</th>

                                <th>

                                    <div class="d-flex">
                                    @if($contact->status == 3)
                                        <a href="{{route('contact.show',$contact->id)}}" class="btn btn-success"> true </a>
                                    @endif


                                    <div class="d-flex justify-content-center">
                                        <form action="{{route('contact.destroy',$contact->id )}}" method="post"
                                              onsubmit="return confirm('are you sure for deleting ');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-outline-danger btn m-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor"
                                                     class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>