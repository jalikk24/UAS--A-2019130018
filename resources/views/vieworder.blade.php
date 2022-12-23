@extends('layouts.master')
@section('title', 'List Order Makanan')
@section('content')
    <section id="menu" class="menu section-bg my-auto">
        <div class="container mt-5" data-aos="fade-up">

            <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

                @forelse ($orders as $order)
                    <div class="col-lg-6 menu-item">
                        <div class="menu-content">
                            <a href="">{{ $order->id }}</a><span>No. Meja : {{ $order->id }}</span>

                        </div>
                        <div class="menu-ingredients">
                            <span>Status pembayaran : {{ $order->status }}</span>
                        </div>
                    </div>
                @empty
                    <h5>No Order Yet.</h5>
                @endforelse
            </div>

        </div>
    </section><!-- End Menu Section -->
@endsection
