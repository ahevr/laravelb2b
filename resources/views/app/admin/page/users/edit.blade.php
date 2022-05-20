@extends("app.admin.masterpage")
@section("title","Kullanıcı Düzenle | B2B Ege Sedef Aydınlatma")
@section("pageHeading")
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kullanıcı Yönetim Paneli</h3>
                <p class="text-subtitle text-muted">Ege Sedef Aydınlatma b2b Yönetim Paneli</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("admin.index")}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route("admin.users.index")}}">Kullanıcılar</a></li>
                        <li class="breadcrumb-item disabled">Kullanıcı Düzenle</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section("content")
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ol>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    @endif
    <section class="section">
        <div class="row">
            <form action="{{route("admin.users.update",$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Kullanıcı Adı</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="Kullanıcı Adı"
                                           value="{{$user->name}}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email"
                                           placeholder="Email"
                                           value="{{$user->email}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label>Şifre <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password"
                                           placeholder="Şifre"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <strong>Role:</strong>
                                {!! Form::select('roles[]', $roles, $userRole, array('class' => 'form-control','multiple')) !!}
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-success">Kaydet</button>
                    </div>
                </div>

            </form>
        </div>
    </section>
@endsection
