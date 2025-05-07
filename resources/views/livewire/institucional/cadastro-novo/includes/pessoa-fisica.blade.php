<div class="w-full text-center mt-[65px]">
    <h2 class="text-[20px] font-medium text-[#15171E]">Dados Pessoais | Pessoa Física</h2>
</div>
<div class="w-full mt-[30px]">
    <div class="grid w-full grid-cols-1 gap-3 md:grid-cols-3">
        <div class="mb-5">
            <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">RG</label>
            <input type="text" name="form.rg" class="w-full form-input-text mt-[5px]" wire:model.defer="form.rg" maxlength="20">
        </div>
        <div class="mb-5">\
            <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">CPF</label>
            <input type="text" name="form.cpf" class="w-full form-input-text mt-[5px]" mask="cpf" wire:model.defer="form.cpf" maxlength="14">
            <div class="w-full text-[12px] text-red-600 font-inter">
                @error('form.cpf')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-5" x-data>
            <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Nascimento</label>
            <input type="text" mask="nascimento" placeholder="__/__/____" name="form.nascimento" class="w-full form-input-text mt-[5px]" wire:model.defer="form.nascimento">
            <div class="w-full text-[12px] text-red-600 font-inter">
                @error('form.nascimento')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>
    <div class="grid w-full grid-cols-1 gap-3 md:grid-cols-8">
        <div class="mb-5 md:col-span-2">
            <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Estado Civil</label>
            <select class="w-full form-input-text mt-[5px]" name="form.estado_civil" wire:model="form.estado_civil">
                <option value="">Selecione</option>
                @foreach(config('clientes.estados_civis') as $key => $estado)
                    <option value="{{ $estado }}">{{ $estado }}</option>
                @endforeach
            </select>
            <div class="w-full text-[12px] text-red-600 font-inter">
                @error('form.estado_civil')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-5 md:col-span-4">
            <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Nome do Cônjugue</label>
            <input type="text" @if(!isset($form['estado_civil']) || empty($form['estado_civil']) || $form['estado_civil'] < 3) disabled @endif name="form.nome_conjugue" class="w-full form-input-text mt-[5px] disabled:bg-gray-200" wire:model.defer="form.nome_conjugue" maxlength="50">
            <div class="w-full text-[12px] text-red-600 font-inter">
                @error('form.nome_conjugue')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-5 md:col-span-2">
            <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">CPF <small>(Cônjugue)</small></label>
            <input type="text" @if(!isset($form['estado_civil']) || empty($form['estado_civil']) || $form['estado_civil'] < 3) disabled @endif name="form.cpf_conjugue" class="w-full form-input-text mt-[5px] disabled:bg-gray-200" mask="cpf" wire:model.defer="form.cpf_conjugue" maxlength="14">
            <div class="w-full text-[12px] text-red-600 font-inter">
                @error('form.cpf_conjugue')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>
    <div class="grid w-full grid-cols-1 gap-3 md:grid-cols-3">
        <div class="mb-5">
            <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">CEP</label>
            <input type="text" name="form.cep" class="w-full form-input-text mt-[5px]" mask="cep" x-on:change="$wire.set('form.cep', $event.target.value)" wire:model.defer="form.cep" maxlength="9">
            <div class="w-full text-[12px] text-red-600 font-inter">
                @error('form.cep')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-5 md:col-span-2">
            <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Endereço Residencial</label>
            <input type="text" name="form.rua" wire:loading.attr="disabled" wire:target="form.cep" class="w-full form-input-text mt-[5px]" wire:model.defer="form.rua" maxlength="255">
            <div class="w-full text-[12px] text-red-600 font-inter">
                @error('form.rua')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>
    <div class="grid w-full grid-cols-2 gap-3 md:grid-cols-6">
        <div class="mb-5">
            <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Número</label>
            <input type="text" name="form.numero" wire:loading.attr="disabled" wire:target="form.cep" class="w-full form-input-text mt-[5px]" wire:model.defer="form.numero" maxlength="6">
            <div class="w-full text-[12px] text-red-600 font-inter">
                @error('form.numero')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-5 md:col-span-2">
            <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Bairro</label>
            <input type="text" name="form.bairro" wire:loading.attr="disabled" wire:target="form.cep" class="w-full form-input-text mt-[5px]" wire:model.defer="form.bairro" maxlength="50">
            <div class="w-full text-[12px] text-red-600 font-inter">
                @error('form.bairro')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-span-2 mb-5 md:col-span-3">
            <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Complemento</label>
            <input type="text" name="form.complemento" class="w-full form-input-text mt-[5px]" wire:model.defer="form.complemento" maxlength="50">
            <div class="w-full text-[12px] text-red-600 font-inter">
                @error('form.complemento')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>
    <div class="grid w-full grid-cols-2 gap-3 md:grid-cols-3">
        <div class="col-span-2 mb-5 md:col-span-1">
            <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Cidade</label>
            <input type="text" name="form.cidade" wire:loading.attr="disabled" wire:target="form.cep" class="w-full form-input-text mt-[5px]" wire:model.defer="form.cidade" maxlength="50">
            <div class="w-full text-[12px] text-red-600 font-inter">
                @error('form.cidade')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-5">
            <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">Estado</label>
            <select class="w-full form-input-text mt-[5px]" wire:loading.attr="disabled" wire:target="form.cep" name="form.estado" wire:model.defer="form.estado">
                <option value="">Selecione</option>
                @foreach(config('estados.estados') as $uf => $estado)
                    <option value="{{ $uf }}">{{ $estado }}</option>
                @endforeach
            </select>
            <div class="w-full text-[12px] text-red-600 font-inter">
                @error('form.estado')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="mb-5">
            <label class="pl-[20px] text-[16px] font-medium font-montserrat text-[#616887]" for="">País</label>
            <input type="text" name="form.pais" class="w-full form-input-text mt-[5px]" wire:model.defer="form.pais" maxlength="50">
            <div class="w-full text-[12px] text-red-600 font-inter">
                @error('form.pais')
                    {{ $message }}
                @enderror
            </div>
        </div>

    </div>
    <div class="grid items-end w-full grid-cols-1 gap-3 md:grid-cols-2">
        <div class="relative mb-5" >
            <div class="pl-[20px] w-full mb-2">
                <label class="text-[16px] font-medium font-montserrat text-[#616887]" for="">Anexar Documento RG ou CNH (Doc. frente e verso)</label>
            </div>
            <div class="w-full" wire:loading.class="blur-sm" wire:target="documento">
                <label name="documento" for="input-documento" class="hover:shadow-md transition duration-200 cursor-pointer w-full h-[95px] px-5 rounded-t-md border border-[#C7C9D3] flex items-center justify-center gap-3">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="52" height="44" viewBox="0 0 52 44" fill="none">
                            <path d="M41.0281 31.0222C42.404 31.0239 43.7648 30.7293 45.0222 30.1573C46.2797 29.5853 47.4055 28.7487 48.3267 27.702C49.2479 26.6553 49.9437 25.4218 50.3691 24.0817C50.7944 22.7416 50.9397 21.3248 50.7955 19.9234C50.6514 18.5221 50.221 17.1674 49.5323 15.9475C48.8436 14.7276 47.912 13.6697 46.7981 12.8426C45.6841 12.0155 44.4128 11.4377 43.0665 11.1466C41.7203 10.8556 40.3294 10.8578 38.9841 11.1532C38.2081 8.17859 36.4949 5.54954 34.1105 3.67428C31.7261 1.79902 28.8039 0.782471 25.7976 0.782471C22.7913 0.782471 19.869 1.79902 17.4846 3.67428C15.1002 5.54954 13.387 8.17859 12.6111 11.1532C11.2658 10.8578 9.87482 10.8556 8.52861 11.1466C7.18239 11.4377 5.91102 12.0155 4.79709 12.8426C3.68315 13.6697 2.75158 14.7276 2.06288 15.9475C1.37418 17.1674 0.943768 18.5221 0.799602 19.9234C0.655435 21.3248 0.800741 22.7416 1.22608 24.0817C1.65142 25.4218 2.34727 26.6553 3.26844 27.702C4.1896 28.7487 5.31547 29.5853 6.5729 30.1573C7.83033 30.7293 9.19119 31.0239 10.5671 31.0222H41.0281Z" fill="#EDF5FF"/>
                            <path d="M25.7968 43.2036C32.3657 43.2036 37.6908 37.7497 37.6908 31.0221C37.6908 24.2944 32.3657 18.8406 25.7968 18.8406C19.228 18.8406 13.9028 24.2944 13.9028 31.0221C13.9028 37.7497 19.228 43.2036 25.7968 43.2036Z" fill="#62E8A2"/>
                            <path d="M23.6492 29.4572V35.2028H27.9432V29.4572H31.2872L25.7962 23.8335L20.3052 29.4572H23.6492Z" fill="#EDF5FF"/>
                            <path d="M17.7412 4.25034C17.9024 4.25021 18.0593 4.19748 18.1892 4.09979C18.6858 3.72712 19.2078 3.39135 19.7512 3.09508C19.9225 2.99446 20.0487 2.82956 20.1033 2.63529C20.1579 2.44102 20.1366 2.2326 20.0438 2.05416C19.951 1.87571 19.7941 1.74123 19.6063 1.67918C19.4184 1.61712 19.2143 1.63236 19.0372 1.72167C18.4308 2.05504 17.8484 2.4322 17.2942 2.8503C17.1654 2.94748 17.0698 3.08384 17.021 3.23995C16.9722 3.39605 16.9728 3.56394 17.0227 3.71968C17.0726 3.87541 17.1692 4.01105 17.2988 4.10726C17.4283 4.20347 17.5842 4.25533 17.7442 4.25546L17.7412 4.25034Z" fill="#015075"/>
                            <path d="M41.0271 10.1506C40.5235 10.1506 40.0205 10.1876 39.5221 10.2612C38.5896 7.28295 36.7582 4.6847 34.2917 2.84067C31.8252 0.996635 28.8508 0.00199106 25.7971 1.0236e-07C24.8912 -0.000108559 23.9873 0.0862957 23.0971 0.258091C22.9967 0.274521 22.9006 0.311389 22.8145 0.366512C22.7283 0.421636 22.6538 0.493897 22.5953 0.579023C22.5369 0.66415 22.4957 0.760412 22.4742 0.862119C22.4528 0.963825 22.4514 1.06891 22.4703 1.17116C22.4891 1.27341 22.5278 1.37075 22.584 1.45743C22.6403 1.5441 22.7129 1.61835 22.7976 1.67578C22.8823 1.73321 22.9775 1.77266 23.0773 1.7918C23.1772 1.81093 23.2798 1.80936 23.3791 1.78718C26.5783 1.16426 29.8891 1.80359 32.6472 3.57688C35.4053 5.35018 37.4064 8.12619 38.2491 11.3478C38.2992 11.5406 38.4197 11.7062 38.5857 11.8105C38.7518 11.9148 38.9506 11.9497 39.1411 11.908C40.382 11.6363 41.6648 11.6349 42.9063 11.9039C44.1478 12.1729 45.3202 12.7063 46.3473 13.4695C47.3745 14.2326 48.2334 15.2085 48.8685 16.3337C49.5035 17.4589 49.9004 18.7083 50.0333 20.0007C50.1663 21.2932 50.0324 22.5999 49.6403 23.8359C49.2482 25.072 48.6066 26.2097 47.7573 27.1754C46.908 28.141 45.87 28.9129 44.7105 29.441C43.551 29.9691 42.296 30.2416 41.0271 30.2407H38.4271C38.2348 26.9439 36.8206 23.8468 34.4734 21.5821C32.1262 19.3175 29.0233 18.0563 25.7986 18.0563C22.5739 18.0563 19.4709 19.3175 17.1237 21.5821C14.7765 23.8468 13.3623 26.9439 13.1701 30.2407H10.5701C9.3011 30.2416 8.04614 29.9691 6.88665 29.441C5.72717 28.9129 4.68908 28.141 3.83978 27.1754C2.99048 26.2097 2.34896 25.072 1.95686 23.8359C1.56475 22.5999 1.43084 21.2932 1.5638 20.0007C1.69677 18.7083 2.09364 17.4589 2.72866 16.3337C3.36368 15.2085 4.22265 14.2326 5.2498 13.4695C6.27695 12.7063 7.44933 12.1729 8.69081 11.9039C9.9323 11.6349 11.2151 11.6363 12.4561 11.908C12.6466 11.9502 12.8456 11.9155 13.0118 11.8112C13.1779 11.7068 13.2984 11.5408 13.3481 11.3478C13.7828 9.67655 14.5367 8.11012 15.5661 6.73905C15.6304 6.6583 15.6783 6.56513 15.7068 6.46508C15.7353 6.36502 15.744 6.26012 15.7322 6.15659C15.7204 6.05306 15.6884 5.95301 15.6381 5.86238C15.5878 5.77175 15.5203 5.69239 15.4395 5.629C15.3587 5.5656 15.2663 5.51947 15.1678 5.49335C15.0693 5.46722 14.9666 5.46162 14.866 5.47689C14.7653 5.49216 14.6686 5.52798 14.5817 5.58223C14.4948 5.63648 14.4194 5.70806 14.3601 5.79271C13.3516 7.13686 12.5788 8.6502 12.0761 10.2653C10.6393 10.0533 9.17523 10.1467 7.77523 10.5397C6.37523 10.9327 5.06928 11.6168 3.93881 12.5495C2.80834 13.4821 1.87758 14.6433 1.20456 15.9606C0.531536 17.2779 0.130686 18.723 0.0269974 20.2059C-0.0766915 21.6889 0.119004 23.1778 0.601883 24.5798C1.08476 25.9819 1.84447 27.267 2.83365 28.3551C3.82282 29.4433 5.02025 30.311 6.35129 30.9043C7.68233 31.4976 9.11843 31.8037 10.5701 31.8036H13.1701C13.3623 35.1003 14.7765 38.1975 17.1237 40.4621C19.4709 42.7268 22.5739 43.988 25.7986 43.988C29.0233 43.988 32.1262 42.7268 34.4734 40.4621C36.8206 38.1975 38.2348 35.1003 38.4271 31.8036H41.0271C43.8301 31.8036 46.5184 30.6631 48.5005 28.6332C50.4825 26.6032 51.5961 23.8499 51.5961 20.9791C51.5961 18.1083 50.4825 15.355 48.5005 13.3251C46.5184 11.2951 43.8301 10.1547 41.0271 10.1547V10.1506ZM25.7971 42.4253C23.595 42.4253 21.4424 41.7565 19.6115 40.5036C17.7805 39.2506 16.3534 37.4697 15.5107 35.3862C14.6679 33.3026 14.4474 31.0098 14.8769 28.7979C15.3065 26.5859 16.3668 24.5541 17.9238 22.9593C19.4808 21.3645 21.4646 20.2784 23.6243 19.8383C25.784 19.3981 28.0227 19.6238 30.0572 20.4867C32.0917 21.3497 33.8306 22.8111 35.0542 24.6862C36.2777 26.5613 36.9309 28.7658 36.9311 31.0211C36.9312 32.5187 36.6433 34.0016 36.0838 35.3852C35.5243 36.7688 34.7042 38.026 33.6703 39.085C32.6364 40.144 31.409 40.984 30.0581 41.5571C28.7072 42.1303 27.2593 42.4253 25.7971 42.4253Z" fill="#015075"/>
                            <path d="M26.3332 23.2835C26.1907 23.1378 25.9976 23.0559 25.7962 23.0559C25.5948 23.0559 25.4017 23.1378 25.2592 23.2835L19.7682 28.9072C19.661 29.0159 19.5879 29.1548 19.558 29.3062C19.5282 29.4576 19.543 29.6147 19.6005 29.7574C19.6581 29.9002 19.7559 30.0222 19.8813 30.1079C20.0068 30.1936 20.1544 30.2391 20.3052 30.2386H22.8882V35.2058C22.8882 35.4123 22.9683 35.6103 23.1108 35.7562C23.2533 35.9022 23.4466 35.9842 23.6482 35.9842H27.9422C28.1437 35.9842 28.3371 35.9022 28.4796 35.7562C28.6221 35.6103 28.7022 35.4123 28.7022 35.2058V30.2386H31.2872C31.438 30.2391 31.5855 30.1936 31.711 30.1079C31.8365 30.0222 31.9342 29.9002 31.9918 29.7574C32.0494 29.6147 32.0642 29.4576 32.0344 29.3062C32.0045 29.1548 31.9313 29.0159 31.8242 28.9072L26.3332 23.2835ZM27.9482 28.6798C27.8485 28.68 27.7498 28.7002 27.6578 28.7394C27.5658 28.7786 27.4822 28.836 27.4118 28.9082C27.3414 28.9805 27.2856 29.0663 27.2476 29.1606C27.2096 29.255 27.1901 29.3561 27.1902 29.4582V34.4275H24.4072V29.4603C24.4072 29.2538 24.3271 29.0558 24.1846 28.9099C24.0421 28.7639 23.8487 28.6819 23.6472 28.6819H22.1372L25.7962 24.9355L29.4542 28.6819L27.9482 28.6798Z" fill="#015075"/>
                            <path d="M27.9439 37.4324H23.6499C23.5478 37.4286 23.4461 37.4459 23.3507 37.4833C23.2553 37.5206 23.1682 37.5773 23.0947 37.6499C23.0212 37.7224 22.9628 37.8094 22.9228 37.9056C22.8829 38.0018 22.8623 38.1053 22.8623 38.2098C22.8623 38.3144 22.8829 38.4178 22.9228 38.514C22.9628 38.6102 23.0212 38.6972 23.0947 38.7698C23.1682 38.8424 23.2553 38.899 23.3507 38.9364C23.4461 38.9737 23.5478 38.9911 23.6499 38.9873H27.9439C28.0459 38.9911 28.1477 38.9737 28.2431 38.9364C28.3384 38.899 28.4255 38.8424 28.499 38.7698C28.5725 38.6972 28.631 38.6102 28.6709 38.514C28.7108 38.4178 28.7314 38.3144 28.7314 38.2098C28.7314 38.1053 28.7108 38.0018 28.6709 37.9056C28.631 37.8094 28.5725 37.7224 28.499 37.6499C28.4255 37.5773 28.3384 37.5206 28.2431 37.4833C28.1477 37.4459 28.0459 37.4286 27.9439 37.4324Z" fill="#015075"/>
                        </svg>
                    </div>
                    <div class="break-words text-center text-[#3C3C3C] text-[12px] font-inter max-w-[200px]">
                        Clique nesta área para fazer upload
                        <p>
                            <small class="text-gray-400 font-light text-[10px] tracking-wide">Formatos permitidos: imagem, pdf e doc</small>
                        </p>
                    </div>
                </label>
                <div class="w-full px-2 text-sm text-gray-500 border border-t-0 rounded-b-md border-slate-300">
                    @if(count($documentos) > 0)
                        @foreach($documentos as $key => $documento)
                            @if($documento)
                                <div class="flex items-center justify-between w-full px-2 py-3 border-b border-slate-300">
                                    <div>
                                        {{ $documento->getClientOriginalName() }}
                                    </div>
                                    <div>
                                        <button type="button" wire:click="removerUpload('documentos',{{ $key }})" class="flex items-center justify-center w-6 h-6 border border-gray-600 rounded-full bg-none hover:border-red-500 hover:text-red-500">
                                            <i class="text-sm fas fa-xmark"></i>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="w-full py-2">
                            Nenhum arquivo selecionado
                        </div>
                    @endif
                </div>
                <input type="file" id="input-documento" wire:model="documento" class="hidden" multiple>
                <img src="{{ asset('imagens/gif_relogio.gif') }}" wire:loading.class.remove="hidden" wire:target="documento" class="absolute hidden" style="top: calc(50% - 15px); left: calc(50% - 15px);" width="30" height="30" alt="">
                @error('documento')
                    <div class="w-full pl-[20px]">
                        <p class="text-[12px] font-inter text-red-500 leading-tight">{!! $message !!}</p>
                    </div>
                @enderror
            </div>
        </div>
        <div class="relative mb-5" >
            <div class="pl-[20px] w-full mb-2">
                <label class="text-[16px] font-medium font-montserrat text-[#616887]" for="">Anexar comprovante de endereço</label>
            </div>
            <div class="w-full" wire:loading.class="blur-sm" wire:target="comprovante_residencial">
                <label name="comprovante_residencial" for="input-comprovante_residencial" class="hover:shadow-md transition duration-200 cursor-pointer w-full h-[95px] px-5 rounded-t-md border border-[#C7C9D3] flex items-center justify-center gap-3">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="52" height="44" viewBox="0 0 52 44" fill="none">
                            <path d="M41.0281 31.0222C42.404 31.0239 43.7648 30.7293 45.0222 30.1573C46.2797 29.5853 47.4055 28.7487 48.3267 27.702C49.2479 26.6553 49.9437 25.4218 50.3691 24.0817C50.7944 22.7416 50.9397 21.3248 50.7955 19.9234C50.6514 18.5221 50.221 17.1674 49.5323 15.9475C48.8436 14.7276 47.912 13.6697 46.7981 12.8426C45.6841 12.0155 44.4128 11.4377 43.0665 11.1466C41.7203 10.8556 40.3294 10.8578 38.9841 11.1532C38.2081 8.17859 36.4949 5.54954 34.1105 3.67428C31.7261 1.79902 28.8039 0.782471 25.7976 0.782471C22.7913 0.782471 19.869 1.79902 17.4846 3.67428C15.1002 5.54954 13.387 8.17859 12.6111 11.1532C11.2658 10.8578 9.87482 10.8556 8.52861 11.1466C7.18239 11.4377 5.91102 12.0155 4.79709 12.8426C3.68315 13.6697 2.75158 14.7276 2.06288 15.9475C1.37418 17.1674 0.943768 18.5221 0.799602 19.9234C0.655435 21.3248 0.800741 22.7416 1.22608 24.0817C1.65142 25.4218 2.34727 26.6553 3.26844 27.702C4.1896 28.7487 5.31547 29.5853 6.5729 30.1573C7.83033 30.7293 9.19119 31.0239 10.5671 31.0222H41.0281Z" fill="#EDF5FF"/>
                            <path d="M25.7968 43.2036C32.3657 43.2036 37.6908 37.7497 37.6908 31.0221C37.6908 24.2944 32.3657 18.8406 25.7968 18.8406C19.228 18.8406 13.9028 24.2944 13.9028 31.0221C13.9028 37.7497 19.228 43.2036 25.7968 43.2036Z" fill="#62E8A2"/>
                            <path d="M23.6492 29.4572V35.2028H27.9432V29.4572H31.2872L25.7962 23.8335L20.3052 29.4572H23.6492Z" fill="#EDF5FF"/>
                            <path d="M17.7412 4.25034C17.9024 4.25021 18.0593 4.19748 18.1892 4.09979C18.6858 3.72712 19.2078 3.39135 19.7512 3.09508C19.9225 2.99446 20.0487 2.82956 20.1033 2.63529C20.1579 2.44102 20.1366 2.2326 20.0438 2.05416C19.951 1.87571 19.7941 1.74123 19.6063 1.67918C19.4184 1.61712 19.2143 1.63236 19.0372 1.72167C18.4308 2.05504 17.8484 2.4322 17.2942 2.8503C17.1654 2.94748 17.0698 3.08384 17.021 3.23995C16.9722 3.39605 16.9728 3.56394 17.0227 3.71968C17.0726 3.87541 17.1692 4.01105 17.2988 4.10726C17.4283 4.20347 17.5842 4.25533 17.7442 4.25546L17.7412 4.25034Z" fill="#015075"/>
                            <path d="M41.0271 10.1506C40.5235 10.1506 40.0205 10.1876 39.5221 10.2612C38.5896 7.28295 36.7582 4.6847 34.2917 2.84067C31.8252 0.996635 28.8508 0.00199106 25.7971 1.0236e-07C24.8912 -0.000108559 23.9873 0.0862957 23.0971 0.258091C22.9967 0.274521 22.9006 0.311389 22.8145 0.366512C22.7283 0.421636 22.6538 0.493897 22.5953 0.579023C22.5369 0.66415 22.4957 0.760412 22.4742 0.862119C22.4528 0.963825 22.4514 1.06891 22.4703 1.17116C22.4891 1.27341 22.5278 1.37075 22.584 1.45743C22.6403 1.5441 22.7129 1.61835 22.7976 1.67578C22.8823 1.73321 22.9775 1.77266 23.0773 1.7918C23.1772 1.81093 23.2798 1.80936 23.3791 1.78718C26.5783 1.16426 29.8891 1.80359 32.6472 3.57688C35.4053 5.35018 37.4064 8.12619 38.2491 11.3478C38.2992 11.5406 38.4197 11.7062 38.5857 11.8105C38.7518 11.9148 38.9506 11.9497 39.1411 11.908C40.382 11.6363 41.6648 11.6349 42.9063 11.9039C44.1478 12.1729 45.3202 12.7063 46.3473 13.4695C47.3745 14.2326 48.2334 15.2085 48.8685 16.3337C49.5035 17.4589 49.9004 18.7083 50.0333 20.0007C50.1663 21.2932 50.0324 22.5999 49.6403 23.8359C49.2482 25.072 48.6066 26.2097 47.7573 27.1754C46.908 28.141 45.87 28.9129 44.7105 29.441C43.551 29.9691 42.296 30.2416 41.0271 30.2407H38.4271C38.2348 26.9439 36.8206 23.8468 34.4734 21.5821C32.1262 19.3175 29.0233 18.0563 25.7986 18.0563C22.5739 18.0563 19.4709 19.3175 17.1237 21.5821C14.7765 23.8468 13.3623 26.9439 13.1701 30.2407H10.5701C9.3011 30.2416 8.04614 29.9691 6.88665 29.441C5.72717 28.9129 4.68908 28.141 3.83978 27.1754C2.99048 26.2097 2.34896 25.072 1.95686 23.8359C1.56475 22.5999 1.43084 21.2932 1.5638 20.0007C1.69677 18.7083 2.09364 17.4589 2.72866 16.3337C3.36368 15.2085 4.22265 14.2326 5.2498 13.4695C6.27695 12.7063 7.44933 12.1729 8.69081 11.9039C9.9323 11.6349 11.2151 11.6363 12.4561 11.908C12.6466 11.9502 12.8456 11.9155 13.0118 11.8112C13.1779 11.7068 13.2984 11.5408 13.3481 11.3478C13.7828 9.67655 14.5367 8.11012 15.5661 6.73905C15.6304 6.6583 15.6783 6.56513 15.7068 6.46508C15.7353 6.36502 15.744 6.26012 15.7322 6.15659C15.7204 6.05306 15.6884 5.95301 15.6381 5.86238C15.5878 5.77175 15.5203 5.69239 15.4395 5.629C15.3587 5.5656 15.2663 5.51947 15.1678 5.49335C15.0693 5.46722 14.9666 5.46162 14.866 5.47689C14.7653 5.49216 14.6686 5.52798 14.5817 5.58223C14.4948 5.63648 14.4194 5.70806 14.3601 5.79271C13.3516 7.13686 12.5788 8.6502 12.0761 10.2653C10.6393 10.0533 9.17523 10.1467 7.77523 10.5397C6.37523 10.9327 5.06928 11.6168 3.93881 12.5495C2.80834 13.4821 1.87758 14.6433 1.20456 15.9606C0.531536 17.2779 0.130686 18.723 0.0269974 20.2059C-0.0766915 21.6889 0.119004 23.1778 0.601883 24.5798C1.08476 25.9819 1.84447 27.267 2.83365 28.3551C3.82282 29.4433 5.02025 30.311 6.35129 30.9043C7.68233 31.4976 9.11843 31.8037 10.5701 31.8036H13.1701C13.3623 35.1003 14.7765 38.1975 17.1237 40.4621C19.4709 42.7268 22.5739 43.988 25.7986 43.988C29.0233 43.988 32.1262 42.7268 34.4734 40.4621C36.8206 38.1975 38.2348 35.1003 38.4271 31.8036H41.0271C43.8301 31.8036 46.5184 30.6631 48.5005 28.6332C50.4825 26.6032 51.5961 23.8499 51.5961 20.9791C51.5961 18.1083 50.4825 15.355 48.5005 13.3251C46.5184 11.2951 43.8301 10.1547 41.0271 10.1547V10.1506ZM25.7971 42.4253C23.595 42.4253 21.4424 41.7565 19.6115 40.5036C17.7805 39.2506 16.3534 37.4697 15.5107 35.3862C14.6679 33.3026 14.4474 31.0098 14.8769 28.7979C15.3065 26.5859 16.3668 24.5541 17.9238 22.9593C19.4808 21.3645 21.4646 20.2784 23.6243 19.8383C25.784 19.3981 28.0227 19.6238 30.0572 20.4867C32.0917 21.3497 33.8306 22.8111 35.0542 24.6862C36.2777 26.5613 36.9309 28.7658 36.9311 31.0211C36.9312 32.5187 36.6433 34.0016 36.0838 35.3852C35.5243 36.7688 34.7042 38.026 33.6703 39.085C32.6364 40.144 31.409 40.984 30.0581 41.5571C28.7072 42.1303 27.2593 42.4253 25.7971 42.4253Z" fill="#015075"/>
                            <path d="M26.3332 23.2835C26.1907 23.1378 25.9976 23.0559 25.7962 23.0559C25.5948 23.0559 25.4017 23.1378 25.2592 23.2835L19.7682 28.9072C19.661 29.0159 19.5879 29.1548 19.558 29.3062C19.5282 29.4576 19.543 29.6147 19.6005 29.7574C19.6581 29.9002 19.7559 30.0222 19.8813 30.1079C20.0068 30.1936 20.1544 30.2391 20.3052 30.2386H22.8882V35.2058C22.8882 35.4123 22.9683 35.6103 23.1108 35.7562C23.2533 35.9022 23.4466 35.9842 23.6482 35.9842H27.9422C28.1437 35.9842 28.3371 35.9022 28.4796 35.7562C28.6221 35.6103 28.7022 35.4123 28.7022 35.2058V30.2386H31.2872C31.438 30.2391 31.5855 30.1936 31.711 30.1079C31.8365 30.0222 31.9342 29.9002 31.9918 29.7574C32.0494 29.6147 32.0642 29.4576 32.0344 29.3062C32.0045 29.1548 31.9313 29.0159 31.8242 28.9072L26.3332 23.2835ZM27.9482 28.6798C27.8485 28.68 27.7498 28.7002 27.6578 28.7394C27.5658 28.7786 27.4822 28.836 27.4118 28.9082C27.3414 28.9805 27.2856 29.0663 27.2476 29.1606C27.2096 29.255 27.1901 29.3561 27.1902 29.4582V34.4275H24.4072V29.4603C24.4072 29.2538 24.3271 29.0558 24.1846 28.9099C24.0421 28.7639 23.8487 28.6819 23.6472 28.6819H22.1372L25.7962 24.9355L29.4542 28.6819L27.9482 28.6798Z" fill="#015075"/>
                            <path d="M27.9439 37.4324H23.6499C23.5478 37.4286 23.4461 37.4459 23.3507 37.4833C23.2553 37.5206 23.1682 37.5773 23.0947 37.6499C23.0212 37.7224 22.9628 37.8094 22.9228 37.9056C22.8829 38.0018 22.8623 38.1053 22.8623 38.2098C22.8623 38.3144 22.8829 38.4178 22.9228 38.514C22.9628 38.6102 23.0212 38.6972 23.0947 38.7698C23.1682 38.8424 23.2553 38.899 23.3507 38.9364C23.4461 38.9737 23.5478 38.9911 23.6499 38.9873H27.9439C28.0459 38.9911 28.1477 38.9737 28.2431 38.9364C28.3384 38.899 28.4255 38.8424 28.499 38.7698C28.5725 38.6972 28.631 38.6102 28.6709 38.514C28.7108 38.4178 28.7314 38.3144 28.7314 38.2098C28.7314 38.1053 28.7108 38.0018 28.6709 37.9056C28.631 37.8094 28.5725 37.7224 28.499 37.6499C28.4255 37.5773 28.3384 37.5206 28.2431 37.4833C28.1477 37.4459 28.0459 37.4286 27.9439 37.4324Z" fill="#015075"/>
                        </svg>
                    </div>
                    <div class="break-words text-center text-[#3C3C3C] text-[12px] font-inter max-w-[200px]">
                        Clique nesta área para fazer upload
                        <p>
                            <small class="text-gray-400 font-light text-[10px] tracking-wide">Formatos permitidos: imagem, pdf e doc</small>
                        </p>
                    </div>
                </label>
                <div class="w-full px-2 text-sm text-gray-500 border border-t-0 rounded-b-md border-slate-300">
                    @if(count($comprovantes_residenciais) > 0)
                        @foreach($comprovantes_residenciais as $key => $comprovante_residencial)
                            @if($comprovante_residencial)
                                <div class="flex items-center justify-between w-full px-2 py-3 border-b border-slate-300">
                                    <div>
                                        {{ $comprovante_residencial->getClientOriginalName() }}
                                    </div>
                                    <div>
                                        <button type="button" wire:click="removerUpload('comprovantes_residenciais',{{ $key }})" class="flex items-center justify-center w-6 h-6 border border-gray-600 rounded-full bg-none hover:border-red-500 hover:text-red-500">
                                            <i class="text-sm fas fa-xmark"></i>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="w-full py-2">
                            Nenhum arquivo selecionado
                        </div>
                    @endif
                </div>
                <input type="file" id="input-comprovante_residencial" wire:model="comprovante_residencial" class="hidden" multiple>
                <img src="{{ asset('imagens/gif_relogio.gif') }}" wire:loading.class.remove="hidden" wire:target="comprovante_residencial" class="absolute hidden" style="top: calc(50% - 15px); left: calc(50% - 15px);" width="30" height="30" alt="">
                @error('comprovante_residencial')
                    <div class="w-full pl-[20px]">
                        <p class="text-[12px] font-inter text-red-500 leading-tight">{!! $message !!}</p>
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
