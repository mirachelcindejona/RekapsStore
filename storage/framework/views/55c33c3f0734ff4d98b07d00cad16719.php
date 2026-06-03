<?php $__env->startSection('title', 'Laporan Voucher dan Discount'); ?>

<?php $__env->startSection('page_title', 'Laporan & Rekap'); ?>

<?php $__env->startSection('page_breadcrumb', 'Laporan Voucher dan Discount'); ?>

<?php $__env->startSection('content'); ?>

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-[20px] flex-wrap gap-[12px]">

        <div class="flex items-center gap-[14px] mb-[24px]">

            <a href="<?php echo e(url('/admin/reports')); ?>"
                class="flex items-center justify-center w-[38px] h-[38px] rounded-full bg-neutral-50 border border-primary-500 text-primary-500 shadow-[0_2px_8px_rgba(0,0,0,0.05)] transition-all duration-[250ms] hover:bg-primary-500 hover:text-neutral-50">

                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">

                    <path d="M19 12H5M12 19l-7-7 7-7" />

                </svg>

            </a>

            <h1 class="text-[20px] font-bold text-neutral-900 m-0">
                Laporan Voucher dan Discount
            </h1>

        </div>

        <div class="flex items-center gap-[12px]">

            <button
                class="flex items-center gap-[8px] px-[18px] py-[10px] rounded-xl border border-primary-500 text-primary-500 bg-neutral-50 font-bold text-[13px] cursor-pointer transition-all duration-[250ms] hover:bg-primary-50">
                🖨 Print
            </button>

            <button
                class="flex items-center gap-[8px] px-[18px] py-[10px] rounded-xl bg-primary-500 text-neutral-50 font-bold text-[13px] shadow-[0_4px_14px_rgba(125,57,235,0.35)] cursor-pointer transition-all duration-[250ms] hover:bg-[#5928a7]">
                ⬇ Export as Excel
            </button>

        </div>

    </div>



    <!-- STATISTIC CARD -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-[24px]">

        <!-- CARD -->
        <div
            class="relative overflow-hidden rounded-3xl bg-white p-5 shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all">

            <div
                class="absolute top-0 right-0 h-20 w-20 rounded-bl-[100%] bg-violet-500/15">
            </div>

            <div
                class="mb-4 flex h-11 w-11 items-center justify-center rounded-2xl bg-violet-100 text-violet-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10.8333 16.6667H3.33333C3.11232 16.6667 2.90036 16.5789 2.74408 16.4226C2.5878 16.2663 2.5 16.0543 2.5 15.8333V8.33333C2.5 8.11232 2.5878 7.90036 2.74408 7.74408C2.90036 7.5878 3.11232 7.5 3.33333 7.5H5.83333M10.8333 16.6667H13.3333C13.5543 16.6667 13.7663 16.5789 13.9226 16.4226C14.0789 16.2663 14.1667 16.0543 14.1667 15.8333V13.75M10.8333 16.6667V15.8333Z" fill="#5928A7"/>
                    <path d="M10.8333 16.6667H3.33333C3.11232 16.6667 2.90036 16.5789 2.74408 16.4226C2.5878 16.2663 2.5 16.0543 2.5 15.8333V8.33333C2.5 8.11232 2.5878 7.90036 2.74408 7.74408C2.90036 7.5878 3.11232 7.5 3.33333 7.5H5.83333M10.8333 16.6667H13.3333C13.5543 16.6667 13.7663 16.5789 13.9226 16.4226C14.0789 16.2663 14.1667 16.0543 14.1667 15.8333V13.75M10.8333 16.6667V15.8333" stroke="#5928A7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3333 4.9987C18.3333 4.55667 18.1577 4.13275 17.8452 3.82019C17.5326 3.50763 17.1087 3.33203 16.6667 3.33203H6.66667C6.22464 3.33203 5.80072 3.50763 5.48816 3.82019C5.17559 4.13275 5 4.55667 5 4.9987V12.4987C5 12.9407 5.17559 13.3646 5.48816 13.6772C5.80072 13.9898 6.22464 14.1654 6.66667 14.1654H16.6667C17.1087 14.1654 17.5326 13.9898 17.8452 13.6772C18.1577 13.3646 18.3333 12.9407 18.3333 12.4987V4.9987ZM15 4.99953C15 5.22054 14.9122 5.43251 14.7559 5.58879C14.5996 5.74507 14.3877 5.83286 14.1667 5.83286C13.9457 5.83286 13.7337 5.74507 13.5774 5.58879C13.4211 5.43251 13.3333 5.22054 13.3333 4.99953C13.3333 4.77852 13.4211 4.56572 13.5774 4.40944C13.7337 4.25316 13.9457 4.16536 14.1667 4.16536C14.3877 4.16536 14.5996 4.25316 14.7559 4.40944C14.9122 4.56572 15 4.77852 15 4.99953ZM14.1667 9.1662C14.3877 9.1662 14.5996 9.0784 14.7559 8.92212C14.9122 8.76584 15 8.55388 15 8.33286V8.33203C15 8.11102 14.9122 7.89906 14.7559 7.74278C14.5996 7.5865 14.3877 7.4987 14.1667 7.4987C13.9457 7.4987 13.7337 7.5865 13.5774 7.74278C13.4211 7.89906 13.3333 8.11102 13.3333 8.33203V8.33286C13.3333 8.55388 13.4211 8.76584 13.5774 8.92212C13.7337 9.0784 13.9457 9.1662 14.1667 9.1662ZM15 11.6662C15 11.8872 14.9122 12.0992 14.7559 12.2555C14.5996 12.4117 14.3877 12.4995 14.1667 12.4995C13.9457 12.4995 13.7337 12.4117 13.5774 12.2555C13.4211 12.0992 13.3333 11.8872 13.3333 11.6662V11.6654C13.3333 11.4444 13.4211 11.2324 13.5774 11.0761C13.7337 10.9198 13.9457 10.832 14.1667 10.832C14.3877 10.832 14.5996 10.9198 14.7559 11.0761C14.9122 11.2324 15 11.4444 15 11.6654V11.6662Z" fill="#5928A7"/>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Total Promo
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                340
            </h2>

        </div>

        <!-- CARD -->
        <div
            class="relative overflow-hidden rounded-3xl bg-white p-5 shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all">

            <div
                class="absolute top-0 right-0 h-20 w-20 rounded-bl-[100%] bg-lime-500/15">
            </div>

            <div
                class="mb-4 flex h-11 w-11 items-center justify-center rounded-2xl bg-lime-100 text-lime-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3327 3.33203H3.33268C2.89065 3.33203 2.46673 3.50763 2.15417 3.82019C1.84161 4.13275 1.66602 4.55667 1.66602 4.9987V14.9987C1.66602 15.4407 1.84161 15.8646 2.15417 16.1772C2.46673 16.4898 2.89065 16.6654 3.33268 16.6654H13.3327C13.3327 16.4444 13.4205 16.2324 13.5768 16.0761C13.733 15.9198 13.945 15.832 14.166 15.832C14.387 15.832 14.599 15.9198 14.7553 16.0761C14.9116 16.2324 14.9993 16.4444 14.9993 16.6654H16.666C17.108 16.6654 17.532 16.4898 17.8445 16.1772C18.1571 15.8646 18.3327 15.4407 18.3327 14.9987V4.9987C18.3327 4.55667 18.1571 4.13275 17.8445 3.82019C17.532 3.50763 17.108 3.33203 16.666 3.33203H14.9993C14.9993 3.55304 14.9116 3.76501 14.7553 3.92129C14.599 4.07757 14.387 4.16536 14.166 4.16536C13.945 4.16536 13.733 4.07757 13.5768 3.92129C13.4205 3.76501 13.3327 3.55304 13.3327 3.33203ZM14.166 7.49953C14.387 7.49953 14.599 7.41173 14.7553 7.25545C14.9116 7.09917 14.9993 6.88721 14.9993 6.6662V6.66536C14.9993 6.44435 14.9116 6.23239 14.7553 6.07611C14.599 5.91983 14.387 5.83203 14.166 5.83203C13.945 5.83203 13.733 5.91983 13.5768 6.07611C13.4205 6.23239 13.3327 6.44435 13.3327 6.66536V6.6662C13.3327 6.88721 13.4205 7.09917 13.5768 7.25545C13.733 7.41173 13.945 7.49953 14.166 7.49953ZM14.9993 9.99953C14.9993 10.2205 14.9116 10.4325 14.7553 10.5888C14.599 10.7451 14.387 10.8329 14.166 10.8329C13.945 10.8329 13.733 10.7451 13.5768 10.5888C13.4205 10.4325 13.3327 10.2205 13.3327 9.99953V9.9987C13.3327 9.77768 13.4205 9.56572 13.5768 9.40944C13.733 9.25316 13.945 9.16536 14.166 9.16536C14.387 9.16536 14.599 9.25316 14.7553 9.40944C14.9116 9.56572 14.9993 9.77768 14.9993 9.9987V9.99953ZM14.166 14.1662C14.387 14.1662 14.599 14.0784 14.7553 13.9221C14.9116 13.7658 14.9993 13.5539 14.9993 13.3329C14.9993 13.1119 14.9116 12.8991 14.7553 12.7428C14.599 12.5865 14.387 12.4987 14.166 12.4987C13.945 12.4987 13.733 12.5865 13.5768 12.7428C13.4205 12.8991 13.3327 13.111 13.3327 13.332C13.3327 13.553 13.4205 13.7658 13.5768 13.9221C13.733 14.0784 13.945 14.1662 14.166 14.1662ZM11.526 7.9612C11.6487 7.77731 11.6933 7.55223 11.65 7.33547C11.6067 7.11871 11.4791 6.92803 11.2952 6.80536C11.1113 6.6827 10.8862 6.63811 10.6695 6.6814C10.4527 6.72469 10.262 6.85231 10.1393 7.0362L7.37018 11.1904L6.42185 10.2429C6.26468 10.0911 6.05418 10.0071 5.83568 10.009C5.61718 10.0109 5.40817 10.0985 5.25367 10.253C5.09916 10.4075 5.01152 10.6165 5.00962 10.835C5.00772 11.0535 5.09172 11.264 5.24352 11.4212L6.91018 13.0879C6.99734 13.1752 7.10281 13.2421 7.21896 13.2837C7.33512 13.3253 7.45906 13.3406 7.58185 13.3285C7.70463 13.3164 7.8232 13.2771 7.92897 13.2136C8.03475 13.1501 8.12511 13.0639 8.19352 12.9612L11.5268 7.9612H11.526Z" fill="#8DB524"/>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Promo Yang Aktif
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                4.7 <span class="text-[16px]">/5</span>
            </h2>

        </div>

        <!-- CARD -->
        <div
            class="relative overflow-hidden rounded-3xl bg-white p-5 shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all">

            <div
                class="absolute top-0 right-0 h-20 w-20 rounded-bl-[100%] bg-yellow-500/15">
            </div>

            <div
                class="mb-4 flex h-11 w-11 items-center justify-center rounded-2xl bg-yellow-100 text-yellow-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                    <path d="M4.96745 8.30078L8.30078 0.800781C8.96382 0.800781 9.59971 1.06417 10.0685 1.53301C10.5374 2.00186 10.8008 2.63774 10.8008 3.30078V6.63411H15.5174C15.759 6.63138 15.9983 6.6812 16.2188 6.78013C16.4392 6.87906 16.6355 7.02473 16.794 7.20704C16.9525 7.38936 17.0695 7.60397 17.1369 7.83599C17.2043 8.06802 17.2204 8.31191 17.1841 8.55078L16.0341 16.0508C15.9738 16.4482 15.772 16.8105 15.4657 17.0708C15.1594 17.3311 14.7694 17.472 14.3674 17.4674H4.96745M4.96745 8.30078V17.4674M4.96745 8.30078H2.46745C2.02542 8.30078 1.6015 8.47638 1.28894 8.78894C0.976376 9.1015 0.800781 9.52542 0.800781 9.96745V15.8008C0.800781 16.2428 0.976376 16.6667 1.28894 16.9793C1.6015 17.2919 2.02542 17.4674 2.46745 17.4674H4.96745" stroke="#C10007" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Voucher Terpakai
            </p>

            <h2 class="text-3xl font-black text-neutral-950">
                124x
            </h2>
        </div>

        <!-- CARD -->
        <div
            class="relative overflow-hidden rounded-3xl bg-white p-5 shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all">

            <div
                class="absolute top-0 right-0 h-20 w-20 rounded-bl-[100%] bg-pink-500/15">
            </div>

            <div
                class="mb-4 flex h-11 w-11 items-center justify-center rounded-2xl bg-pink-100 text-pink-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M15.834 1.66797V4.16797ZM15.834 6.66797V4.16797ZM15.834 4.16797H18.334ZM15.834 4.16797H13.334Z" fill="#00786F"/>
                    <path d="M15.834 1.66797V4.16797M15.834 4.16797V6.66797M15.834 4.16797H18.334M15.834 4.16797H13.334" stroke="#00786F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5 8.8825C16.6098 9.19783 15.6484 9.25459 14.7273 9.04619C13.8061 8.8378 12.9628 8.37278 12.295 7.70497C11.6272 7.03716 11.1622 6.19386 10.9538 5.27271C10.7454 4.35156 10.8022 3.39023 11.1175 2.5H5C4.33696 2.5 3.70107 2.76339 3.23223 3.23223C2.76339 3.70107 2.5 4.33696 2.5 5V15C2.5 15.663 2.76339 16.2989 3.23223 16.7678C3.70107 17.2366 4.33696 17.5 5 17.5H15C15.663 17.5 16.2989 17.2366 16.7678 16.7678C17.2366 16.2989 17.5 15.663 17.5 15V8.8825ZM10 5.83333C10.221 5.83333 10.433 5.92113 10.5893 6.07741C10.7455 6.23369 10.8333 6.44565 10.8333 6.66667V13.3333C10.8333 13.5543 10.7455 13.7663 10.5893 13.9226C10.433 14.0789 10.221 14.1667 10 14.1667C9.77899 14.1667 9.56702 14.0789 9.41074 13.9226C9.25446 13.7663 9.16667 13.5543 9.16667 13.3333V6.66667C9.16667 6.44565 9.25446 6.23369 9.41074 6.07741C9.56702 5.92113 9.77899 5.83333 10 5.83333ZM6.66667 8.33333C6.88768 8.33333 7.09964 8.42113 7.25592 8.57741C7.4122 8.73369 7.5 8.94565 7.5 9.16667V13.3333C7.5 13.5543 7.4122 13.7663 7.25592 13.9226C7.09964 14.0789 6.88768 14.1667 6.66667 14.1667C6.44565 14.1667 6.23369 14.0789 6.07741 13.9226C5.92113 13.7663 5.83333 13.5543 5.83333 13.3333V9.16667C5.83333 8.94565 5.92113 8.73369 6.07741 8.57741C6.23369 8.42113 6.44565 8.33333 6.66667 8.33333ZM13.3333 10.8333C13.5543 10.8333 13.7663 10.9211 13.9226 11.0774C14.0789 11.2337 14.1667 11.4457 14.1667 11.6667V13.3333C14.1667 13.5543 14.0789 13.7663 13.9226 13.9226C13.7663 14.0789 13.5543 14.1667 13.3333 14.1667C13.1123 14.1667 12.9004 14.0789 12.7441 13.9226C12.5878 13.7663 12.5 13.5543 12.5 13.3333V11.6667C12.5 11.4457 12.5878 11.2337 12.7441 11.0774C12.9004 10.9211 13.1123 10.8333 13.3333 10.8333Z" fill="#00786F"/>
                </svg>
            </div>

            <p
                class="mb-1 text-[10px] font-extrabold uppercase tracking-[1px] text-neutral-400">
                Promo Terfavorit
            </p>

            <h2 class="text-[24px] font-black text-neutral-950 leading-[32px]">
                10% New Year
            </h2>

        </div>

    </div>

        <!-- FILTER -->
    <div
        class="bg-neutral-50 rounded-[20px] p-[18px] shadow-[0_2px_16px_rgba(0,0,0,0.07)] mb-[24px]">

        <div class="flex items-center justify-between flex-wrap gap-[18px]">

            <!-- DATE -->
            <div class="flex items-center gap-[12px] flex-wrap">

                <div>
                    <p class="text-[13px] text-neutral-500 mb-[6px]">
                        From
                    </p>

                    <input type="date"
                        class="px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px]">
                </div>

                <div>
                    <p class="text-[13px] text-neutral-500 mb-[6px]">
                        To
                    </p>

                    <input type="date"
                        class="px-[14px] py-[10px] rounded-xl border border-neutral-200 outline-none text-[13px]">
                </div>

            </div>

            <!-- SEARCH -->
            <div class="flex items-center gap-[10px]">

                <input type="text"
                    placeholder="Cari ID Pembayaran atau ID Pelanggan"
                    class="w-[280px] max-[560px]:w-full px-[16px] py-[11px] rounded-xl border border-neutral-200 outline-none text-[13px]">

                <button
                    class="px-[20px] py-[11px] bg-primary-500 text-neutral-50 rounded-xl font-bold text-[13px] hover:bg-[#5928a7] transition-all duration-[250ms]">
                    Cari
                </button>

            </div>

        </div>

    </div>

    <!-- TABLE -->
    <div
        class="w-full overflow-x-auto touch-pan-x [&::-webkit-scrollbar]:h-[6px] [&::-webkit-scrollbar-thumb]:bg-neutral-300 [&::-webkit-scrollbar-thumb]:rounded-full">

        <table
            class="w-full border-collapse bg-neutral-50 rounded-2xl overflow-hidden shadow-[0_2px_16px_rgba(0,0,0,0.07)] min-w-[1000px]">

            <thead class="bg-neutral-100 border-b border-neutral-200">

                <tr>

                    <th
                        class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        ID
                    </th>

                    <th
                        class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        NAMA PROMO
                    </th>

                    <th
                        class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        TIPE PROMO
                    </th>

                    <th
                        class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        VALUE
                    </th>

                    <th
                        class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        TERPAKAI
                    </th>

                    <th
                        class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        PERIODE
                    </th>

                    <th
                        class="text-left px-[16px] py-[14px] text-[12px] font-bold text-neutral-500 whitespace-nowrap">
                        STATUS
                    </th>

                </tr>

            </thead>

            <tbody>

                <!-- ROW -->
                <tr class="hover:bg-primary-50 transition-all">

                    <td
                        class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                        131313
                    </td>

                    <td
                        class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                        10% new year
                    </td>

                    <td
                        class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                        Discount
                    </td>

                    <td
                        class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                        10%
                    </td>

                    <td
                        class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                        7x
                    </td>

                    <td
                        class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                        12/12/12 - 12/12/13
                    </td>

                    <td
                        class="px-[16px] py-[16px] border-t border-neutral-200">

                        <span
                            class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-[#c6ff33]/20 text-[#7ba600]">
                            aktif
                        </span>

                    </td>

                </tr>

                <!-- ROW -->
                <tr class="hover:bg-primary-50 transition-all">

                    <td
                        class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                        131314
                    </td>

                    <td
                        class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                        EKRAFBAIK
                    </td>

                    <td
                        class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                        Voucher
                    </td>

                    <td
                        class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                        Rp. 15.000,-
                    </td>

                    <td
                        class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                        12x
                    </td>

                    <td
                        class="px-[16px] py-[16px] border-t border-neutral-200 text-[13px] font-bold">
                        1/1/2025 - 12/3/2025
                    </td>

                    <td
                        class="px-[16px] py-[16px] border-t border-neutral-200">

                        <span
                            class="px-[10px] py-[4px] rounded-full text-[10px] font-bold bg-yellow-100 text-yellow-700">
                            nonaktif
                        </span>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\RekapsStore\resources\views/admin/report-discount.blade.php ENDPATH**/ ?>