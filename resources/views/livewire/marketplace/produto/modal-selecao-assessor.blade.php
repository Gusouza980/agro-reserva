<div class="w-full" x-data="{ show: @entangle('show') }">
    <div x-show="show" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[100] flex items-end bg-slate-900/60 backdrop-blur sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="show" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="show = false"
            @keydown.escape="show = false"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg max-h-[100vh] overflow-y-scroll dark:bg-navy-700 sm:rounded-lg sm:m-4 sm:max-w-3xl"
            role="dialog">
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-900 dark:text-gray-700">
                    Com qual assessor você quer entrar em contato ? 
                </p>
                <div class="w-full">
                    @foreach($assessores as $assessor)
                        <a href="https://api.whatsapp.com/send?phone=55{{ \Util::limparString($assessor->telefone) }}&text={{ urlencode("Opa " . $assessor->nome . "." . $texto) }}">
                            <div class="flex items-center space-x-6 py-3 rounded-lg border my-1 px-3 cursor-pointer hover:bg-gray-800 hover:text-white">
                                @if($assessor->foto)
                                    <img src="{{ asset($assessor->foto) }}" class="foto-rounded-80" alt="">
                                @endif
                                <span class="text-md font-medium font-montserrat">{{ $assessor->nome }}</span>
                            </div>
                        </a>
                        
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
    <x-loading></x-loading>
</div>
