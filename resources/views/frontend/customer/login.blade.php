@extends('frontend.frontend_master');

@section('content')

    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">

                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Login</h4>

                    <form action="{{ route('customer.login') }}" method="POST">
                        @csrf
                    <div class="row">


                        <div class="col-md-12 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="email" placeholder="example@email.com">
                        </div>


                        <div class="col-md-12 form-group">
                            <label>password</label>
                            <input class="form-control" type="password" name="password" name="address" placeholder="123 Street">
                        </div>

                        <button type="submit">login</button>

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
