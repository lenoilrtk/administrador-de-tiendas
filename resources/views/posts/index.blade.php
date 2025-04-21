<x-layouts.public>
    <ul class="space-y-6 mb-3.5">
        @foreach ($posts as $post)
            <li>
                <article class="bg-white rounded shadow-lg">
                    <img class="h-72 w-full object-center object-cover" src="{{$post->image}}" alt="">
                    <div class="px-6 py-2">
                        <h1 class="font-semibold text-2xl text-gray-800 hover:text-gray-600 transition duration-300">
                            <a href="{{route('posts.show',$post)}}">{{$post->title}}</a>
                        </h1>

                        <div>
                            {{$post->excerpt}}
                        </div>
                    </div>
                </article>
            </li>
        @endforeach
    </ul>

    <div>
        {{$posts->links()}}
    </div>
</x-layouts.public>