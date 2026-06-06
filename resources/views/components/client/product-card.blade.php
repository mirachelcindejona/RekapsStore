@props([
    'link',
    'discount',
    'image',
    'name',
    'price',
    'rating',
    'reviews',
    'category'
])

{{-- product-container --}}
<a href="{{ $link }}" data-category="{{ $category }}" class="product-card flex h-full bg-neutral-50 border border-neutral-200 rounded-[12px] hover:border-neutral-300 hover:cursor-pointer flex-col overflow-hidden transition-all duration-300">

  {{-- discount --}}
  <div class="discountframe flex bg-neutral-50 justify-end h-[20px]">
    @if ($discount > 0)
    <div class="discount bg-secondary-500 px-2 py-1 text-neutral-950 rounded-bl-[6px] flex items-center gap-1">
      <img src="{{ asset('assets/icons/discount.svg') }}" class="w-4 sm:w-5" />
      <span class="disctxt text-[12px] sm:text-md font-semibold">-{{ $discount }}%</span>
    </div>
    @endif
  </div>

  {{-- product-image --}}
  <div class="imgcont bg-neutral-100 aspect-square w-full flex items-center justify-center overflow-hidden">
      <img src="{{ asset('storage/' . $image) }}" class="productimg w-full h-full object-contain" />
  </div>

  {{-- product-details --}}
  <div class="productdetails flex flex-col p-2 flex-1 min-[480px]:gap-1">

    {{-- product-name --}}
    <span class="name line-clamp-1 text-sm xl:text-[17px] lg:text-[15px] font-semibold">{{ $name }}</span>

    {{-- product-price-container --}}
    <div class="flex flex-col">
      @if ($discount > 0)
      <span class="price font-medium text-[12px] md:text-[15px] text-neutral-500 line-through">Rp{{ number_format($price, 0, ',', '.') }}</span>
      @endif
      <span class="price font-bold text-[14px] sm:text-lg text-primary-500">Rp{{ number_format($price - ($price * $discount / 100), 0, ',', '.') }}</span>
    </div>

    {{-- product-rating --}}
    <div class="rating flex gap-1 items-center text-neutral-600 text-sm">
      <img src="{{ asset('assets/icons/star.svg') }}" class="star w-4" />
      <span class="ratingvalue font-medium text-[12px]">{{ $rating ? number_format($rating, 1) : '0.0' }}</span>
      <span>|</span>
      <span class="reviewcount font-medium text-[12px]">{{ $reviews }} Ulasan</span>
    </div>

  </div>
</a>