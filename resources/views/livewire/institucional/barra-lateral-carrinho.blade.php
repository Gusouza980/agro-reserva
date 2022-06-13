<div x-show="mostrarCarrinho" @click.outside="mostrarCarrinho = false" class="flex flex-col fixed top-0 right-0 h-full py-5 px-3 bg-slate-200 border border-solid border-slate-400 shadow-md w-full md:w-[350px] z-50">
    <i class="fas fa-times text-[#80828b] fa-lg absolute top-5 right-5 hover:scale-110 duration-300 cpointer" @click="mostrarCarrinho = false"></i>
    <div class="text-center w-full flex flex-row">
        <div class="flex flex-row mx-auto">
            <svg class="" id="Grupo_3723" data-name="Grupo 3723" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40" viewBox="0 0 40 40">
                <defs>
                  <clipPath id="clip-path">
                    <rect id="Retângulo_2470" data-name="Retângulo 2470" width="40" height="40" fill="#80828b"/>
                  </clipPath>
                </defs>
                <g id="Grupo_3682" data-name="Grupo 3682" clip-path="url(#clip-path)">
                  <path id="Caminho_1118" data-name="Caminho 1118" d="M405.252,193.579h-3.063v7.109a.579.579,0,0,0,.578.578h7.225l-3.7-7.052a1.218,1.218,0,0,0-1.04-.636Z" transform="translate(-374.792 -180.392)" fill="#80828b"/>
                  <path id="Caminho_1119" data-name="Caminho 1119" d="M86.45,206.815h-.4v-4.393H78.532a1.7,1.7,0,0,1-1.734-1.734v-7.11H74.544a.579.579,0,0,0-.578.578v12.716H54.893a.579.579,0,0,0-.578.578v3.757a1.159,1.159,0,0,0,1.156,1.156h.289a1.968,1.968,0,0,1-.058-.578,4.335,4.335,0,0,1,8.67,0,1.97,1.97,0,0,1-.058.578H75.758a1.968,1.968,0,0,1-.058-.578,4.335,4.335,0,0,1,8.67,0,1.967,1.967,0,0,1-.058.578h2.138a1.159,1.159,0,0,0,1.156-1.156v-3.179a1.173,1.173,0,0,0-1.156-1.214Z" transform="translate(-50.615 -180.393)" fill="#80828b"/>
                  <ellipse id="Elipse_305" data-name="Elipse 305" cx="3.179" cy="3.179" rx="3.179" ry="3.179" transform="translate(26.182 28.156)" fill="#80828b"/>
                  <ellipse id="Elipse_306" data-name="Elipse 306" cx="3.179" cy="3.179" rx="3.179" ry="3.179" transform="translate(6.185 28.156)" fill="#80828b"/>
                  <path id="Caminho_1120" data-name="Caminho 1120" d="M22.194,157.647V143.833a1.159,1.159,0,0,0-1.156-1.156H1.156A1.159,1.159,0,0,0,0,143.833v13.236a1.159,1.159,0,0,0,1.156,1.156h20.46a.546.546,0,0,0,.578-.578ZM4.74,154.583a.52.52,0,1,1-1.04,0v-8.207a.52.52,0,1,1,1.04,0Zm4.566,0a.52.52,0,1,1-1.04,0v-8.207a.52.52,0,1,1,1.04,0Zm4.624,0a.52.52,0,1,1-1.04,0v-8.207a.52.52,0,1,1,1.04,0Zm4.566,0a.52.52,0,1,1-1.04,0v-8.207a.52.52,0,1,1,1.04,0Z" transform="translate(0 -132.958)" fill="#80828b"/>
                  <path id="Caminho_1121" data-name="Caminho 1121" d="M54.656,526.2H52.344a.578.578,0,0,0,0,1.156h2.312a.546.546,0,0,0,.578-.578.621.621,0,0,0-.578-.578" transform="translate(-48.24 -490.352)" fill="#80828b"/>
                  <path id="Caminho_1122" data-name="Caminho 1122" d="M151.376,526.2h-2.312a.578.578,0,0,0,0,1.156h2.312a.546.546,0,0,0,.578-.578.579.579,0,0,0-.578-.578" transform="translate(-138.371 -490.352)" fill="#80828b"/>
                  <path id="Caminho_1123" data-name="Caminho 1123" d="M248.956,526.2h-2.312a.578.578,0,0,0,0,1.156h2.312a.546.546,0,0,0,.578-.578.579.579,0,0,0-.578-.578" transform="translate(-229.304 -490.352)" fill="#80828b"/>
                  <path id="Caminho_1124" data-name="Caminho 1124" d="M346.536,526.2h-2.312a.578.578,0,0,0,0,1.156h2.312a.546.546,0,0,0,.578-.578.622.622,0,0,0-.578-.578" transform="translate(-320.237 -490.352)" fill="#80828b"/>
                  <path id="Caminho_1125" data-name="Caminho 1125" d="M443.256,526.2h-2.312a.578.578,0,0,0,0,1.156h2.312a.546.546,0,0,0,.578-.578.579.579,0,0,0-.578-.578" transform="translate(-410.369 -490.352)" fill="#80828b"/>
                </g>
            </svg>
            <h5 class="text-[20px] text-[#80828b] font-semibold mt-[14px] ml-3" style="font-family: 'Montserrat', sans-serif;">CAMINHÃO</h5>
        </div>
    </div>
    <div class="w-full mt-5 flex flex-column">
        @foreach($carrinho->produtos as $produto)
            <div class="flex flex-collumn border-b border-slate-400 border-solid py-3">
                <div class="w-1/3">
                    <img class="w-full rounded-md shadow-md" src="{{ asset($produto->lote->preview) }}" alt="">
                </div>
                <div class="w-2/3 pl-2 relative">
                    <div>
                        <span class="text-[15px] text-[#626262] font-semibold">{{ $produto->lote->nome }}</span>
                    </div>
                    <div class="mt-[-5px]">
                        <span class="text-[12px] text-[#626262] font-medium">RGD: {{ $produto->lote->registro }}</span>
                    </div>
                    <div class="mt-[-5px]">
                        <span class="text-[14px] text-[#626262] font-semibold">R${{ number_format($produto->lote->preco, 2, ",", ".") }}</span>
                    </div>
                    
                    <i class="text-danger absolute bottom-2 right-0 fas fa-trash hover:scale-110 duration-300 cpointer"></i>
                </div>
            </div>
        @endforeach
        <div class="grid grid-cols-2 gap-x-3 mt-4">
            <button class="border-2 border-slate-400 text-[#80828B] py-2 w-full font-medium rounded-[30px]" @click="mostrarCarrinho = false">Continuar</button>
            <button class="border border-[#14C656] bg-[#14C656] text-white py-2 w-full font-semibold rounded-[30px]">Finalizar</button>
        </div>
    </div>
</div>
