@extends('admin.admin_master')
@section('admin')


<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="row">



        <div class="col-8">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Size List <span class="badge badge-pill badge-danger"> </span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>size name </th>

                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

 @foreach($sizes as $item)
  <tr>
    <td>{{ $item->size_name}}</td>


    <td>
{{-- <a href="{{ route('brand.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a> --}}
<a href="{{ route('size-delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 <i class="fa fa-trash"></i></a>
    </td>

 </tr>
  @endforeach
                    </tbody>

                  </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col -->


<!--   ------------ Add Brand Page -------- -->


      <div class="col-4">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Size </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">


<form method="post" action="{{ route('size-add') }}" enctype="multipart/form-data">
     @csrf


 <div class="form-group">
    <h5>size Name <span class="text-danger">*</span></h5>
    <div class="controls">
 <input type="text"  name="size_name" class="form-control" >
 @error('brand_name_en')
 <span class="text-danger">{{ $message }}</span>
 @enderror
</div>
</div>






         <div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                    </div>
                </form>





                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>




      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>


  <div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="row">



        <div class="col-8">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">color List <span class="badge badge-pill badge-danger"> </span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>color name </th>

                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

 @foreach($colors as $item)
  <tr>
    <td>{{ $item->color_name}}</td>


    <td>
{{-- <a href="{{ route('brand.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a> --}}
<a href="{{ route('color-delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 <i class="fa fa-trash"></i></a>
    </td>

 </tr>
  @endforeach
                    </tbody>

                  </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col -->


<!--   ------------ Add Brand Page -------- -->


      <div class="col-4">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add color </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">


<form method="post" action="{{ route('color-add') }}" enctype="multipart/form-data">
     @csrf


 <div class="form-group">
    <h5>color Name <span class="text-danger">*</span></h5>
    <div class="controls">
 <input type="text"  name="color_name" class="form-control" >
 @error('brand_name_en')
 <span class="text-danger">{{ $message }}</span>
 @enderror
</div>
</div>



         <div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                    </div>
                </form>





                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>




      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>


@endsection
