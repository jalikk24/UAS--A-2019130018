@extends('layouts.master')
@section('title', 'Create Order Makanan')
@section('content')
    <section id="contact" class="contact">
        <div class="container mt-5" data-aos="fade-up">
            <div class="section-title">
                <div class="col-lg-8 mt-5 mt-lg-0">
                    <p>CREATE ORDER</p>

                    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" role="form"
                        class="php-email-form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3">
                            <div class="col-md-6 form-group">
                                <label for="order_id">NO. MEJA : </label>
                                <select name="order_id" id="order_id" class="bg-dark text-light w-25 form-control"
                                    required>
                                    @forelse ($orders as $order)
                                        <option value="{{ $order->id }}"
                                            class="form-control @error('order_id') is-invalid @enderror" name="order_id">
                                            {{ $order->id }}
                                        </option>
                                    @empty
                                        <option value="">No Data Yet.</option>
                                    @endforelse
                                </select>
                                @error('order_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                @forelse ($menus as $menu)
                                    <div class="card text-left mb-3">
                                        <div class="card-body bg-dark">
                                            <h4 class="card-title">{{ $menu->nama }}</h4>
                                            <h3 id="rekomendasi"><?php
                                            if ($menu->rekomendasi == 1) {
                                                echo 'Recommended';
                                            } else {
                                                echo '-';
                                            }
                                            ?></h3>
                                            <h3 id="harga">
                                                {{ $menu->harga }}</h3>
                                            <input type="number" id="quantity"
                                                class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                                                rows="8" value="{{ old('quantity') }}" min="0">
                                            @error('quantity')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @empty
                                    <option value="">No Data Yet.</option>
                                @endforelse
                            </div>

                            <select name="status" id="status" class="form-control bg-dark text-white">
                                <option value="Selesai">Selesai</option>
                                <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                            </select>

                        </div>
                        <h3 id="totalHarga" name="totalHarga"></h3>
                        <h3 id="totalPPN" name="totalPPN"></h3>
                        <h3 id="totalDiskon" name="totalDiskon"></h3>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your menu has been updated. Thank you!</div>
                        </div>
                        <div class="text-center mb-3"><a class="btn book-a-table-btn" type="button"
                                onclick="hitungHarga();">HITUNG</a>
                        </div>

                        <div class="row text-center ml-4"><button type="submit">CONFIRM</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- End Menu Section -->
@endsection
@push('js_after')
    <script>
        function hitungHarga() {
            let total = document.getElementById("totalHarga").value;
            const jml = document.querySelectorAll("#quantity");
            const varHarga = document.querySelectorAll("#harga");
            const rekomen = document.querySelectorAll("#rekomendasi");
            let hasil = 0;
            let ppn = 0;
            let diskon = 0;
            const rupiah = (number) => {
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                }).format(number);
            }

            for (var i = 0; i < jml.length; i++) {
                if (rekomen[i].innerHTML == "-") {
                    hasil += jml[i].value * varHarga[i].innerHTML;
                } else {
                    hasil += (jml[i].value * varHarga[i].innerHTML) - ((jml[i].value * varHarga[i].innerHTML) * 0.1);
                    diskon += (jml[i].value * varHarga[i].innerHTML) * 0.1;
                }
            }
            total = (hasil + (hasil * 0.11));
            ppn = hasil * 0.11;
            document.getElementById("totalHarga").innerHTML = 'Total yang harus dibayar : ' + rupiah(Math.round(
                total));
            document.getElementById("totalPPN").innerHTML = 'Total PPN : ' + rupiah(Math.round(
                ppn));
            document.getElementById("totalDiskon").innerHTML = 'Total Diskon : ' + rupiah(Math.round(
                diskon));
        }
    </script>
@endpush
