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
              <h3 class="box-title">coupon List <span class="badge badge-pill badge-danger"> </span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>coupon code</th>
                            <th>type</th>
                            <th>amount</th>
                            <th>validity</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>



 @foreach($coupons as $coupon)
  <tr>
    <td>{{ $coupon->coupon_code  }}</td>

    <td>{{$coupon->type }} </td>
    <td>{{ $coupon->amount }} </td>
    <td>{{ $coupon->validity }} </td>
    <td>
{{-- <a href="{{ route('brand.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a> --}}
<a href="{{ route('coupon-delete',$coupon->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
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
              <h3 class="box-title">Add coupon </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">


<form method="post" action="{{ route('coupon-store') }}" enctype="multipart/form-data">
     @csrf

<div class="form-group">
    <h5> coupon code <span class="text-danger">*</span></h5>
    <div class="controls">
 <input type="text"  name="coupon_code" class="form-control" >
 @error('coupon_code')
 <span class="text-danger">{{ $message }}</span>
 @enderror
</div>
</div>

<div class="form-group">
	<h5>Select type <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="type" class="form-control" required="" >

			<option value="1" selected="" >percentage</option>
			<option value="2" selected="" >Solid amount</option>

		</select>
		@error('type')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 </div>
		 </div>

<div class="form-group">
    <h5> amount <span class="text-danger">*</span></h5>
    <div class="controls">
 <input type="number"  name="amount" class="form-control" >
 @error('amount')
 <span class="text-danger">{{ $message }}</span>
 @enderror
</div>
</div>

<div class="form-group">
    <h5> validity <span class="text-danger">*</span></h5>
    <div class="controls">
 <input type="date"  name="validity" class="form-control" >
 @error('validity')
 <span class="text-danger">{{ $message }}</span>
 @enderror
</div>
</div>


         <div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add coupon">
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

