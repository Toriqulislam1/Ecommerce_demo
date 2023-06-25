@extends('admin.admin_master')
@section('admin')


<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="row">


<!--   ------------ Add Brand Page -------- -->


      <div class="col-4">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Category </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">


<form method="post" action="{{ route('category-update') }}" enctype="multipart/form-data">
     @csrf


 <div class="form-group">
    <h5>Category Name <span class="text-danger">*</span></h5>
    <div class="controls">
 <input type="text"  name="category_name" value="{{ $category->category_name }}" class="form-control" >
 @error('brand_name_en')
 <span class="text-danger">{{ $message }}</span>
 @enderror
</div>
</div>



<div class="form-group">
    <h5>Category Image <span class="text-danger">*</span></h5>
    <div class="controls">
 <input type="hidden" name="id"  value="{{ $category->id }}" >
 <input type="hidden" name="old_category_image"  value="{{ $category->category_img  }}" >
 <input type="file" name="category_image" class="form-control" >
 @error('brand_image')
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

