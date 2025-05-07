<div class="px-0 py-5 w-full">
    <div class="px-3 mx-auto w1200 ld:px-0">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="w-full">
                <div>
                    <a @if (session()->get('cliente')) @if (isset(session()->get('cliente')['finalizado']) && session()->get('cliente')['finalizado'])
                                href="{{ route('reservas_abertas') }}"
                            @else
                                href="{{ route('cadastro') }}" @endif
                    @else href="{{ route('cadastro') }}" @endif
                        class="flex flex-col max-w-[720px] mx-auto w-full rounded-md overflow-hidden shadow-sm bg-branco transition duration-500 hover:scale-105 hover:bg-[#E8521B] hover:text-white cpointer">
                        <div class="">
                            <img src="{{ asset('imagens/banner-comprar.jpg') }}" style="max-width: 100%;" alt="">
                        </div>
                        <div class="py-2 text-center bg-inherit cpointer text-inherit"
                            style="width: 100%; font-family: Montserrat; font-size: 18px;">
                            Quero Comprar
                        </div>
                    </a>
                </div>

            </div>
            <div class="w-full">
                <div>
                    <a href="https://api.whatsapp.com/send?phone=5534992754132" target="_blank"
                        class="flex flex-col max-w-[720px] mx-auto rounded-md overflow-hidden shadow-sm bg-branco transition duration-500 hover:scale-105 hover:bg-[#E8521B] hover:text-white cpointer">
                        <div class="">
                            <img src="{{ asset('imagens/banner-vender.jpg') }}" style="max-width: 100%;" alt="">
                        </div>
                        <div class="py-2 text-center bg-inherit cpointer text-inherit"
                            style="width: 100%; font-family: Montserrat; font-size: 18px;">
                            Quero Vender
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
