@extends('frontend.frontend_master')
@section('content')

<div class="container-flude">
    <div class="row">
        <div class="col-lg-4">
            <h3>
                <a href="">My Order</a>
            </h3>
            <h3>
                <a href="">Track your order</a>
            </h3>
            <h3>
                <a href="">Wish list</a>
            </h3>
            <h3>
                <a href="">Chat with seller</a>
            </h3>
            <h3>
                <a href="">Profile info</a>
            </h3>
            <h3>
                <a href="">Address</a>
            </h3>
            <h3>
                <a href="">Support ticket</a>
            </h3>
        </div>
        <div class="col-lg-8">
            <table>
                <tr>
                    <th>Order#</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>10.2.23</td>
                    <td>panding</td>
                    <td>500</td>
                    <td>
                        <a href="">view</a>
                        <a href="">cancle</a>
                    </td>
                </tr>
            </table>

        </div>

    </div>

</div>




@endsection
