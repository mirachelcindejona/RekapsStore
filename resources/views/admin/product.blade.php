@extends('admin.layouts.layout')

@section('content')
    <!-- HEADER -->
    <div class="product-header">
        <div class="product-tabs">
            <button class="tab active">Semua (9)</button>
            <button class="tab">Ready (5)</button>
            <button class="tab">PO (3)</button>
            <button class="tab">Jasa (1)</button>
        </div>

        <a href="../product/add-product.html">
            <button class="btn-primary btn-add-desktop">
                + Tambah Produk
            </button>
        </a>
    </div>

    <!-- TABLE -->
    <div class="product-table-scroll">
        <div class="product-table-container">
            <table class="product-table">
                <thead>
                    <tr>
                        <th>PRODUK</th>
                        <th>KATEGORI</th>
                        <th>HARGA JUAL</th>
                        <th>MODAL</th>
                        <th>STOK</th>
                        <th>RATING</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            <a href="product-detail.html">
                                <div class="product-info">
                                    <img src="{{ asset('assets/img/products/jersey.png') }}" />
                                    <div>
                                        <div class="product-name">Kaos Rekaps</div>
                                        <div class="product-sub">Kaos Rekaps</div>
                                    </div>
                                </div>
                            </a>
                        </td>

                        <td><span class="badge badge-purple">Ready</span></td>
                        <td class="text-bold">Rp75.000</td>
                        <td>Rp45.000</td>
                        <td><span class="badge badge-red">2 pcs</span></td>
                        <td>
                            <div class="rating">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.75343 4.16996C4.0689 4.11803 4.34052 3.91839 4.48425 3.63281L6.03565 0.550385C6.40597 -0.185415 7.45726 -0.182994 7.8242 0.554505L9.36191 3.64515C9.50445 3.93164 9.77549 4.13262 10.091 4.18579L13.0026 4.67647C13.8049 4.8117 14.1185 5.79754 13.5417 6.37146L10.9044 8.99544C10.6357 9.2628 10.5413 9.6591 10.6605 10.0189L11.4738 12.473C11.7541 13.3187 10.8718 14.0811 10.0756 13.6811L7.35233 12.3127C7.07127 12.1715 6.74015 12.1707 6.45845 12.3107L3.72801 13.6671C2.93017 14.0635 2.05137 13.2974 2.33522 12.4529L3.15874 10.0029C3.27951 9.64364 3.18676 9.24696 2.91921 8.97846L0.292428 6.34238C-0.281774 5.76615 0.0356802 4.78193 0.83836 4.6498L3.75343 4.16996Z"
                                        fill="#FFDF20" />
                                </svg>
                                4.8
                            </div>
                        </td>
                        <td><span class="badge badge-green">Aktif</span></td>

                        <td>
                            <div class="table-action">
                                <a href="edit-product.html">
                                    <button class="btn-icon-edit">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.3333 4.16678L15.2442 2.25595C15.4004 2.09973 15.6124 2.01196 15.8333 2.01196C16.0543 2.01196 16.2662 2.09973 16.4225 2.25595L17.7442 3.57762C17.9004 3.73389 17.9882 3.94581 17.9882 4.16678C17.9882 4.38776 17.9004 4.59968 17.7442 4.75595L15.8333 6.66679M13.3333 4.16678L8.5775 8.92262C8.42121 9.07886 8.33338 9.29079 8.33333 9.51179V10.8335C8.33333 11.0545 8.42113 11.2664 8.57741 11.4227C8.73369 11.579 8.94565 11.6668 9.16667 11.6668H10.4883C10.7093 11.6667 10.9213 11.5789 11.0775 11.4226L15.8333 6.66679M13.3333 4.16678L15.8333 6.66679M5 11.6668H4.16667C3.72464 11.6668 3.30072 11.8424 2.98816 12.1549C2.67559 12.4675 2.5 12.8914 2.5 13.3335C2.5 13.7755 2.67559 14.1994 2.98816 14.512C3.30072 14.8245 3.72464 15.0001 4.16667 15.0001H15.8333C16.2754 15.0001 16.6993 15.1757 17.0118 15.4883C17.3244 15.8008 17.5 16.2248 17.5 16.6668C17.5 17.1088 17.3244 17.5327 17.0118 17.8453C16.6993 18.1579 16.2754 18.3335 15.8333 18.3335H12.5"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </a>

                                <button class="btn-icon-delete" onclick="openModal('modalConfirmDelete')">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.50016 5.83325C7.50016 5.17021 7.76355 4.53433 8.2324 4.06549C8.70124 3.59664 9.33712 3.33325 10.0002 3.33325C10.6632 3.33325 11.2991 3.59664 11.7679 4.06549C12.2368 4.53433 12.5002 5.17021 12.5002 5.83325M7.50016 5.83325H12.5002M7.50016 5.83325H5.00016M12.5002 5.83325H15.0002M5.00016 5.83325H3.3335M5.00016 5.83325V14.9999C5.00016 15.4419 5.17576 15.8659 5.48832 16.1784C5.80088 16.491 6.2248 16.6666 6.66683 16.6666H13.3335C13.7755 16.6666 14.1994 16.491 14.512 16.1784C14.8246 15.8659 15.0002 15.4419 15.0002 14.9999V5.83325M15.0002 5.83325H16.6668"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="product-detail.html">
                                <div class="product-info">
                                    <img src="{{ asset('assets/img/products/jersey.png') }}" />
                                    <div>
                                        <div class="product-name">Kaos Rekaps</div>
                                        <div class="product-sub">Kaos Rekaps</div>
                                    </div>
                                </div>
                            </a>
                        </td>

                        <td><span class="badge badge-purple">Ready</span></td>
                        <td class="text-bold">Rp75.000</td>
                        <td>Rp45.000</td>
                        <td><span class="badge badge-red">2 pcs</span></td>
                        <td>
                            <div class="rating">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.75343 4.16996C4.0689 4.11803 4.34052 3.91839 4.48425 3.63281L6.03565 0.550385C6.40597 -0.185415 7.45726 -0.182994 7.8242 0.554505L9.36191 3.64515C9.50445 3.93164 9.77549 4.13262 10.091 4.18579L13.0026 4.67647C13.8049 4.8117 14.1185 5.79754 13.5417 6.37146L10.9044 8.99544C10.6357 9.2628 10.5413 9.6591 10.6605 10.0189L11.4738 12.473C11.7541 13.3187 10.8718 14.0811 10.0756 13.6811L7.35233 12.3127C7.07127 12.1715 6.74015 12.1707 6.45845 12.3107L3.72801 13.6671C2.93017 14.0635 2.05137 13.2974 2.33522 12.4529L3.15874 10.0029C3.27951 9.64364 3.18676 9.24696 2.91921 8.97846L0.292428 6.34238C-0.281774 5.76615 0.0356802 4.78193 0.83836 4.6498L3.75343 4.16996Z"
                                        fill="#FFDF20" />
                                </svg>
                                4.8
                            </div>
                        </td>
                        <td><span class="badge badge-green">Aktif</span></td>

                        <td>
                            <div class="table-action">
                                <a href="edit-product.html">
                                    <button class="btn-icon-edit">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.3333 4.16678L15.2442 2.25595C15.4004 2.09973 15.6124 2.01196 15.8333 2.01196C16.0543 2.01196 16.2662 2.09973 16.4225 2.25595L17.7442 3.57762C17.9004 3.73389 17.9882 3.94581 17.9882 4.16678C17.9882 4.38776 17.9004 4.59968 17.7442 4.75595L15.8333 6.66679M13.3333 4.16678L8.5775 8.92262C8.42121 9.07886 8.33338 9.29079 8.33333 9.51179V10.8335C8.33333 11.0545 8.42113 11.2664 8.57741 11.4227C8.73369 11.579 8.94565 11.6668 9.16667 11.6668H10.4883C10.7093 11.6667 10.9213 11.5789 11.0775 11.4226L15.8333 6.66679M13.3333 4.16678L15.8333 6.66679M5 11.6668H4.16667C3.72464 11.6668 3.30072 11.8424 2.98816 12.1549C2.67559 12.4675 2.5 12.8914 2.5 13.3335C2.5 13.7755 2.67559 14.1994 2.98816 14.512C3.30072 14.8245 3.72464 15.0001 4.16667 15.0001H15.8333C16.2754 15.0001 16.6993 15.1757 17.0118 15.4883C17.3244 15.8008 17.5 16.2248 17.5 16.6668C17.5 17.1088 17.3244 17.5327 17.0118 17.8453C16.6993 18.1579 16.2754 18.3335 15.8333 18.3335H12.5"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </a>

                                <button class="btn-icon-delete" onclick="openModal('modalConfirmDelete')">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.50016 5.83325C7.50016 5.17021 7.76355 4.53433 8.2324 4.06549C8.70124 3.59664 9.33712 3.33325 10.0002 3.33325C10.6632 3.33325 11.2991 3.59664 11.7679 4.06549C12.2368 4.53433 12.5002 5.17021 12.5002 5.83325M7.50016 5.83325H12.5002M7.50016 5.83325H5.00016M12.5002 5.83325H15.0002M5.00016 5.83325H3.3335M5.00016 5.83325V14.9999C5.00016 15.4419 5.17576 15.8659 5.48832 16.1784C5.80088 16.491 6.2248 16.6666 6.66683 16.6666H13.3335C13.7755 16.6666 14.1994 16.491 14.512 16.1784C14.8246 15.8659 15.0002 15.4419 15.0002 14.9999V5.83325M15.0002 5.83325H16.6668"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="product-detail.html">
                                <div class="product-info">
                                    <img src="{{ asset('assets/img/products/jersey.png') }}" />
                                    <div>
                                        <div class="product-name">Kaos Rekaps</div>
                                        <div class="product-sub">Kaos Rekaps</div>
                                    </div>
                                </div>
                            </a>
                        </td>

                        <td><span class="badge badge-purple">Ready</span></td>
                        <td class="text-bold">Rp75.000</td>
                        <td>Rp45.000</td>
                        <td><span class="badge badge-red">2 pcs</span></td>
                        <td>
                            <div class="rating">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.75343 4.16996C4.0689 4.11803 4.34052 3.91839 4.48425 3.63281L6.03565 0.550385C6.40597 -0.185415 7.45726 -0.182994 7.8242 0.554505L9.36191 3.64515C9.50445 3.93164 9.77549 4.13262 10.091 4.18579L13.0026 4.67647C13.8049 4.8117 14.1185 5.79754 13.5417 6.37146L10.9044 8.99544C10.6357 9.2628 10.5413 9.6591 10.6605 10.0189L11.4738 12.473C11.7541 13.3187 10.8718 14.0811 10.0756 13.6811L7.35233 12.3127C7.07127 12.1715 6.74015 12.1707 6.45845 12.3107L3.72801 13.6671C2.93017 14.0635 2.05137 13.2974 2.33522 12.4529L3.15874 10.0029C3.27951 9.64364 3.18676 9.24696 2.91921 8.97846L0.292428 6.34238C-0.281774 5.76615 0.0356802 4.78193 0.83836 4.6498L3.75343 4.16996Z"
                                        fill="#FFDF20" />
                                </svg>
                                4.8
                            </div>
                        </td>
                        <td><span class="badge badge-green">Aktif</span></td>

                        <td>
                            <div class="table-action">
                                <a href="edit-product.html">
                                    <button class="btn-icon-edit">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.3333 4.16678L15.2442 2.25595C15.4004 2.09973 15.6124 2.01196 15.8333 2.01196C16.0543 2.01196 16.2662 2.09973 16.4225 2.25595L17.7442 3.57762C17.9004 3.73389 17.9882 3.94581 17.9882 4.16678C17.9882 4.38776 17.9004 4.59968 17.7442 4.75595L15.8333 6.66679M13.3333 4.16678L8.5775 8.92262C8.42121 9.07886 8.33338 9.29079 8.33333 9.51179V10.8335C8.33333 11.0545 8.42113 11.2664 8.57741 11.4227C8.73369 11.579 8.94565 11.6668 9.16667 11.6668H10.4883C10.7093 11.6667 10.9213 11.5789 11.0775 11.4226L15.8333 6.66679M13.3333 4.16678L15.8333 6.66679M5 11.6668H4.16667C3.72464 11.6668 3.30072 11.8424 2.98816 12.1549C2.67559 12.4675 2.5 12.8914 2.5 13.3335C2.5 13.7755 2.67559 14.1994 2.98816 14.512C3.30072 14.8245 3.72464 15.0001 4.16667 15.0001H15.8333C16.2754 15.0001 16.6993 15.1757 17.0118 15.4883C17.3244 15.8008 17.5 16.2248 17.5 16.6668C17.5 17.1088 17.3244 17.5327 17.0118 17.8453C16.6993 18.1579 16.2754 18.3335 15.8333 18.3335H12.5"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </a>

                                <button class="btn-icon-delete" onclick="openModal('modalConfirmDelete')">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.50016 5.83325C7.50016 5.17021 7.76355 4.53433 8.2324 4.06549C8.70124 3.59664 9.33712 3.33325 10.0002 3.33325C10.6632 3.33325 11.2991 3.59664 11.7679 4.06549C12.2368 4.53433 12.5002 5.17021 12.5002 5.83325M7.50016 5.83325H12.5002M7.50016 5.83325H5.00016M12.5002 5.83325H15.0002M5.00016 5.83325H3.3335M5.00016 5.83325V14.9999C5.00016 15.4419 5.17576 15.8659 5.48832 16.1784C5.80088 16.491 6.2248 16.6666 6.66683 16.6666H13.3335C13.7755 16.6666 14.1994 16.491 14.512 16.1784C14.8246 15.8659 15.0002 15.4419 15.0002 14.9999V5.83325M15.0002 5.83325H16.6668"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="product-detail.html">
                                <div class="product-info">
                                    <img src="{{ asset('assets/img/products/jersey.png') }}" />
                                    <div>
                                        <div class="product-name">Kaos Rekaps</div>
                                        <div class="product-sub">Kaos Rekaps</div>
                                    </div>
                                </div>
                            </a>
                        </td>

                        <td><span class="badge badge-purple">Ready</span></td>
                        <td class="text-bold">Rp75.000</td>
                        <td>Rp45.000</td>
                        <td><span class="badge badge-red">2 pcs</span></td>
                        <td>
                            <div class="rating">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.75343 4.16996C4.0689 4.11803 4.34052 3.91839 4.48425 3.63281L6.03565 0.550385C6.40597 -0.185415 7.45726 -0.182994 7.8242 0.554505L9.36191 3.64515C9.50445 3.93164 9.77549 4.13262 10.091 4.18579L13.0026 4.67647C13.8049 4.8117 14.1185 5.79754 13.5417 6.37146L10.9044 8.99544C10.6357 9.2628 10.5413 9.6591 10.6605 10.0189L11.4738 12.473C11.7541 13.3187 10.8718 14.0811 10.0756 13.6811L7.35233 12.3127C7.07127 12.1715 6.74015 12.1707 6.45845 12.3107L3.72801 13.6671C2.93017 14.0635 2.05137 13.2974 2.33522 12.4529L3.15874 10.0029C3.27951 9.64364 3.18676 9.24696 2.91921 8.97846L0.292428 6.34238C-0.281774 5.76615 0.0356802 4.78193 0.83836 4.6498L3.75343 4.16996Z"
                                        fill="#FFDF20" />
                                </svg>
                                4.8
                            </div>
                        </td>
                        <td><span class="badge badge-green">Aktif</span></td>

                        <td>
                            <div class="table-action">
                                <a href="edit-product.html">
                                    <button class="btn-icon-edit">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.3333 4.16678L15.2442 2.25595C15.4004 2.09973 15.6124 2.01196 15.8333 2.01196C16.0543 2.01196 16.2662 2.09973 16.4225 2.25595L17.7442 3.57762C17.9004 3.73389 17.9882 3.94581 17.9882 4.16678C17.9882 4.38776 17.9004 4.59968 17.7442 4.75595L15.8333 6.66679M13.3333 4.16678L8.5775 8.92262C8.42121 9.07886 8.33338 9.29079 8.33333 9.51179V10.8335C8.33333 11.0545 8.42113 11.2664 8.57741 11.4227C8.73369 11.579 8.94565 11.6668 9.16667 11.6668H10.4883C10.7093 11.6667 10.9213 11.5789 11.0775 11.4226L15.8333 6.66679M13.3333 4.16678L15.8333 6.66679M5 11.6668H4.16667C3.72464 11.6668 3.30072 11.8424 2.98816 12.1549C2.67559 12.4675 2.5 12.8914 2.5 13.3335C2.5 13.7755 2.67559 14.1994 2.98816 14.512C3.30072 14.8245 3.72464 15.0001 4.16667 15.0001H15.8333C16.2754 15.0001 16.6993 15.1757 17.0118 15.4883C17.3244 15.8008 17.5 16.2248 17.5 16.6668C17.5 17.1088 17.3244 17.5327 17.0118 17.8453C16.6993 18.1579 16.2754 18.3335 15.8333 18.3335H12.5"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </a>

                                <button class="btn-icon-delete" onclick="openModal('modalConfirmDelete')">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.50016 5.83325C7.50016 5.17021 7.76355 4.53433 8.2324 4.06549C8.70124 3.59664 9.33712 3.33325 10.0002 3.33325C10.6632 3.33325 11.2991 3.59664 11.7679 4.06549C12.2368 4.53433 12.5002 5.17021 12.5002 5.83325M7.50016 5.83325H12.5002M7.50016 5.83325H5.00016M12.5002 5.83325H15.0002M5.00016 5.83325H3.3335M5.00016 5.83325V14.9999C5.00016 15.4419 5.17576 15.8659 5.48832 16.1784C5.80088 16.491 6.2248 16.6666 6.66683 16.6666H13.3335C13.7755 16.6666 14.1994 16.491 14.512 16.1784C14.8246 15.8659 15.0002 15.4419 15.0002 14.9999V5.83325M15.0002 5.83325H16.6668"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- duplicate sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    <div class="modal" id="modalConfirmDelete">
        <div class="modal-content confirm-delete">
            <div class="alert-icon">
                <svg width="114" height="114" viewBox="0 0 114 114" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="57" cy="57" r="46.5" stroke="#FB2C36" stroke-width="7" />
                    <path d="M57 30V65" stroke="#FB2C36" stroke-width="7" stroke-linecap="round" />
                    <circle cx="57" cy="84" r="5" fill="#FB2C36" />
                </svg>
            </div>

            <p class="confirm-text">
                Anda yakin ingin menghapus produk Jersey RPL?
            </p>

            <div class="modal-actions-row">
                <button type="button" class="btn-cancel-sm" onclick="closeModal('modalConfirmDelete')">
                    Batal
                </button>
                <button type="button" class="btn-danger-sm" onclick="successDelete()">
                    Hapus
                </button>
            </div>
        </div>
    </div>

    <div class="modal" id="modalSuccessAction">
        <div class="modal-content success-popup">
            <div class="success-icon-large">
                <svg width="114" height="114" viewBox="0 0 114 114" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M104.5 57C104.5 83.2335 83.2335 104.5 57 104.5C30.7665 104.5 9.5 83.2335 9.5 57C9.5 30.7665 30.7665 9.5 57 9.5C83.2335 9.5 104.5 30.7665 104.5 57Z"
                        stroke="#C6FF33" stroke-width="7" stroke-miterlimit="1.50916" />
                    <path d="M42.75 57L52.25 66.5L71.25 47.5" stroke="#C6FF33" stroke-width="7" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>

            <h2 class="success-title">Produk berhasil dihapus!</h2>
        </div>
    </div>

    <!-- Overlay sidebar mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

    <!-- button add mobile -->
    <a href="../product/add-product.html">
        <button class="btn-add-mobile">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </a>

    <script>
        /* ---- Sidebar Toggle ---- */
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("open");
            document.getElementById("sidebarOverlay").classList.toggle("show");
        }

        function closeSidebar() {
            document.getElementById("sidebar").classList.remove("open");
            document.getElementById("sidebarOverlay").classList.remove("show");
        }
    </script>
    <script src="{{ asset('js/products.js') }}"></script>
@endsection
