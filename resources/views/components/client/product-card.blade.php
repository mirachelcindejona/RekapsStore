<a href="{{ $link }}"
   class="product-card flex h-full"
   data-category="{{ $category }}">

  <div class="bg-neutral-50 border border-neutral-200 rounded-[12px]
              hover:border-neutral-300 hover:cursor-pointer
              flex flex-col h-full overflow-hidden transition-all duration-300">

    {{-- discount --}}
    <div class="discountframe flex bg-neutral-100 justify-end h-[20px]">
      @if ($discount > 0)
      <div class="discount bg-secondary-500 px-2 py-1 text-neutral-950
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
    <div class="imgcont bg-neutral-100
                h-[180px] sm:h-[220px] lg:h-[260px]
                flex items-center justify-center overflow-hidden">

      <img src="{{ asset($image) }}"
           class="productimg w-full h-full object-contain" />
    </div>

    {{-- details --}}
    <div class="productdetails flex flex-col p-3 gap-1 flex-1">

      <span class="name text-sm sm:text-lg font-semibold line-clamp-2">
        {{ $name }}
      </span>

      <span class="price font-bold text-base sm:text-xl text-primary-500">
        {{ $price }}
      </span>

      <div class="rating flex gap-2 items-center text-neutral-600 text-sm">

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