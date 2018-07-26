@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       {{ $title }}
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-lock"></i> Ganti Password</a></li>
      </ol>
    </section>

    <!-- PROFILE -->

    <section class="content">
      
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>

            {!! csrf_field() !!}
            
            {!! Form::open(array('route' => 'putPassword','files'=>true, 'method' => 'PUT')) !!}
            <div class="box-body">  

                <div class="form-group" hidden>
                  <label>id</label>
                  <input type="text" class="form-control" required id="id_user" name="id_user" value="{{ $id_user }}">
                </div>

                <div class="form-group">
                  <label>Password Baru</label>
                  <input type="password" class="form-control" required id="password" name="password" value="" placeholder="Masukkan password baru anda">
                </div>

                <div class="row">
                  
                  <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ganti Password</button>
                  </div>
              </div>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
      
    </section>
    
@endsection

@section('js')

<script type="text/javascript">
    


    
</script>

@endsection








