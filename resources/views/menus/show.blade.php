@extends('layouts.master')
@section('title', 'Menu Makanan')
@section('content')
    <section id="menu" class="menu section-bg my-auto">
        <div class="container mt-5" data-aos="fade-up">
            <div class="section-title">
                <h2>Menu</h2>
                <p>{{ $menu->nama }}</p>
                <h3>Rp. {{ number_format($menu->harga, 2, ',', '.') }}</h3>
                <h3><?php
                if ($menu->rekomendasi == true) {
                    echo 'Recommended';
                } else {
                    echo '-';
                }
                ?></h3>

                <a href="{{ route('menus.edit', $menu->id) }}" class="btn book-a-table-btn w-25 p-2">Edit
                    Menu</a>
                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                    <button type="submit" class="btn book-a-table-btn w-25 mt-3 p-2">Delete</button>
                    @method('DELETE')
                    @csrf
                </form>
            </div>
        </div>
    </section><!-- End Menu Section -->
@endsection
