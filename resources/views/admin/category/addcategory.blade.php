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
              <h3 class="box-title">Category List <span class="badge badge-pill badge-danger"> </span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Category En </th>

                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

 @foreach($categories as $item)
  <tr>


    <td><img src="{{ asset($item->category_img ) }}" style="width: 70px; height: 40px;"> </td>
    <td>{{ $item->category_name}}</td>
    <td>
<a href="{{ route('category.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
<a href="{{ route('category-delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
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
              <h3 class="box-title">Add Category </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">


<form method="post" action="{{ route('category-store') }}" enctype="multipart/form-data">
     @csrf


 <div class="form-group">
    <h5>Category Name <span class="text-danger">*</span></h5>
    <div class="controls">
 <input type="text"  name="category_name" class="form-control" >
 @error('brand_name_en')
 <span class="text-danger">{{ $message }}</span>
 @enderror
</div>
</div>



<div class="form-group">
    <h5>Category Image <span class="text-danger">*</span></h5>
    <div class="controls">
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

