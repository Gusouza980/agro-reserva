<div class="w-full relative @if(!session()->get("carrinho")) hidden @endif" onclick="Livewire.emit('abreCarrinhoLateral')">
    {{-- @if(session()->get("carrinho")) --}}
        <svg class="mx-auto fill-[#80828b] hover:fill-[#5b5d63] transition duration-150" id="Grupo_3723"
            data-name="Grupo 3723" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" width="36.992" height="37"
            viewBox="0 0 36.992 37">
            <defs>
                <clipPath id="clip-path">
                    <rect id="Retângulo_2470" data-name="Retângulo 2470" width="36.992" height="37" />
                </clipPath>
            </defs>
            <g id="Grupo_3682" data-name="Grupo 3682" clip-path="url(#clip-path)">
                <path id="Caminho_1118" data-name="Caminho 1118"
                    d="M405.252,193.579h-3.063v7.109a.579.579,0,0,0,.578.578h7.225l-3.7-7.052a1.218,1.218,0,0,0-1.04-.636Z"
                    transform="translate(-374.792 -180.392)" />
                <path id="Caminho_1119" data-name="Caminho 1119"
                    d="M86.45,206.815h-.4v-4.393H78.532a1.7,1.7,0,0,1-1.734-1.734v-7.11H74.544a.579.579,0,0,0-.578.578v12.716H54.893a.579.579,0,0,0-.578.578v3.757a1.159,1.159,0,0,0,1.156,1.156h.289a1.968,1.968,0,0,1-.058-.578,4.335,4.335,0,0,1,8.67,0,1.97,1.97,0,0,1-.058.578H75.758a1.968,1.968,0,0,1-.058-.578,4.335,4.335,0,0,1,8.67,0,1.967,1.967,0,0,1-.058.578h2.138a1.159,1.159,0,0,0,1.156-1.156v-3.179a1.173,1.173,0,0,0-1.156-1.214Z"
                    transform="translate(-50.615 -180.393)" />
                <ellipse id="Elipse_305" data-name="Elipse 305" cx="3.179" cy="3.179"
                    rx="3.179" ry="3.179" transform="translate(26.182 28.156)" />
                <ellipse id="Elipse_306" data-name="Elipse 306" cx="3.179" cy="3.179"
                    rx="3.179" ry="3.179" transform="translate(6.185 28.156)" />
                <path id="Caminho_1120" data-name="Caminho 1120"
                    d="M22.194,157.647V143.833a1.159,1.159,0,0,0-1.156-1.156H1.156A1.159,1.159,0,0,0,0,143.833v13.236a1.159,1.159,0,0,0,1.156,1.156h20.46a.546.546,0,0,0,.578-.578ZM4.74,154.583a.52.52,0,1,1-1.04,0v-8.207a.52.52,0,1,1,1.04,0Zm4.566,0a.52.52,0,1,1-1.04,0v-8.207a.52.52,0,1,1,1.04,0Zm4.624,0a.52.52,0,1,1-1.04,0v-8.207a.52.52,0,1,1,1.04,0Zm4.566,0a.52.52,0,1,1-1.04,0v-8.207a.52.52,0,1,1,1.04,0Z"
                    transform="translate(0 -132.958)" />
                <path id="Caminho_1121" data-name="Caminho 1121"
                    d="M54.656,526.2H52.344a.578.578,0,0,0,0,1.156h2.312a.546.546,0,0,0,.578-.578.621.621,0,0,0-.578-.578"
                    transform="translate(-48.24 -490.352)" />
                <path id="Caminho_1122" data-name="Caminho 1122"
                    d="M151.376,526.2h-2.312a.578.578,0,0,0,0,1.156h2.312a.546.546,0,0,0,.578-.578.579.579,0,0,0-.578-.578"
                    transform="translate(-138.371 -490.352)" />
                <path id="Caminho_1123" data-name="Caminho 1123"
                    d="M248.956,526.2h-2.312a.578.578,0,0,0,0,1.156h2.312a.546.546,0,0,0,.578-.578.579.579,0,0,0-.578-.578"
                    transform="translate(-229.304 -490.352)" />
                <path id="Caminho_1124" data-name="Caminho 1124"
                    d="M346.536,526.2h-2.312a.578.578,0,0,0,0,1.156h2.312a.546.546,0,0,0,.578-.578.622.622,0,0,0-.578-.578"
                    transform="translate(-320.237 -490.352)" />
                <path id="Caminho_1125" data-name="Caminho 1125"
                    d="M443.256,526.2h-2.312a.578.578,0,0,0,0,1.156h2.312a.546.546,0,0,0,.578-.578.579.579,0,0,0-.578-.578"
                    transform="translate(-410.369 -490.352)" />
            </g>
        </svg>
        Meu Caminhão
        <div class="w-[20px] h-[20px] bg-[#EE682A] text-white flex items-center justify-center absolute top-0 right-[5px] rounded-full">
            {{ $numProdutos }}
        </div>
    {{-- @endif --}}
</div>