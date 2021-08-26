@extends('admin.appadmin')

@section('csslib')


@endsection

@section('maincontent')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>        
        </div>
        <div class="section-body">
            @if($errors->any())
            @foreach($errors->getMessages() as $this_error)
            <div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle  mr-3"></i> {{$this_error[0]}}
            </div> 
            @endforeach
            @endif 
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check mr-3"></i> {{ Session('success') }} 
            </div>        
            @endif
            <h2 class="section-title">Edit Profile</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">General</a>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Password</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <form action="{{ route('akunupdate', [Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <p class="text-muted">Ubah informasi umum akun.</p>
                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama Lengkap</label>
                                        <div class="col-sm-6 col-md-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                </div>
                                                <input type="name" name="name" class="form-control" required="" value="{{$user->name}}">
                                            </div>                        
                                        </div>                     
                                    </div>
            
                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Email</label>
                                        <div class="col-sm-6 col-md-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-at"></i>
                                                </div>
                                                </div>
                                                <input type="email" class="form-control" disabled value="{{$user->email}}">
                                            </div>                     
                                        </div>                     
                                    </div>
            
                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">No. Hp</label>
                                        <div class="col-sm-6 col-md-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                                </div>
                                                <input type="text" name="no_hp" class="form-control phone-number" value="{{$user->no_hp}}">
                                            </div>               
                                        </div>                     
                                    </div>
            
                                    <div class="card-footer text-md-right">
                                        <button class="save btn btn-success" id="save-btn"  data-url="{{route('validatepass')}}">Simpan</button>
                                    </div>
                                    </form>                                                                                          
                                </div>

                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <form action="{{ route('akunupdate', [Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                    <p class="text-muted">Ubah Password akun.</p>
                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Password</label>
                                        <div class="col-sm-6 col-md-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-lock"></i>
                                                </div>
                                                </div>
                                                <input type="password" name="password" class="form-control pwstrength" data-indicator="pwindicator" required="">
                                            </div>                    
                                        </div>                     
                                    </div>     
                                    
                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Password Confirmation</label>
                                        <div class="col-sm-6 col-md-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-lock"></i>
                                                </div>
                                                </div>
                                                <input type="password" name="password_confirmation" class="form-control pwstrength" data-indicator="pwindicator" required="">
                                            </div>                    
                                        </div>                     
                                    </div>
                                    
                                    <div class="card-footer text-md-right">
                                        <button class="save btn btn-success" id="save-btn" data-url="{{route('validatepass')}}">Simpan</button>
                                    </div>
                                    </form>
                                </div>  

                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </section>
</div>
@endsection

@section('scriptlib')
    <!-- JS Libraies -->  
<script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endsection

@section('scriptpage')
<script src="{{ asset('assets/js/views/akun.js') }}"></script>
@endsection

@section('scriptline')
<script>
    $('.save').click(function(event) {
    var form =  $(this).closest("form");
    var route = $(this).data("url");
    event.preventDefault();
    swal({
    title: 'Masukan password anda',
    content: {
    element: 'input',
    attributes: {
      placeholder: 'Password',
      type: 'password',
    },
    },
    }).then((data) => {
        $.ajax({
            type: 'GET',
            url: route,
            data: {
                password: data,
            },
            dataType: "json",
            success: function(response) {
                // alert(response.result);
                if (response.result == "Accepted") {
                    // swal('Good Job', 'You clicked the button!', 'success'); 
                    form.submit();
                } else {
                    swal('Gagal', 'Password salah!', 'error');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
});
</script>
@endsection