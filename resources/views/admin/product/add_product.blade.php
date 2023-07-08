@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Product </h4>

			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

  <form method="post" action="{{ route('product-store') }}" enctype="multipart/form-data" >
		 	@csrf

		<div class="row"> <!-- start 1st row  -->
			<div class="col-md-4">

	 <div class="form-group">
	<h5>Brand Select <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="brand_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Select Brand</option>
			@foreach($brands as $brand)
 <option value="{{ $brand->id }}">{{ $brand->brand_name  }}</option>
			@endforeach
		</select>
		@error('brand_id')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 </div>
		 </div>

			</div> <!-- end col md 4 -->

			<div class="col-md-4">

				 <div class="form-group">
	<h5>Category Select <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="category_id" class="form-control category_id" required="" >
			<option value="" selected="" disabled="">Select Category</option>
			@foreach($categories as $category)
 <option value="{{ $category->id }}">{{ $category->category_name }}</option>
			@endforeach
		</select>
		@error('category_id')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 </div>
		 </div>

			</div> <!-- end col md 4 -->


            <div class="col-md-4">

                <div class="form-group">
   <h5>SubCategory Select <span class="text-danger">*</span></h5>
   <div class="controls">
       <select name="subcategory_id" class="form-control category_id" required="" >
           <option value="" selected="" disabled="">SubCategory Select</option>
           @foreach ($subcategories as $subcategory )
<option value="{{ $subcategory->id }}">{{ $subcategory->subCategory_name }}</option>
           @endforeach
       </select>
       @error('category_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
        </div>

           </div> <!-- end col md 4 -->


		</div> <!-- end 1st row  -->



		<div class="row"> <!-- start 2st row  -->
			<div class="col-md-4">

				<div class="form-group">
		   <h5>Product Name  <span class="text-danger">*</span></h5>
		   <div class="controls">
			   <input type="text" name="product_name" class="form-control" required="">
	@error('product_name')
	<span class="text-danger">{{ $message }}</span>
	@enderror
		  </div>
	   </div>
		   </div> <!-- end col md 4 -->

			<div class="col-md-4">

				<div class="form-group">
		   <h5>product price   <span class="text-danger">*</span></h5>
		   <div class="controls">
			   <input type="text" name="product_price" class="form-control" required="">
	@error('product_name_en')
	<span class="text-danger">{{ $message }}</span>
	@enderror
		  </div>
	   </div>
		   </div> <!-- end col md 4 -->


			<div class="col-md-4">

				<div class="form-group">
		   <h5>product discount <span class="text-danger">*</span></h5>
		   <div class="controls">
			   <input type="text" name="product_discount" class="form-control" required="">
	@error('product_name_en')
	<span class="text-danger">{{ $message }}</span>
	@enderror
		  </div>
	   </div>
		   </div>


		</div> <!-- end 2st row  -->

<div class="row"> <!-- start 3th row  -->
			 <!-- end col md 4 -->

			<div class="col-md-4">

	    <div class="form-group">
			<h5>Main Thambnail <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)" required="" >
     @error('product_thambnail')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 <img src="" id="mainThmb">
	 		 </div>
		</div>


			</div> <!-- end col md 4 -->


			<div class="col-md-4">

	    <div class="form-group">
			<h5>Multiple Image <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="file" name="multi_img[]" class="form-control" multiple >
     @error('multi_img')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror


	 		 </div>
		</div>


			</div> <!-- end col md 4 -->

		</div> <!-- end 3td row  -->





<div class="row"> <!-- start 7th row  -->
			<div class="col-md-12">

	    <div class="form-group">
			<h5>Short Description English <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea name="short_descp" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
	 		 </div>
		</div>

			</div> <!-- end col md 6 -->



		</div> <!-- end 7th row  -->


		<div class="row"> <!-- start 3rd row  -->


			<div class="col-md-12">

	     <div class="form-group">
			<h5>Long Description <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor1" name="long_description" rows="10" cols="80">

						</textarea>
	 		 </div>
		</div>


			</div> <!-- end col md 12 -->

		</div> <!-- end 3rd row  -->






	 <hr>


						<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>



@endsection

@section('footer_script')





@endsection
