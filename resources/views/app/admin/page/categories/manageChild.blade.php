<ol>
    @foreach($childs as $child)
        <li>
          <b> {{ $child->name }}</b>
            <br>
            @if(count($child->childs))
                @include('app.admin.page.categories.manageChild',['childs' => $child->childs])
            @endif
            <a class="btn btn-sm btn-danger" href="{{ route('admin.categories.deleteCategorySub',$child->id) }}"><i class="fa-solid fa-trash"></i></a>
        </li>
    @endforeach
</ol>
