@extends('home')
@section('content')

    <h1 class="text-center">Cart</h1>
    @if(Session::has('cart'))
        <div class="container">

            <table class="table">
                <thead class="thead-dark">
                <tr>
                    {{--                <th scope="col">#</th>--}}
                    <th scope="col">Name</th>
                    <th scope="col">Quatity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($carts->items as $key => $product)
                    <form action="{{route('carts.update', ['id' => $product['item']->id])}}" method="post">
                        @csrf
                        <tr>
                            {{--                    <th scope="row">{{+$key}}</th>--}}
                            <td>{{ $product['item']->name }}</td>
                            <td data-th="Quantity">
                                <input type="number" name="qty" class="form-control text-center" min="0"
                                       value="{{$product['qty']}}"
                                       style="width: 80px">
                            </td>
                            <td>{{$product['price']}}</td>
                            <td>
                                <img src="{{asset('storage/'. $product['item']->image)}}" style="width: 100px">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-outline-info btn-sm">Update</button>
                            </td>

                            <td>
                                <a href="{{route('carts.remove', ['id' => $product['item']->id])}}">
                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('You sure want to delete? {{$product['item']->name}}')">
                                        Delete
                                    </button>
                                </a>
                            </td>
                        </tr>
                    </form>
                @endforeach
                </tbody>
            </table>

            <div class="row" style="margin-left: 10px">
                <div style="margin-left: 350px ">
                    <p>Total Quatity: {{$carts->totalQty}}</p>
                </div>

                <div style="margin-left: 100px">
                    <p>Total Money Orders : {{$carts->totalPrice}}</p>
                </div>
            </div>
        </div>
    @else
        <p>no cart</p>
    @endif
    <div class="row" style="margin-left: 10px">
        <div>
            <a href="{{route('products.index')}}">
                <input type="button" class="btn btn btn-outline-warning" value="<-- Continue Shopping">
            </a>
        </div>

        <div style="margin-left: 10px">
            <a href="{{route('carts.removeAll')}}">
                <button type="button" class="btn btn- btn-outline-danger">Delete Cart</button>
            </a>
        </div>
    </div>
@endsection
