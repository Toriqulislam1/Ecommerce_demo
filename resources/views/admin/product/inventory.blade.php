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
              <h3 class="box-title">Inventory List <span class="badge badge-pill badge-danger"> </span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Quantity </th>
                            <th>color</th>
                            <th>size</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>



 @foreach($inventories as $item)
  <tr>
    <td>{{ $item->quantity  }}</td>

    <td>{{ $item->color_id }} </td>
    <td>{{ $item->size_id }} </td>
    <td>
<a href="{{ route('brand.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
<a href="{{ route('brand-delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
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
              <h3 class="box-title">Add Inventory </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">


<form method="post" action="{{ route('inventory-store') }}" enctype="multipart/form-data">
     @csrf


<input type="hidden" name="product_id" value="{{ $product_id->id }}">

<div class="form-group">
	<h5>color Select <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="color_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Select Brand</option>
			@foreach($colors as $color)
 <option value="{{ $color->id }}">{{ $color->color_name  }}</option>
			@endforeach
		</select>
		@error('brand_id')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 </div>
		 </div>

<div class="form-group">
	<h5>Size Select <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="size_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Select Brand</option>
			@foreach($sizes as $size)
 <option value="{{ $size->id }}">{{ $size->size_name  }}</option>
			@endforeach
		</select>
		@error('brand_id')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 </div>
		 </div>

<div class="form-group">
    <h5>Quantity <span class="text-danger">*</span></h5>
    <div class="controls">
 <input type="number"  name="quantity" class="form-control" >
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
