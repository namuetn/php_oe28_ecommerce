@extends('admin_master')

@section('content')
<br>
<div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ trans('text.notifications') }}</h1>
        </div>
    </div>

    <table id="example" class="table table-striped table-bordered table-width">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ trans('text.name') }}</th>
                <th>{{ trans('text.detail') }}</th>
                <th>{{ trans('text.price') }}</th>
                <th>{{ trans('text.created_at') }}</th>
            </tr>
        </thead>
        <tbody>
            @php $count = 1 @endphp
            @foreach($order->orderDetails as $orderDetail)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $orderDetail->productDetail->product->name }}</td>
                    <td>{{ $orderDetail->quantity }} ({{ $orderDetail->productDetail->color }} - {{ $orderDetail->productDetail->size }})</td>
                    <td>${{ $orderDetail->quantity * $orderDetail->productDetail->product->price }}</td>
                    <td>{{ $orderDetail->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>{{ trans('text.name') }}</th>
                <th>{{ trans('text.detail') }}</th>
                <th>{{ trans('text.price') }}</th>
                <th>{{ trans('text.created_at') }}</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
