@extends('layouts.admin')

@section('title', 'Orders List')
@section('content-header', 'Order List')
@section('content-actions')
    <a href="{{route('cart.index')}}" class="btn btn-primary">Open POS</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-7"></div>
            <div class="col-md-5">
                <form action="{{route('orders.index')}}">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="date" name="start_date" class="form-control" value="{{request('start_date')}}" />
                        </div>
                        <div class="col-md-5">
                            <input type="date" name="end_date" class="form-control" value="{{request('end_date')}}" />
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-outline-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Total</th>
                    <th>Received Amount</th>
                    <th>Status</th>
                    <th>To Pay</th>
                    <th>Created At</th>
                    <th>Print Invoice</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->getCustomerName()}}</td>
                    <td>{{ config('') }} {{$order->formattedTotal()}}</td>
                    <td>{{ config('') }} {{$order->formattedReceivedAmount()}}</td>
                    <td>
                        @if($order->receivedAmount() == 0)
                            <span class="badge badge-danger">Not Paid</span>
                        @elseif($order->receivedAmount() < $order->total())
                            <span class="badge badge-warning">Partial</span>
                        @elseif($order->receivedAmount() == $order->total())
                            <span class="badge badge-success">Paid</span>
                        @elseif($order->receivedAmount() > $order->total())
                            <span class="badge badge-info">Change</span>
                        @endif
                    </td>
                    <td>{{config('')}} {{number_format($order->total() - $order->receivedAmount(), 2)}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                        <button class="btn btn-primary" onclick="printInvoice({{ $order->id }})"><i class="fa-solid fa-print" style="color: #ffffff;"></i></button>
                        <button class="btn btn-primary" onclick="quotation({{ $order->id }}) "><i class="fa-solid fa-receipt" style="color: #ffffff;"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th>{{ config('') }} {{ number_format($total, 2) }}</th>
                    <th>{{ config('') }} {{ number_format($receivedAmount, 2) }}</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        {{ $orders->render() }}
    </div>
</div>
@endsection
@section('js')
    <script>
        function printInvoice(orderId) {
            // Open the generated PDF in a new window for printing
            window.open('/generate-invoice/' + orderId, '_blank');
        }
        function quotation(orderId){
            window.open('/quotation/' + orderId, '_blank');
        }
    </script>
@endsection