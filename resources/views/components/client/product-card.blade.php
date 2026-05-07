<a href="{{ $link }}" class="flex h-full">
  <div class="product bg-[#fafafa] border border-[var(--color-neutral-200)] rounded-[12px]
              hover:border-[var(--color-neutral-300)] hover:cursor-pointer
              flex flex-col h-full overflow-hidden transition-all duration-300">

    {{-- discount --}}
    <div class="discountframe flex bg-[#f5f5f5] justify-end min-h-[12px]">
      @if ($discount > 0)
      <div class="discount bg-[#c6ff33] px-2 py-1 text-[#000000]
                  rounded-bl-[6px] flex items-center gap-1">

        <img src="{{ asset('assets/icons/discount.svg') }}"
             class="w-4 sm:w-5" />

        <span class="disctxt text-sm sm:text-md font-semibold">
          -{{ $discount }}%
        </span>

      </div>
      @endif
    </div>

    {{-- image --}}
    <div class="imgcont bg-[#f5f5f5]
                h-[180px] sm:h-[220px] lg:h-[260px]
                flex items-center justify-center overflow-hidden">

      <img src="{{ asset($image) }}"
           class="productimg w-full h-full object-contain p-2" />
    </div>

    {{-- details --}}
    <div class="productdetails flex flex-col p-3 gap-1 flex-1">

      <span class="name text-sm sm:text-lg font-semibold line-clamp-2">
        {{ $name }}
      </span>

      <span class="price font-bold text-base sm:text-xl text-[#7d39eb]">
        {{ $price }}
      </span>

      <div class="rating flex gap-2 items-center text-[#525252] text-sm">

        <img src="{{ asset('assets/icons/star.svg') }}"
             class="star w-4" />

        <span class="ratingvalue font-medium">
          {{ $rating }}
        </span>

        <span>|</span>

        <span class="reviewcount font-medium">
          {{ $reviews }} Ulasan
        </span>

      </div>

    </div>

  </div>
</a>