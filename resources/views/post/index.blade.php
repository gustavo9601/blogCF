<ul>

        @foreach($posts as $post)
                <li>
                        {{$post->title}}
                </li>
        @endforeach

    {{--Muestra las flechas de navegacion--}}
    {{ $posts->links() }}
</ul>