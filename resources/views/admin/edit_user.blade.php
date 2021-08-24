@extends('admin.appadmin')

@section('csslib')
  <!-- CSS Libraries -->  

@endsection

@section('maincontent')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>        
        </div>
        <div class="section-body">
            @foreach($errors->getMessages() as $this_error)
            <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle mr-3"></i> {{$this_error[0]}}
            </div> 
            @endforeach
            <h2 class="section-title">Hi, {{ Auth::user()->name }}!</h2>
            <div class="card">
                <form method="post" class="needs-validation" novalidate="">
                <div class="card-header">
                    <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                        <label>Nama Lengkap</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                            </div>
                            <input type="name" name="name" class="form-control" required="">
                        </div>
                        <div class="invalid-feedback">
                            Please fill in the first name
                        </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                        <label>E-Mail</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-at"></i>
                            </div>
                            </div>
                            <input type="email" name="email" class="form-control" required="">
                        </div>
                        <div class="invalid-feedback">
                            Please fill in the last name
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 ">
                        <label>Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                            </div>
                            <input type="password" name="password" class="form-control pwstrength" data-indicator="pwindicator" required="">
                        </div>
                        <div class="invalid-feedback">
                            Please fill in the email
                        </div>
                        </div>
                        <div class="form-group col-md-6 ">
                        <label>Confirm Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                            </div>
                            <input type="password" name="password" class="form-control pwstrength" data-indicator="pwindicator" required="">
                        </div>
                        <div class="invalid-feedback">
                            Please fill in the email
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5 col-12">
                            <label>Phone</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </div>
                                </div>
                                <input type="text" name="no_hp" class="form-control phone-number" value="{{old('no_hp')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Save Changes</button>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scriptlib')
    <!-- JS Libraies -->  
    
@endsection

@section('scriptline')
@endsection