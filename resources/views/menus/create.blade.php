@extends('layouts.master')
@section('title', 'Create Menu Makanan')
@section('content')
    <section id="contact" class="contact">
        <div class="container mt-5" data-aos="fade-up">
            <div class="section-title">
                <div class="col-lg-8 mt-5 mt-lg-0">
                    <p>CREATE MENU</p>

                    <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data" role="form"
                        class="php-email-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                @forelse ($menus as $menu)
                                    <?php
                                    $angkaId = 001;
                                    for ($i = 0; $i < 999; $i++) {
                                        $angkaId++;
                                    }
                                    ?>
                                @empty
                                @endforelse
                                <label for="id">ID : </label>
                                <select name="id" id="id" class="bg-dark text-light w-25 form-control" required>
                                    <option value="LNC{{ $angkaId }}"
                                        class="form-control @error('id') is-invalid @enderror" name="id">
                                        Lunch
                                    </option>
                                    <option value="SLD{{ $angkaId }}"
                                        class="form-control @error('id') is-invalid @enderror" name="id">
                                        Salads
                                    </option>
                                    <option value="BVG{{ $angkaId }}"
                                        class="form-control @error('id') is-invalid @enderror" name="id">
                                        Beverages
                                    </option>
                                </select>
                                @error('id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group mt-3">
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" id="nama" placeholder="Nama Menu" value="{{ old('nama') }}"
                                    required>
                                @error('nama')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="rekomendasi">Rekomendasi : </label>
                            <select name="rekomendasi" id="rekomendasiOpt" class="bg-dark text-light w-25 form-control"
                                required>
                                <option value="0" class="form-control @error('rekomendasi') is-invalid @enderror"
                                    name="rekomendasi">
                                    -
                                </option>
                                <option value="1" class="form-control @error('rekomendasi') is-invalid @enderror"
                                    name="rekomendasi">
                                    Recommended
                                </option>
                            </select>
                            @error('rekomendasi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga"
                                rows="8" placeholder="Harga" value="{{ old('harga') }}" required>
                            @error('harga')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your menu has been updated. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">CONFIRM</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- End Menu Section -->
@endsection
