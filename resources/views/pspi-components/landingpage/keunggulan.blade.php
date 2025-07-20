<section class="max-w-6xl mx-auto p-3 md:p-5 bg-white rounded-lg">
    <div class="flex flex-col md:flex-row md:flex-wrap gap-5 justify-center items-stretch">
        @foreach ($cardsKeunggulan as $card)
            <div class="bg-[#002789] text-white px-5 py-5 md:py-7 rounded-lg w-full md:w-auto md:max-w-60 flex flex-col md:items-center group hover:bg-[#000b89] transition duration-300 transform">
                <h5 class="text-center text-sm md:text-base font-bold group-hover:scale-105 transform transition-all mb-3 md:mb-0 order-2 md:order-1 hidden md:block min-h-[70px]">
                    {{ $card['title'] }}
                </h5>
                <img src="{{ $card['img'] }}" alt="" class="w-16 h-16 mb-5 md:my-7 mx-auto order-1 md:order-2"
                    loading="lazy">

                <h5 class="text-center text-sm md:text-base font-bold group-hover:scale-105 transform transition-all mb-3 md:mb-0 order-2 md:order-1 md:hidden min-h-[1px]">
                    {{ $card['title'] }}
                </h5>
                <p class="text-justify text-xs md:text-sm group-hover:scale-105 transform transition-all order-3 md:order-3 min-h-[72px]">{{ $card['text'] }} </p>
            </div>
        @endforeach
    </div>
</section>