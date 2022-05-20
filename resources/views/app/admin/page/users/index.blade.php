@extends("app.admin.masterpage")
@section("title","Kullanıcılar | B2B Ege Sedef Aydınlatma")
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
                        <li class="breadcrumb-item disabled">Kullanıcılar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section("content")
    <div class="card">
        <div class="card-header">
            <div class="card-title" style="float: right">
                @can('user-create')
                    <a href="{{route("admin.users.create")}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Yeni Oluştur</a>
                @endcan

            </div>
            <h4 class="card-title">Kullanıcı Listesi</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Adı</th>
                                <th>Email Adresi</th>
                                <th>Yetki</th>
                                @can('user-delete')
                                    <th>İşlemler</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $usersRow)
                            <tr>
                                <td class="text-bold-500">{{$usersRow->id}}</td>
                                <td class="text-bold-500">{{$usersRow->name}}</td>
                                <td class="text-bold-500">{{$usersRow->email}}</td>
                                <td>
                                    @if(!empty($usersRow->getRoleNames()))
                                        @foreach($usersRow->getRoleNames() as $val)
                                            <label >{{ $val }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @can('user-delete')
                                        <button
                                            data-url="{{route("admin.users.deleteuser",$usersRow)}}"
                                            class="btn btn-danger silButton">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    @endcan

                                    @can('user-edit')
                                        <a class="btn btn-primary" href="{{ route('admin.users.edit',$usersRow) }}">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
