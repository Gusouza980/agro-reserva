<div class="px-0 py-5 py-5container-fluid" x-data="{ show: false }" x-intersect.enter="show = true">
    <div class="px-3 mx-auto w1200 px-lg-0" x-show="show" x-transition.opacity.duration.1500ms>
        <div class="mb-5 row">
            <div class="text-center col-12" style="font-family: Montserrat; font-size: 25px; font-weight: medium;">
                LOJA AGRORESERVA
            </div>
        </div>
        <div class="row">
            @foreach($vendedores as $vendedor)
                <div class="mb-4 duration-700 delay-300 col-12 animate-in slide-in-from-left">
                    <div onclick="window.location.href = '{{ route('marketplace.vendedor', ['slug' => $vendedor->slug]) }}'" class="rounded-md overflow-hidden shadow-sm bg-branco transition duration-500 hover:scale-105 hover:bg-[#E8521B] hover:text-white cpointer">
                        <div class="">
                            <img src="{{ asset($vendedor->banner) }}" style="max-width: 100%;" alt="">
                        </div>
                        <div class="py-2 text-center bg-inherit rounded-b-md cpointer text-inherit" style="width: 100%; font-family: Montserrat; font-size: 18px;">
                            {{ $vendedor->nome }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>