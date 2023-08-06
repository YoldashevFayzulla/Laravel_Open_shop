<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: 1100px">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <table class="table table-hover">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>answer</th>
                            <th>post</th>


                            <th class="text-center">action</th>
                        </tr>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->question}}</td>

                                <th>{{$contact->post->name}}</th>

                                <td>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-outline-warning m-3"   data-bs-toggle="modal" data-bs-target="#exampleModaledit{{$contact->id}}" data-bs-whatever="@mdo">
                                    Answer
                                    </button>


                                    {{--                                        edit modal--}}

                                    <div class="modal fade" id="exampleModaledit{{$contact->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Answer</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('contact.update',$contact->id)}}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">answer</label>
                                                            <input type="text" class="form-control" name="answer" id="recipient-name">
                                                        </div>
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-outline-primary">Send message</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


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
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>