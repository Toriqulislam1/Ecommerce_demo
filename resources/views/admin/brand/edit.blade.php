@extends('admin.admin_master')
@section('admin')


<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-4">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Update Brand </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">

                    @php
                    $brands= App\Models\brand::all()->get();
                @endphp
<form method="post" action="{{ route('brand-update') }}" enctype="multipart/form-data">
     @csrf



 <div class="form-group">
    <h5>Brand Name <span class="text-danger">*</span></h5>
    <div class="controls">
 <input type="text"  name="brand_name" value="{{ $brands->brand_name }}" class="form-control" >
 @error('brand_name_en')
 <span class="text-danger">{{ $message }}</span>
 @enderror
</div>
</div>



<div class="form-group">
    <h5>Brand Image <span class="text-danger">*</span></h5>
    <div class="controls">
 <input type="hidden" name="id" value="{{$brands->first()->id }}" >
 <input type="hidden" name="old_image" value="{{$brands->first()->brand_img }}" >
 <input type="file" name="brand_image" class="form-control" >
 @error('brand_image')
 <span class="text-danger">{{ $message }}</span>
 @enderror
  </div>
</div>


         <div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Now">
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
