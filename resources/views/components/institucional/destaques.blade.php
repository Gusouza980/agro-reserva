<div class="w-full px-0 py-10 bg-[#F5F5F5]" style="background: url('/imagens/bg-racas.webp'); background-repeat: none; background-size: cover;" x-data="{ show: false }" x-intersect.enter="show = true"  style="position: relative;">
    <div class="w1200 mx-auto text-center mb-5">
        <div class="text-slate-300" style="font-family: 'Montserrat', sans-serif; font-size: 25px; font-weight: medium;">
            DESTAQUES
        </div>
    </div>
    <div class="relative mx-auto w1200">
        <div id="carouselDestaques" class="relative carousel carousel-fade slide" data-bs-ride="carousel">
            <div class="relative w-full overflow-hidden carousel-inner" style="">
                <div class="carousel-item active w-full d-flex md:space-x-4 items-center">
                    @php
                        $noticia = \App\Models\Noticia::where("publicada", true)->orderBy("created_at", "DESC")->first();
                    @endphp
                    <div>
                        <img src="{{$noticia->banner}}" style="height: 300px; border-radius: 10px;" alt="">
                    </div>
                    <div class="w-full max-w-[50%]">
                        <h1 class="text-white text-2xl font-bolder font-montserrat">{{$noticia->titulo}}</h1>
                        <h2 class="text-slate-300 text-lg font-bolder font-montserrat mt-4">{{$noticia->subtitulo}}</h2>
                        <div class="mt-10">
                            <a name="" id="" class="px-[30px] py-[10px] bg-[#E8521B] text-[#FFFFFF] rounded-[6px] transition duration-300 font-montserrat text-[17px] font-bold hover:text-white hover:bg-[#b83f13]" href="#" role="button">Ver mais</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item w-full d-flex md:space-x-4 items-center">
                    @php
                        $noticia = \App\Models\Noticia::where("publicada", true)->orderBy("created_at", "DESC")->skip(1)->take(1)->first();
                    @endphp
                    <div>
                        <img src="{{$noticia->banner}}" style="height: 300px; border-radius: 10px;" alt="">
                    </div>
                    <div class="w-full max-w-[50%]">
                        <h1 class="text-white text-2xl font-bolder font-montserrat">Acompanhe a cotação da Vaca Gorda atualizada diariamente</h1>
                        <h2 class="text-slate-300 text-lg font-bolder font-montserrat mt-4">Cotação fornecida pela <a href="https://www.scotconsultoria.com.br/loja/informativos/39/tem-boi-na-linha-(informativo-pecuario-diario)">Scot Consultoria</a> e publicada originalmente em <a href="https://www.scotconsultoria.com.br/loja/informativos/39/tem-boi-na-linha-(informativo-pecuario-diario)">Informativo Tem Boi na Linha</a></h2>
                        <div class="mt-10">
                            <a name="" id="" class="px-[30px] py-[10px] bg-[#E8521B] text-[#FFFFFF] rounded-[6px] transition duration-300 font-montserrat text-[17px] font-bold hover:text-white hover:bg-[#b83f13]" href="#" role="button">Ver Cotação</a>
                        </div>
                    </div>
                </div>
            </div>
            <button
                class="absolute top-0 bottom-0 left-0 flex items-center justify-center p-0 text-center border-0 carousel-control-prev hover:outline-none hover:no-underline focus:outline-none focus:no-underline"
                type="button" data-bs-target="#carouselDestaques" data-bs-slide="prev">
                <span class="inline-block bg-no-repeat carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button
                class="absolute top-0 bottom-0 right-0 flex items-center justify-center p-0 text-center border-0 carousel-control-next hover:outline-none hover:no-underline focus:outline-none focus:no-underline"
                type="button" data-bs-target="#carouselDestaques" data-bs-slide="next">
                <span class="inline-block bg-no-repeat carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
    </div>
    
</div>

@push("scripts")

@endpush