@extends('sistema.templates.main')

@section('breadcrumb')
    <li>
        <div class="flex items-center space-x-1.5">
            <span>Lotes</span>
        </div>
    </li>
@endsection

@section('conteudo')
    <div class="grid justify-center grid-cols-1 px-6 py-6" x-data="{
        selecionados: [],
        arquivo: null,
        campos: [
            ['numero', 'Número do Lote'],
            ['nome', 'Nome do Lote'],
            ['preco', 'Preço'],
            ['registro', 'Registro (RGD)'],
            ['botton', 'Botton'],
            ['ccg', 'CCG (CGC)'],
            ['nascimento', 'Data de Nascimento'],
    
            ['pai', 'Nome do Pai'],
            ['rgd_pai', 'RGD do Pai'],
    
            ['avo_paterno', 'Nome do Avô Paterno'],
            ['rgd_avo_paterno', 'RGD do Avô Paterno'],
    
            ['avo_paterna', 'Nome da Avó Paterna'],
            ['rgd_avo_paterna', 'RGD da Avó Paterna'],
            ['lactacao_avo_paterna', 'Lactação da Avó Paterna'],
    
            ['mae', 'Nome da Mãe'],
            ['rgd_mae', 'RGD da Mãe'],
            ['lactacao_mae', 'Lactação da Mãe'],
    
            ['avo_materno', 'Nome do Avô Materno'],
            ['rgd_avo_materno', 'RGD do Avô Materno'],
    
            ['avo_materna', 'Nome da Avó Materna'],
            ['rgd_avo_materna', 'RGD da Avó Materna'],
            ['lactacao_avo_materna', 'Lactação da Avó Materna'],
    
            ['observacoes', 'Observações (Comentários)'],
        ],
        selecionar: function(campo) {
            if (this.selecionados.includes(campo)) {
                this.selecionados = this.selecionados.filter(item => item !== campo);
            } else {
                this.selecionados.push(campo);
            }
        },
        remover: function(campo) {
            this.selecionados = this.selecionados.filter(item => item !== campo);
        },
        mover: function(campo, direcao) {
            let index = this.selecionados.indexOf(campo);
            if (direcao === 'left') {
                if (index > 0) {
                    let temp = this.selecionados[index - 1];
                    this.selecionados[index - 1] = campo;
                    this.selecionados[index] = temp;
                }
            } else {
                if (index < this.selecionados.length - 1) {
                    let temp = this.selecionados[index + 1];
                    this.selecionados[index + 1] = campo;
                    this.selecionados[index] = temp;
                }
            }
        },
        verificarPosicao: function(campo, direcao) {
            let index = this.selecionados.indexOf(campo);
            if (direcao === 'left') {
                return index > 0;
            } else {
                return index < this.selecionados.length - 1;
            }
        }
    }">
        <div class="flex items-center justify-between w-full">
            <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                Importação de Lotes para a Reserva #{{ $reserva->id }}
            </h2>
        </div>
        <div class="mt-3 w-full bg-white rounded-md p-8">
            <div class="w-full text-semibold text-[16px]">
                Selecione as informações que estarão na planilha
            </div>
            <div class="w-full flex flex-wrap gap-2 mt-3">
                <template x-for="campo in campos">
                    <div x-on:click="selecionar(campo)" x-show="!selecionados.includes(campo)"
                        class="cursor-pointer w-fit bg-gray-300 text-gray-600 hover:text-gray-200 flex justify-between px-3 py-2 rounded-md hover:bg-gray-400 transition duration-300 gap-3">
                        <div x-html="campo[1]">
                        </div>
                    </div>
                </template>

            </div>
        </div>

        <div class="mt-3 w-full bg-white rounded-md p-8">
            <div class="w-full text-semibold text-[16px]">
                Campos selecionados
            </div>
            <div class="w-full flex flex-wrap gap-2 mt-3">
                <template x-for="campo in selecionados">
                    <div
                        class="cursor-pointer w-fit bg-green-300 text-green-800 flex justify-between px-3 py-2 rounded-md transition duration-300 gap-3">

                        <button x-show="verificarPosicao(campo, 'left')" x-on:click="mover(campo, 'left')"
                            class="w-5 h-5 hover:bg-green-700 hover:text-white transition duration-200 hover:scale-105 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>

                        <div class="" x-html="campo[1]">
                        </div>

                        <button x-show="verificarPosicao(campo, 'right')" x-on:click="mover(campo, 'right')"
                            class="w-5 h-5 hover:bg-green-700 hover:text-white transition duration-200 hover:scale-105 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>

                        <button x-on:click="remover(campo)"
                            class="w-5 h-5 hover:bg-green-700 hover:text-white transition duration-200 hover:scale-105 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-times"></i>
                        </button>
                    </div>
                </template>

            </div>
        </div>

        <div class="mt-3 w-full bg-white rounded-md p-8">
            <label for="planilha" x-bind:class="arquivo ? 'border-green-500' : ''"
                class="cursor-pointer w-full border rounded-md p-10 flex justify-center items-center">
                <template x-if="!arquivo">
                    <div class="flex items-center justify-center gap-3">
                        <i class="fas fa-file fa-2x"></i> Clique aqui para selecionar a planilha
                    </div>
                </template>
                <template x-if="arquivo">
                    <div class="flex items-center justify-center gap-3 text-green-600">
                        <i class="fas fa-check fa-2x text-green-600"></i> A planilha foi carregada. Você já pode realizar a
                        importação.
                    </div>
                </template>
            </label>
            <input type="file" id="planilha" class="hidden" x-model="arquivo">
        </div>

        <div class="w-full mt-3">
            <button x-bind:disabled="!arquivo || selecionados.length === 0"
                class="disabled:opacity-30 w-full bg-green-300 text-green-700 hover:bg-green-600 hover:text-white transition duration-200 py-2 rounded-md text-[17px] font-semibold">Importar</button>
        </div>
    </div>
@endsection
