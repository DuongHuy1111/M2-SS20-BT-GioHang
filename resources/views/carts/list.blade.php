@extends('home')
@section('content')
    <h1 class="text-center">Cart</h1>
    <div class="">

        <table>
            <th>Product</th>
            <th>Price</th>
            <th>Total Quantity</th>
            <th>Produce</th>
            @foreach($carts->items as $key => $product)
                <td>
                    {{$product['item']->name}}
                    <img src="{{asset('storage/'. $product['item']->image)}}">
                </td>
                
                @endforeach
        </table>

    </div>
    @endsection
