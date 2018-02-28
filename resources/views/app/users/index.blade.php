@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="title">{{ $title }}</h4>
                <p class="category">{{ $description }}</p>
                <br>
                
                <div class="card">
                    <div class="card-content">
                        <div class="toolbar">
                            @if(session('message'))
                            {!!session('message')!!}
                            @endif
                            @if($errors->any())
                            <div class="alert alert-danger alert-dismissable">
                                <strong>Failed!</strong>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </div>
                            @endif
                            <button type="button" style="margin-bottom:10px" class="btn btn-info btn-create" name="button" data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="ti-plus"></i> Add User</button>
                            <!--Here you can write extra buttons/actions for the toolbar-->
                        </div>
                        
                        <div class="fresh-datatables table-responsive">
                            <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Nama</th>
                                        <th>E-Mail</th>
                                        <th>No. HP</th>
                                        <th>Alamat</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user => $value)
                                    <tr>
                                        <td>{{ $user +1 }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->address }}</td>
                                        <td>{{ $value->level }}</td>
                                        <td>
                                            <form action="{{ route('users.destroy', $value->id) }}" method="post" style="display:inline">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="button" class="btn btn-danger btn-sm btn-delete">Hapus</button>
                                            </form>
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
    </div>
</div>
@endsection

@section('page_script')
<script type="text/javascript">
    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "responsive": true,
        "language": {
            "search": "_INPUT_",
            "searchPlaceholder": "Cari Data",
        },
        "columnDefs": [
        { "className": "text-center", "targets": "_all" }
        ]
    });

    $(".btn-delete").click(function () {
        swal({
            title: 'Apakah kamu yakin untuk menghapus data ini ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success btn-fill',
            cancelButtonClass: 'btn btn-danger btn-fill',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            buttonsStyling: false
        }).then(() => {
            $(this).parent().submit();
        });
    });
    
    $(".btn-show").click(function () {
        $("#isLoading").show();
        $("#viewResults").hide();
        
        let self = $(this);
        let id   = self.data('id');
        let url  = document.head.querySelector('meta[name="app-url"]').content;
        let url_form = url+'/app/master/destination/'+id;
        
        axios.get(`${url}/app/master/destination/${id}`).then(function (response) {
            let destination = response.data
            let i = 1
            
            $("#code").val(destination[0].code);
            $("#nama").val(destination[0].name);
            $("#provinsi").val(destination[0].province);
            $("#estimate").val(destination[0].estimate);
            $("#url_form").attr("action",url_form);
            
            
            $("#isLoading").hide();
            $("#viewResults").show();
        }).catch((error) => {
            console.log(error);
        });
    });
    
    $(".btn-create").click(function () {
        $("#isLoading").hide();
        $("#viewResults").show();
        let url  = document.head.querySelector('meta[name="app-url"]').content;
        let url_form = url+'/app/users/store/data';
        $("#url_form").attr("action",url_form);
    });
</script>
@endsection
@section('modal')
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{-- <h4 class="modal-title" id="myModalLabel">Modal title</h4> --}}
            </div>
            <div class="modal-body">
                <div id="isLoading" class="text-center">
                    <i class="fa fa-spinner fa-spin fa-5x fa-fw"></i><br />
                    <p>Menggambil data dari server...</p>
                </div>
                <div id="viewResults" style="display:none">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="" action="tes" method="post" id="url_form">
                                {{ csrf_field() }}
                                {{-- {{ method_field('PUT') }} --}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ulangi Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">No. Hp</label>
                                    <input type="number" class="form-control" name="phone" id="phone" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Alamat</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Level</label>
                                    <select name="level" id="level" class="form-control">
                                        <option value="master">Admin</option>
                                        <option value="kurir">Kurir</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1"></label>
                                    <button class="btn btn-primary" type="submit" name="submit" id="btn_submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
