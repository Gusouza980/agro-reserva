<div class="px-0 pb-5 bg-white container-fluid">
    <div class="px-3 mx-auto w1200 px-lg-0">
        <div class="row">
            <div 
                @if(session()->get("cliente") && isset(session()->get("cliente")["finalizado"]) && session()->get("cliente")["finalizado"]) 
                    @if(!session()->get("cliente")["aprovado"] || !session()->get("cliente")["aprovado"]) 
                        onclick="Livewire.emit('mostrarPopup', 'sucesso', 'Seu cadastro já está completo. Falta pouco para poder comprar. Apenas sente e aguarde a aprovação do seu cadastro para poder começar a equipar seu plantel com o que há de melhor no gado brasileiro!')" 
                    @else 
                        onclick="Livewire.emit('mostrarPopup', 'sucesso', 'Você já está apto para comprar! Visite uma reserva e procure o lote que mais encaixa no seu plantel!')" 
                    @endif 
                @else 
                    onclick="window.open('{{ route('cadastro') }}')"  
                @endif 
                class="mb-4 duration-1000 delay-300 col-12 col-lg-6 animate-in slide-in-from-left">
                <div class="rounded-md overflow-hidden shadow-sm bg-branco transition duration-500 hover:scale-105 hover:bg-[#E8521B] hover:text-white cpointer">
                    <div class="">
                        <img src="{{ asset('imagens/banner-comprar.jpg') }}" style="max-width: 100%;" alt="">
                    </div>
                    <div class="py-2 text-center bg-inherit cpointer text-inherit" style="width: 100%; font-family: Montserrat; font-size: 18px;">
                        Quero Comprar
                    </div>
                </div>
            </div>
            <div class="mb-4 duration-1000 delay-300 col-12 col-lg-6 animate-in slide-in-from-right">
                <div onclick="window.open('https://api.whatsapp.com/send?phone=5514981809051', '_blank')" class="rounded-md overflow-hidden shadow-sm bg-branco transition duration-500 hover:scale-105 hover:bg-[#E8521B] hover:text-white cpointer">
                    <div class="">
                        <img src="{{ asset('imagens/banner-vender.jpg') }}" style="max-width: 100%;" alt="">
                    </div>
                    <div class="py-2 text-center bg-inherit cpointer text-inherit" style="width: 100%; font-family: Montserrat; font-size: 18px;">
                        Quero Vender
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>