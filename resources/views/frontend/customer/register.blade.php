@extends('frontend.frontend_master');

@section('content')

    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">

                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Login</h4>

                    <form action="{{ route('customer.register.store') }}" method="POST">
                        @csrf
                    <div class="row">

                        <div class="col-md-6 form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" type="text" placeholder="John">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="email" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" name="mobile" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" name="address" placeholder="123 Street">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>password</label>
                            <input class="form-control" type="password" name="password" name="address" placeholder="123 Street">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>confirm password</label>
                            <input class="form-control" type="text"  placeholder="123 Street">
                        </div>

                        <button type="submit">register</button>

                        </div>


                    </form>
                    </div>


                </div>
            </div>



                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->








@endsection
