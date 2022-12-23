@extends('layouts.master')
@section('title', 'Edit Menu Makanan')
@section('content')
    <section id="contact" class="contact">
        <div class="container mt-5" data-aos="fade-up">
            <div class="section-title">
                <div class="col-lg-8 mt-5 mt-lg-0">
                    <p>EDIT MENU</p>

                    <form action="{{ route('menus.update', ['menu' => $menu->id]) }}" method="POST" role="form"
                        class="php-email-form" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="idKategori">ID : </label>
                                <select name="idKategori" id="idKategori" class="bg-dark text-light w-25 form-control"
                                    required>
                                    <?php
                                    $pilihKategori1 = '';
                                    $pilihKategori2 = '';
                                    $pilihKategori3 = '';

                                    switch (substr($menu->id, 0, 3)) {
                                        case 'LNC':
                                            $pilihKategori1 = 'selected';
                                            break;

                                        case 'SLD':
                                            $pilihKategori2 = 'selected';
                                            break;

                                        case 'BVG':
                                            $pilihKategori3 = 'selected';
                                            break;
                                    }

                                    $varAngkaId = substr($menu->id, 3, 3);
                                    ?>

                                    <option value="{{ 'LNC' . $varAngkaId }}"
                                        class="form-control @error('id') is-invalid @enderror" name="id"
                                        {{ $pilihKategori1 }}>
                                        Lunch
                                    </option>
                                    <option value="{{ 'SLD' . $varAngkaId }}"
                                        class="form-control @error('id') is-invalid @enderror" name="id"
                                        {{ $pilihKategori2 }}>
                                        Salads
                                    </option>
                                    <option value="{{ 'BVG' . $varAngkaId }}"
                                        class="form-control @error('id') is-invalid @enderror" name="id"
                                        {{ $pilihKategori3 }}>
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
                                    name="nama" id="nama" placeholder="Nama Menu"
                                    value="{{ old('nama') ?? $menu->nama }}" required>
                                @error('nama')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="rekomendasi">Rekomendasi : </label>
                            <select name="rekomendasi" id="rekomendasi" class="bg-dark text-light w-25 form-control"
                                required>
                                <?php
                                $varPilih1 = '';
                                $varPilih2 = '';

                                if ($menu->rekomendasi == 0) {
                                    $varPilih1 = 'selected';
                                } else {
                                    $varPilih2 = 'selected';
                                }
                                ?>
                                <option value="0" class="form-control @error('rekomendasi') is-invalid @enderror"
                                    name="rekomendasi" {{ $varPilih1 }}>
                                    -
                                </option>
                                <option value="1" class="form-control @error('rekomendasi') is-invalid @enderror"
                                    name="rekomendasi" {{ $varPilih2 }}>
                                    Recommended
                                </option>
                            </select>
                            @error('rekomendasi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga"
                                rows="8" placeholder="Harga" value="{{ old('harga') ?? $menu->harga }}" required>
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
