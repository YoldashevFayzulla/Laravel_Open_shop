<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

                    {{--                    create modal--}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">create post</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">category`s name:</label>
                                            <input type="text" class="form-control" name="name" id="recipient-name">
                                        </div>

                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">category`s
                                                description:</label>
                                            <input type="text" class="form-control" name="desc" id="recipient-name">
                                        </div>

{{--                                        <div class="mb-3">--}}
{{--                                            <label for="recipient-name" class="col-form-label">post`s category:</label>--}}
{{--                                            <select class="form-control" name="category_id" id="recipient-name">--}}
{{--                                                @foreach($categories as $category)--}}
{{--                                                    <option value="{{$category->id}}">{{$category->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}

                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">post`s image:</label>
                                            <input type="file" class="form-control" name="thumbnail"
                                                   id="recipient-name">
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
                            <th>image</th>
                            <th class="text-center">action</th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$post->name}}</td>
                                <td><img src="storage/{{$post->image}}" width="90px"></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-outline-warning m-3" data-bs-toggle="modal"
                                                data-bs-target="#exampleModaledit{{$post->id}}"
                                                data-bs-whatever="@mdo">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor"
                                                 class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                            </svg>
                                        </button>


                                        {{--edit modal--}}
                                        <div class="modal fade" id="exampleModaledit{{$post->id}}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">edit
                                                            post</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('post.update',$post->id)}}" method="post"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">category`s
                                                                    name: </label>
                                                                <input type="text" class="form-control" name="name"
                                                                       value="{{$post->name}}" id="recipient-name">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">category`s
                                                                    description:</label>
                                                                <input type="text" class="form-control" name="desc"
                                                                       value="{{$post->desc}}" id="recipient-name">
                                                            </div>

{{--                                                            <div class="mb-3">--}}
{{--                                                                <label for="recipient-name" class="col-form-label">post`s--}}
{{--                                                                    category:</label>--}}
{{--                                                                <select class="form-control" name="category_id"--}}
{{--                                                                        id="recipient-name">--}}
{{--                                                                    @foreach($categories as $category)--}}
{{--                                                                        <option value="{{$category->id}}">{{$category->name}}</option>--}}
{{--                                                                    @endforeach--}}
{{--                                                                </select>--}}
{{--                                                            </div>--}}

                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">post`s
                                                                    image:</label>
                                                                <input type="file" class="form-control" name="thumbnail"
                                                                       id="recipient-name">
                                                            </div>


                                                            <button type="button" class="btn btn-outline-secondary"
                                                                    data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn btn-outline-primary">Send
                                                                message
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{--                                        end edit modal--}}

                                        <form action="{{route('post.destroy',$post->id)}}" method="post"
                                              onsubmit="return confirm('o`chirishni xoxlaysizmi');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger m-1">
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