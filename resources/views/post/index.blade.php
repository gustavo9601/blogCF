<ul>

        @foreach($posts as $post)
                <li>
                    <a href="{{route('posts.show', ['post' => $post])}}">
                        {{$post->title}}
                    </a>
                </li>
        @endforeach

    {{--Muestra las flechas de navegacion--}}
    {{ $posts->links() }}
</ul>