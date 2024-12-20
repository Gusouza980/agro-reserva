<div class="px-0 container-fluid bg-[#F5F5F5]" x-data="{
    atual: 0,
    max: {!! count($banners) !!},

    next() {
        if (this.atual < this.max - 1) {
            this.atual++;
        } else {
            this.atual = 0;
        }
    },

    prev() {
        if (this.atual > 0) {
            this.atual--;
        }
        else {
            this.atual = this.max - 1;
        }
    }
}">
    <div id="carouselBannersHome" class="relative carousel carousel-fade slide h-[500px] md:h-[580px]" data-bs-ride="carousel">
        <div class="relative w-full overflow-hidden" style="">
            @php
                $cont = 0;
            @endphp
            {{-- <div class="relative float-left w-full carousel-item active">
                <img src="{{ asset('imagens/banner1.jpg') }}" class="block w-full" alt="..." />
            </div> --}}
            @foreach ($banners as $banner)
                    @if($agent->isMobile())
                        <img num="{{ $cont }}" x-transition x-cloak x-show="atual == {{ $cont }}" class="absolute top-0 left-0 w-full banner-item cursor-pointer" onclick="window.open('{{ $banner->link }}', '_blank')" src="{{ asset($banner->caminho_mobile) }}" class="block w-full" alt="..." />
                    @else
                        <img num="{{ $cont }}" x-transition x-cloak x-show="atual == {{ $cont }}" class="absolute top-0 left-0 w-full banner-item cursor-pointer" onclick="window.open('{{ $banner->link }}', '_blank')" src="{{ asset($banner->caminho) }}" class="block w-full" alt="..." />
                    @endif
                    @php
                        $cont++;
                    @endphp
            @endforeach
        </div>
        <button
            class="absolute top-0 bottom-0 left-8 flex items-center justify-center p-0 text-center border-0 carousel-control-prev hover:outline-none hover:no-underline focus:outline-none focus:no-underline"
            type="button" x-on:click="prev()">
            <span id="banner-ant" class="bg-no-repeat carousel-control-prev-icon bg-white w-8 h-8 rounded-full flex justify-center items-center hover:bg-emerald-400 hover:text-white duration-100 transition" aria-hidden="true">
                <i class="fas fa-chevron-left"></i>
            </span>
            {{-- <span class="visually-hidden">Anterior</span> --}}
        </button>
        <button
            class="absolute top-0 bottom-0 right-8 flex items-center justify-center p-0 text-center border-0 carousel-control-next hover:outline-none hover:no-underline focus:outline-none focus:no-underline"
            type="button" data-bs-target="#carouselBannersHome" data-bs-slide="next" x-on:click="next()">
            <span id="banner-prox" class="bg-no-repeat carousel-control-next-icon bg-white w-8 h-8 rounded-full flex justify-center items-center hover:bg-emerald-400 hover:text-white duration-100 transition" aria-hidden="true">
                <i class="fas fa-chevron-right"></i>
            </span>
            {{-- <span class="visually-hidden">Próximo</span> --}}
        </button>
        <div class="absolute bottom-8 md:bottom-12 w-full flex justify-center gap-2">
            <template x-for="item in max">
                <button x-on:click="atual = item - 1" :class="atual == item - 1? 'text-emerald-400' : 'text-gray-200'">
                    <i class="fas fa-circle cursor-pointer"></i>
                </button>
            </template>
        </div>
    </div>
</div>

<script>
    // $(document).ready(function(){
    //     var num = 0;
    //     var max = $(".banner-item").length - 1;
        
    //     $("#banner-ant").click(function(){
    //         antBanner();
    //     })

    //     $("#banner-prox").click(function(){
    //         proxBanner();
    //     })

    //     setInterval(function () {
    //         proxBanner();
    //     }, 8000);

    //     function antBanner(){
    //         if(num > 0){
    //             num--;
    //         }else{
    //             num = max;
    //         }
    //         atualizaBanner();
    //     }

    //     function proxBanner(){
    //         if(num < max){
    //             num++;
    //         }else{
    //             num = 0;
    //         }
    //         atualizaBanner();
    //     }

    //     function atualizaBanner(){
    //         $(".banner-item").each(function(item, element){
    //             if($(element).attr("num") != num){
    //                 $(element).addClass("hidden");
    //             }else{
    //                 $(element).removeClass("hidden");
    //             }
    //         })
    //     }
    // })
</script>