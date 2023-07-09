@extends('admin.admin_master')
@section('admin')


<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="row">



        <div class="col-md-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Brand List <span class="badge badge-pill badge-danger"> </span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>

                            <th>Image</th>
                            <th>product name</th>
                            <th>product price</th>


                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

 @foreach($products as $item)
  <tr>
    <td><img src="{{ asset($item->preview) }}" style="width: 70px; height: 40px;"> </td>

    <td>{{ $item-> 	product_name }}</td>
    <td>{{ $item->product_price  }}</td>


    <td>
<a href="{{ route('brand.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>


<a href="{{ route('brand-delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 <i class="fa fa-trash"></i></a>


 <a href="{{ route('inventory-add',$item->id) }}" class="btn btn-success" title="inventory" >
    <i class="fas fa-inventory"></i>  inventory  </a>
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


      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>





@endsection
