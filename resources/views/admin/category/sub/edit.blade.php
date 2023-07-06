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


<form method="post" action="{{ route('sub-category-update') }}" enctype="multipart/form-data">
     @csrf


<input type="hidden" name="id" value="{{ $info->id }}">

        <div class="form-group">
            <h5>Category Select <span class="text-danger">*</span></h5>
            <div class="controls">


                <select name="category_id" class="form-control" required="">
                    <option value="" selected="" disabled="">Select
                        Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->category_name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="form-group">
            <h5>sub Category Name <span class="text-danger">*</span></h5>
            <div class="controls">
         <input type="text"  name="subcategory_name" value="{{ $info->subCategory_name}}" class="form-control" >
         @error('subcategory_name')
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


