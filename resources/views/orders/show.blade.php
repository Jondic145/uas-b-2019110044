@extends('layouts.master')
@section('title', $order->id)
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h2>Order Number: {{ $order->id }}</h2>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                            <button type="submit" class="btn btn-danger ml-3">Delete</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h4>
            Net Total Harga: {{ $price }}
        </h4>
        <h5>
            @if ($order->status=='selesai')
                <span class="badge badge-success">Pembayaran Selesai</span>
            @else
                <span class="badge badge-warning">Menunggu Pembayaran</span>
            @endif
        </h5>
        <hr>
        <p>s
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>Order Detail</h2>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Item ID</th>
                                <th>Nama Item</th>
                                <th>Jumlah pesanan</th>
                                <th>Harga Satuan</th>
                                <th>Harga Total</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datas as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->item_id }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>
                                        <span class="badge badge-secondary">
                                            <i class="fa fa-star fa-fw"></i>
                                            Normal
                                        </span>
                                    </td>
                                    <td>{{ $data->quantity }}</td>
                                    <td>{{ $data->harga }}</td>
                                    <td>{{ $data->stok }}</td>
                                    {{-- @if ($data->stok)
                                        <td>{{ round($data->harga*$data->quantity*0.9,2) }}</td>
                                    @else
                                        <td>{{ round($data->harga*$data->quantity,2) }}</td>
                                    @endif --}}
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="3">No data yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </p>
    </div>
@endsection
