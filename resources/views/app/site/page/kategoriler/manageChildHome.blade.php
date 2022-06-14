@foreach($childs as $child)
    <li>
        <a style="color: black;text-decoration: none;" href="{{route("site.kategori",$child->url)}}">{{ $child->name }}</a>
        @if(count($child->childs))
            @include('app.site.page.kategoriler.manageChildHome',['childs' => $child->childs])
        @endif
    </li>
@endforeach
