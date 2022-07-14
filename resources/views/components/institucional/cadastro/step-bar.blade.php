<div class="w-full max-w-[900px] mx-auto py-6">
    <div class="flex">
        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="flex items-center mx-auto text-lg text-white @if($step == 1) bg-[#FDAF3C] @elseif($step > 1) bg-[#14C656] @else bg-[#32343E] @endif rounded-full w-7 h-7">
                    <span class="w-full text-center text-white">
                        1
                    </span>
                </div>
            </div>
            <div class="text-[10px] text-center md:text-sm" style="word-wrap: break-word;">Pré Cadastro</div>
        </div>

        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex items-center content-center align-middle align-center"
                    style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="items-center flex-1 w-full align-middle bg-[#32343E] rounded align-center">
                        <div class="w-0 py-1 bg-[#14C656] rounded" @if($step < 2) style="width: 0%;" @else style="width: 100%;" @endif></div>
                    </div>
                </div>

                <div class="flex items-center mx-auto text-lg text-white @if($step == 2) bg-[#FDAF3C] @elseif($step > 2) bg-[#14C656] @else bg-[#32343E] @endif rounded-full w-7 h-7">
                    <span class="w-full text-center text-white">
                        2
                    </span>
                </div>
            </div>

            <div class="text-[10px] text-center md:text-sm" style="word-wrap: break-word;">Dados Pessoais</div>
        </div>

        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex items-center content-center align-middle align-center"
                    style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="items-center flex-1 w-full align-middle bg-[#32343E] rounded align-center">
                        <div class="w-0 py-1 bg-[#14C656] rounded" @if($step < 3) style="width: 0%;" @else style="width: 100%;" @endif></div>
                    </div>
                </div>

                <div
                    class="flex items-center mx-auto text-lg text-white @if($step == 3) bg-[#FDAF3C] @elseif($step > 3) bg-[#14C656] @else bg-[#32343E] @endif rounded-full w-7 h-7">
                    <span class="w-full text-center text-white">
                        3
                    </span>
                </div>
            </div>

            <div class="text-[10px] text-center md:text-sm" style="word-wrap: break-word;">Dados da Propriedade</div>
        </div>

        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex items-center content-center align-middle align-center"
                    style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="items-center flex-1 w-full align-middle bg-[#32343E] rounded align-center">
                        <div class="w-0 py-1 bg-[#14C656] rounded" @if($step < 4) style="width: 0%;" @else style="width: 100%;" @endif></div>
                    </div>
                </div>

                <div
                    class="flex items-center mx-auto text-lg text-white @if($step == 4) bg-[#FDAF3C] @elseif($step > 4) bg-[#14C656] @else bg-[#32343E] @endif rounded-full w-7 h-7">
                    <span class="w-full text-center text-white">
                        4
                    </span>
                </div>
            </div>

            <div class="text-[10px] text-center md:text-sm" style="word-wrap: break-word;">Informações Complementares</div>
        </div>

        <div class="w-1/4">
            <div class="relative mb-2">
                <div class="absolute flex items-center content-center align-middle align-center"
                    style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                    <div class="items-center flex-1 w-full align-middle bg-[#32343E] rounded align-center">
                        <div class="w-0 py-1 bg-[#14C656] rounded" @if($step < 5) style="width: 0%;" @else style="width: 100%;" @endif></div>
                    </div>
                </div>

                <div
                    class="flex items-center mx-auto text-lg text-white @if($step == 5) bg-[#FDAF3C] @elseif($step > 5) bg-[#14C656] @else bg-[#32343E] @endif rounded-full w-7 h-7">
                    <span class="w-full text-center text-white">
                        5
                    </span>
                </div>
            </div>

            <div class="text-[10px] text-center md:text-sm" style="word-wrap: break-word;">Tudo Pronto</div>
        </div>
    </div>
</div>