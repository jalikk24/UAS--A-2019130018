@extends('layouts.master')
@section('title', 'Menu Makanan')
@section('content')
    <section id="menu" class="menu section-bg my-auto">
        <div class="container mt-5" data-aos="fade-up">
            <div class="section-title">
                <h2>Menu</h2>
                <p>Check Our Tasty Menu</p>
                <a href="{{ route('menus.create') }}" class="btn book-a-table-btn">CREATE NEW MENU</a>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="menu-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-lunch">Lunch</li>
                        <li data-filter=".filter-salads">Salads</li>
                        <li data-filter=".filter-beverages">Beverages</li>
                    </ul>
                </div>
            </div>

            <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

                @forelse ($menus as $menu)
                    <?php
                    $namaFilter = '';
                    $idFilter = substr($menu->id, 0, 3);
                    switch ($idFilter) {
                        case 'LNC':
                            $namaFilter = 'lunch';
                            break;
                        case 'SLD':
                            $namaFilter = 'salads';
                            break;
                        case 'BVG':
                            $namaFilter = 'beverages';
                            break;
                    }
                    ?>
                    <div class="col-lg-6 menu-item filter-{{ $namaFilter }}">
                        <?php
                        $pictureMakanan = '';
                        switch ($idFilter) {
                            case 'LNC':
                                $pictureMakanan = 'assets/img/menu/lobster-bisque.jpg ';
                                break;
                            case 'SLD':
                                $pictureMakanan = 'assets/img/menu/caesar.jpg';
                                break;
                            case 'BVG':
                                $pictureMakanan = 'assets/img/menu/cake.jpg';
                                break;
                        }
                        ?>
                        <img src="{{ $pictureMakanan }}" class="menu-img" alt="">
                        <div class="menu-content">
                            <a href="{{ route('menus.show', $menu->id) }}">{{ $menu->nama }}</a><span>Rp.
                                {{ number_format($menu->harga, 2, ',', '.') }}</span>
                        </div>
                        <div class="menu-ingredients">
                            <?php
                            if ($menu->rekomendasi == true) {
                                echo 'Recommended';
                            } else {
                                echo '-';
                            }
                            ?>
                        </div>
                    </div>
                @empty
                    <h5>No Menu Yet.</h5>
                @endforelse
            </div>

        </div>
    </section><!-- End Menu Section -->
@endsection
