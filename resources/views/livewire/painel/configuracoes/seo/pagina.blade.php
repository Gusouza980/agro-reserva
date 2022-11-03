<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-6 d-flex align-items-center">
            Para atualizar informações, apenas altere dentro do campo correspondente e clique fora para atualizar.
        </div>
        <div class="col-6 text-end">
            <a name="" id="" class="btn btn-primary" wire:click="gerarSiteMap" role="button">Gerar Sitemap</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered" style="vertical-align: middle;">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 15%;">Nome da Rota</th>
                            <th scope="col">Título</th>
                            <th scope="col">Tags</th>
                            <th scope="col" style="width: 5%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($seos as $seo)
                            <tr class="">
                                <td scope="row">
                                    <div class="">
                                        <input type="text"
                                          class="form-control" name="" id="" aria-describedby="helpId" placeholder="" value="{{$seo->nome}}" onchange="Livewire.emit('atualizaValoresSeo', {{$seo->id}}, 'nome', this.value)">
                                    </div>
                                </td>
                                <td scope="row">
                                    <div class="">
                                        <input type="text"
                                            class="form-control" name="" id="" aria-describedby="helpId" placeholder="" value="{{$seo->titulo}}" onchange="Livewire.emit('atualizaValoresSeo', {{$seo->id}}, 'titulo', this.value)">
                                    </div>
                                </td>
                                <td scope="row">
                                    <div class="">
                                        <input type="text"
                                            class="form-control" name="" id="" aria-describedby="helpId" placeholder="" value="{{$seo->tags}}" onchange="Livewire.emit('atualizaValoresSeo', {{$seo->id}}, 'tags', this.value)">
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Não existem páginas cadastradas</td>
                            </tr>
                        @endforelse
                        <tr style="background-color: rgba(255,0,0,0.2)">
                            <td>
                                <div class="">
                                  <input type="text"
                                    class="form-control" name="" id="" aria-describedby="helpId" placeholder="" wire:model.defer="seo.nome">
                                </div>
                            </td>
                            <td>
                                <div class="">
                                  <input type="text"
                                    class="form-control" name="" id="" aria-describedby="helpId" placeholder="" wire:model.defer="seo.titulo">
                                </div>
                            </td>
                            <td>
                                <div class="">
                                    <input type="text"
                                    class="form-control" name="" id="" aria-describedby="helpId" placeholder="" wire:model.defer="seo.tags">
                                </div>
                            </td>
                            <td class="text-center">
                                <a name="" id="" class="btn btn-primary" href="#" role="button" wire:click="novoSeo"><i class="fas fa-sd-card"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    <x-loading></x-loading>
</div>
