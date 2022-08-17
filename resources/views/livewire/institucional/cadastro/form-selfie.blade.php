<div x-data="{ showFormSelfie: @entangle('show') }" class="w-full max-w-[750px] mx-auto relative">
    <div x-cloak x-show="showFormSelfie" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-0" class="w-full font-montserrat absolute -top-[15vh] pb-5">
        <div class="w-full">
            <span wire:click="voltar" class="cursor-pointer transition duration-300 text-[14px] text-[#D7D8E4] hover:scale-105 hover:text-white"><i class="mr-2 fas fa-chevron-left"></i> <span>Voltar</span></span>
        </div>
        <div class="w-full px-6 py-6 md:px-20 md:py-24 mt-3 bg-white rounded-t-lg shadow-[6px_6px_20px_rgba(36,62,111,0.11)]">
            <x-institucional.cadastro.step-bar step="5"></x-institucional.cadastro.step-bar>
            <div class="w-full mt-3 text-center">
                <h2 class="text-[19px] text-[#15171E] font-montserrat">Tire uma selfie segurando o documento</h2>
                @if(!$arquivo)
                    <svg wire:loading.remove id="svg-upload" class="max-w-full mx-auto my-6 md:my-14" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="434" height="263" viewBox="0 0 434 263">
                        <g id="Retângulo_2557" data-name="Retângulo 2557" fill="#fff" stroke="#707070" stroke-width="1">
                        <rect width="434" height="263" rx="25" stroke="none"/>
                        <rect x="0.5" y="0.5" width="433" height="262" rx="24.5" fill="none"/>
                        </g>
                        <image id="_618eb64c112e85.61426255image_paste3122258" data-name="618eb64c112e85.61426255image_paste3122258" width="268" height="188" transform="translate(83.576 37.5)" xlink:href="data:image/jpeg;base64,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"/>
                    </svg>
                @else
                    <img wire:loading.remove id="preview-upload" class="max-w-full my-5" src="{{ $arquivo->temporaryUrl() }}" alt="">
                @endif
                <div wire:loading>
                    <img src="{{ asset('imagens/gif_relogio.gif') }}" class="my-5" width="50" alt="">
                </div>
                @error('arquivo') <span class="error">{{ $message }}</span> @enderror
            </div>
            <form wire:submit.prevent='salvar' class="grid w-full grid-cols-1 mt-5 text-center md:grid-cols-2 gap-y-10 md:gap-y-0" enctype="multipart/form-data">
                <div class="flex items-center justify-center">
                    <label class="cpointer text-[18px] text-[#8F8F8F] font-regular font-montserrat  flex justify-center items-center" for="input_selfie">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30.184" height="24.46" viewBox="0 0 30.184 24.46">
                            <g id="miscellaneous" opacity="0.846">
                              <g id="Grupo_205" data-name="Grupo 205" transform="translate(0 0)">
                                <path id="Caminho_192" data-name="Caminho 192" d="M44.183,7.906a1.649,1.649,0,0,0-1.892,0L26.2,20.228a6.6,6.6,0,0,1-7.567,0,3.435,3.435,0,0,1,0-5.765L35.2,1.78a4.123,4.123,0,0,1,4.728,0,2.146,2.146,0,0,1,0,3.6l-13.72,10.45,0,0a1.648,1.648,0,0,1-1.889,0,.858.858,0,0,1,0-1.441L30.938,9.35a.859.859,0,0,0,0-1.441,1.649,1.649,0,0,0-1.892,0l-6.623,5.045a2.575,2.575,0,0,0,0,4.324,4.946,4.946,0,0,0,5.677,0l.005,0L41.82,6.827a3.864,3.864,0,0,0,0-6.486,7.421,7.421,0,0,0-8.515,0L16.743,13.021c-3.132,2.386-3.132,6.258,0,8.646a9.9,9.9,0,0,0,11.355,0L44.188,9.348A.859.859,0,0,0,44.183,7.906Z" transform="translate(-14.394 1.002)" fill="#707070"/>
                              </g>
                            </g>
                        </svg>
                        <span class="ml-3">Anexar Foto</span>
                    </label>
                    <input id="input_selfie" class="hidden" type="file" accept="image/*" wire:model="arquivo" capture>
                </div>
                
                <div>
                    <button
                    class="shadow-md rounded-[15px] bg-[#FDAF3C] hover:bg-[#de8a10] border-2 border-[##FDAF3C] text-white px-5 py-3 font-montserrat text-[20px] font-medium" @if(!$arquivo) disabled @endif wire:loading.attr='disabled'>Avançar</button>
                </div>
                
            </form>
        </div>
    </div>
</div>


@push("scripts")

<script>
    $(document).ready(function(){
        $("#input_selfie").change(function(event){
            var file = this.files[0];
            // alert(this.files[0]);

            if(file){
                var reader = new FileReader();
    
                reader.onload = function(){
                    $("#preview-upload").attr("src", reader.result);
                    $("#svg-upload").fadeOut(200, function(){
                        $("#preview-upload").fadeIn(200);
                    });
                }
    
                reader.readAsDataURL(file);
            }
        })
    })
</script>

@endpush