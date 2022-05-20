@extends("app.admin.masterpage")
@section("title","Kategoriler | B2B Ege Sedef Aydınlatma")
@section("pageHeading")
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kategori Yönetim Paneli</h3>
                <p class="text-subtitle text-muted">Ege Sedef Aydınlatma b2b Yönetim Paneli</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
                        <li class="breadcrumb-item disabled">Kategoriler</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section("content")
    <form method="post" action="{{route("admin.categories.addCategory")}}">
        @csrf
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Kategoriler</h2>
                <p>Ürün Kategori Alanı</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <form>
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name"  placeholder="Kategori Adı">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Parent</label>
                                <select name="parent_id" class="form-control">
                                    <option value="0">Alt Kategori Seç</option>
                                    @foreach($allCategories as $key)
                                        <option value="{{$key->id}}">{{$key->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Sil</th>

                                    <th>AltKategorisi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td><b>{{ $category->name }}</b></td>
                                        <td>
                                            <a class="btn btn-danger" href="{{ route('admin.categories.deleteCategory',$category->id) }}"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                        <td>
                                            @if(count($category->childs))
                                                @include('app.admin.page.categories.manageChild',['childs' => $category->childs])
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
