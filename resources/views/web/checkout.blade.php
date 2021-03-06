@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="font-weight-bold">Checkout</h5>
                <hr>
                <p>
                    Please review your order before proceeding.
                </p>
                <div class="text-center">
                    <img src="{{ $order->merchant->image }}" alt="{{ $order->merchant->name }}" class="img-responsive mb-3" style="max-width: 120px">
                </div>
                <h3 class="mb-3 font-weight-bold">
                    {{ $order->merchant->name }}
                </h3>

                <table class="table table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th width="70%">
                            Item
                        </th>
                        <th>
                            Amount
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($total = 0)
                    @foreach($order->items as $item)
                        <tr>
                            <td>
                                {{ "{$item->product->name} ({$item->quantity})" }}
                            </td>
                            <td>
                                <?php
                                $price = ($item->quantity * $item->product->price);
                                $total = $total + $price;
                                ?>
                                {{ number_format($price, 2) }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td>
                            <strong>Total</strong>
                        </td>
                        <td>
                            <strong> {{ number_format($total, 2) }} </strong>
                        </td>
                    </tr>
                    </tfoot>
                </table>
                <form action="">
                    {{ csrf_field() }}
                    <a href="{{ $redirectUrl }}" class="btn btn-primary" style="border-color: white">
                        Confirm
                    </a>
                    <button class="btn">
                        Cancel
                    </button>
                </form>
                <p class="text-muted mt-2">
                    *By clicking "Confirm" button, you will be redirected to the UnionBank Account Login.
                </p>
            </div>
        </div>

        <div class="text-center my-3">
            <small class="text-muted"> Powered by </small>
            <a class="d-block" href="https://www.unionbankph.com/" target="_blank">
                <img class="img-fluid" src="{{ asset('images/ub-logo.png') }}" alt="Union Bank" style="max-width: 200px;">
            </a>
        </div>
    </div>
@endsection
