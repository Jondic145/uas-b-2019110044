@extends('layouts.master')
@section('title', 'Edit Item')
@section('content')
    <h2 align="center">Add New Items</h2>
    <br>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="id">ID</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id"
                    value="{{ old('id') }}">
                @error('id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                    value="{{ old('nama') }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="harga">Harga</label>
                <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga"
                    id="harga" value="{{ old('harga') }}">
                @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="stok">Stok</label>
                <input type="number" step="0.1" class="form-control @error('stok') is-invalid @enderror" name="stok"
                    id="stok" min="1" max="10" value="{{ old('stok') }}">
                @error('rating')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
    </form>
@endsection
