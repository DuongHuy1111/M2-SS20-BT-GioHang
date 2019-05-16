@extends('home')
@section('title', 'Cart Product')
@section('content')
    <h2 class="text-center">Product Cart</h2>

    <div class="container">

        <div align="center">
            <a href="{{route('products.create')}}">
                <button type="submit" class="btn btn-outline-warning btn-sm">Create</button>
            </a>

            {{--            <a href="{{route('products.login')}}">--}}
            {{--                <button type="submit" class="btn btn-outline-info btn-sm">Home</button>--}}
            {{--            </a>--}}

            <a href="{{route('products.logout')}}">
                <button type="button" class="btn btn-outline-primary btn-sm">Logout</button>
            </a>

            <a href="{{route('carts.index')}}">
                <button type="button" class="btn btn-outline-secondary btn-sm">Cart</button>
            </a>
        </div>
        <br>
        <div class="row">
            @foreach($products as $product)
                <div class="col-3">
                    <div class="card text-left" id="card-text-left"
                         style="width: 100%; height: 300px; margin-bottom: 20px">
                        <div class="card-body">
                            <div>
                                @if($product->image)
                                    <img src="{{asset('storage/'. $product->image)}}"
                                         style="width: 90px; height: 100px">
                                @else
                                    {{'No Image'}}
                                @endif
                            </div>
                            <div style="height: 130px">
                                <div>Name Product: {{$product->name}}</div>
                                <div>Price: {{$product->price}}</div>
                                <div>Description: {{$product->description}}</div>
{{--                                <div>{{$product->quantity}}</div>--}}
                                <div>Produce: {{$product->produce}}</div>
                            </div>
                            <div align="center">
                                <a href="">
                                    <button type="button" class="btn btn-outline-info btn-sm">View</button>
                                </a>

                                <a href="{{route('carts.add' , ['id' => $product->id])}}">
                                    <button type="submit" class="btn btn-outline-success btn-sm">Add to Cart</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div>

            </div>

        </div>
        {{$products->links()}}

        {{--        <table class="table table-hover table-condensed">--}}
        {{--            <thead>--}}
        {{--            <tr align="center">--}}
        {{--                <th>#</th>--}}
        {{--                <th>Name Product</th>--}}
        {{--                <th>Price</th>--}}
        {{--                <th>Description</th>--}}
        {{--                <th>Quantity</th>--}}
        {{--                <th>Produce</th>--}}
        {{--                <th>Image</th>--}}
        {{--                <th></th>--}}
        {{--                <th></th>--}}
        {{--                <th></th>--}}
        {{--                <th></th>--}}
        {{--            </tr>--}}
        {{--            </thead>--}}
        {{--            <tbody>--}}
        {{--            @foreach($products as $key => $product)--}}
        {{--                <tr align="center">--}}
        {{--                    <th scope="row">{{+$key}}</th>--}}
        {{--                    <th>{{$product['name']}}</th>--}}
        {{--                    <th>{{$product['price']}}</th>--}}
        {{--                    <th>{{$product['description']}}</th>--}}
        {{--                    <th>{{$product['quantity']}}</th>--}}
        {{--                    <th>{{$product['produce']}}</th>--}}
        {{--                    <td>--}}
        {{--                        @if($product->image)--}}
        {{--                            <img src="{{asset('storage/'. $product->image)}}" style="width: 90px; height: 100px">--}}
        {{--                        @else--}}
        {{--                            {{'No Image'}}--}}
        {{--                        @endif--}}
        {{--                    </td>--}}
        {{--                    <td>--}}
        {{--                        <a href="">--}}
        {{--                            <button type="submit" class="btn btn-outline-success">View</button>--}}
        {{--                        </a>--}}
        {{--                    </td>--}}
        {{--                    <td>--}}
        {{--                        <a href="">--}}
        {{--                            <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>--}}
        {{--                        </a>--}}
        {{--                    </td>--}}
        {{--                    <td>--}}
        {{--                        <a href="{{route('products.delete', ['id' => $product->id])}}">--}}
        {{--                            <button type="submit" class="btn btn-outline-danger btn-sm"--}}
        {{--                                    onclick="return confirm('You sure want to delete? {{$product->name}}')">Delete--}}
        {{--                            </button>--}}
        {{--                        </a>--}}
        {{--                    </td>--}}

        {{--                    <td>--}}
        {{--                        <a href="">--}}
        {{--                            <button type="submit" class="btn btn-outline-info btn-sm">Add to Cart</button>--}}
        {{--                        </a>--}}
        {{--                    </td>--}}
        {{--                </tr>--}}
        {{--            @endforeach--}}
        {{--            </tbody>--}}

        {{--        </table>--}}
    </div>

@endsection
<style>
    #card-text-left:hover {
        border-color: #2a9055;
    }
</style>