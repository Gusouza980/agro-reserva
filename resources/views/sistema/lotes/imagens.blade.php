@extends('sistema.templates.main')

@section('breadcrumb')
    <li>
        <div class="flex items-center space-x-1.5">
            <span>Lotes</span>
        </div>
    </li>
@endsection

@section('conteudo')
    <div class="grid justify-center grid-cols-1 px-6 py-6">
        <div class="flex items-center justify-between w-full">
            <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                Importar Imagens de Lotes para a Reserva #{{ $reserva->id }}
            </h2>
        </div>
        <form action="{{ route('sistema.lotes.importar_imagens', ['reserva' => $reserva]) }}" method="POST"
            class="mt-3 card p-6" x-data="{
                lotes: {!! $lotes->pluck('id') !!},
                arquivos: [],
                previews: [],
            
                processFiles() {
                    this.arquivos = Array.from(this.$refs.fileInput.files);
                    this.previews = [];
            
                    this.arquivos.forEach(arquivo => {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.previews.push(e.target.result);
                        };
                        reader.readAsDataURL(arquivo);
                    });
                },
            
                verArquivos: function() {
                    console.log(this.arquivos);
                }
            }" enctype="multipart/form-data">
            @csrf
            <div class="w-full">
                <h5 class="text-lg font-medium">Selecione os lotes que irão receber as imagens</h5>
            </div>
            <div class="w-full mt-6 text-sm" x-html="lotes.length + ' lotes selecionados.'">

            </div>
            <div
                class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 mt-3 gap-x-3 gap-y-4">
                @foreach ($lotes as $lote)
                    <div class="flex justify-start w-full items-center gap-3">
                        <input type="checkbox" name="lotes[]" value="{{ $lote->id }}"
                            class="h-5 w-5 text-green-600 dark:text-navy-100" x-model="lotes" checked>
                        <span class="text-sm">{{ $lote->numero }} - {{ $lote->nome }}</span>
                    </div>
                @endforeach
            </div>
            <hr class="my-6">
            <div class="w-full ">
                <div class="w-full mt-6 text-sm mb-3" x-html="arquivos.length + ' arquivos selecionados.'">

                </div>
                <label for="arquivos" x-bind:class="arquivos.length ? 'border-green-500' : ''"
                    class="cursor-pointer w-full border rounded-md p-10 flex justify-center items-center">
                    <template x-if="arquivos.length == 0">
                        <div class="flex items-center justify-center gap-3">
                            <i class="fas fa-file fa-2x"></i> Clique aqui para selecionar as imagens que serão carregadas
                        </div>
                    </template>
                    <template x-if="arquivos.length > 0">
                        <div class="flex items-center justify-center gap-3 text-green-600">
                            <i class="fas fa-check fa-2x text-green-600"></i> As imagens já foram carregadas. Você pode
                            realizar a importação.
                        </div>
                    </template>
                </label>
                <input type="file" id="arquivos" name="arquivos[]" accept="image/*" class="hidden" x-ref="fileInput"
                    @change="processFiles" multiple>
            </div>
            <template x-if="previews.length > 0">
                <div class="w-full flex gap-3 p-4 border mt-6">
                    <template x-for="(arquivo, index) in arquivos" :key="index">
                        <div class="w-[100px] h-auto">
                            <img :src="previews[index]" alt="">
                        </div>
                    </template>
                </div>
            </template>
            <template x-if="arquivos.length > 0 && arquivos.length != lotes.length">
                <div class="w-full flex gap-3 p-4 bg-red-100 text-red-600 mt-6">
                    O número de arquivos carregados é diferente do número de lotes selecionados. Por favor, verifique
                    novamente.
                </div>
            </template>
            <div class="w-full">
                <button class="w-full bg-green-500 hover:bg-green-700 text-white py-2 disabled:opacity-50 rounded-md mt-4"
                    x-bind:disabled="arquivos.length == 0 || arquivos.length != lotes.length">Salvar</button>
            </div>
        </form>
    </div>
    @livewire('sistema.lotes.visitas')
@endsection
