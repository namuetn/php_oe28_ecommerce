<table class="table" border="1">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ trans('text.details') }}</th>
            <th scope="col">{{ trans('text.price') }}</th>
        </tr>
    </thead>
    <tbody>
        @php $count = 1 @endphp
        @foreach ($datas as $data)
	        @foreach ($data->orderDetails as $orderDetail)
	            <tr>
	                <th scope="row">{{ $count++ }}</th>
	                <td>{{ $orderDetail->productDetail->product->name }} x {{ $orderDetail->quantity }} ({{ $orderDetail->productDetail->color }} - {{ $orderDetail->productDetail->size }})</td>
	                <td>${{ $subTotal = $orderDetail->quantity * $orderDetail->productDetail->product->price }}</td>
	            </tr>
	        @endforeach
	    @endforeach
    </tbody>
</table>
