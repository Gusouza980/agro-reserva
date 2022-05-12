<div class="container-fluid">
    @if($fazenda)
        <div class="row g-2 align-items-center">
            <div class="form-group col-12">
                <div class="mb-3">
                  <input type="text"
                    class="form-control" name="" id="" placeholder="Pesquise o cliente desejado" wire:model="pesquisa">
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 col-md-6">
                <table class="table">
                    @if($resultado)
                        <thead>
                            <tr class="text-center">
                                <th colspan="2">Resultado</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resultado as $cliente)
                                <tr>
                                    <td style="width: 90%;">{{ $cliente->nome_dono }}</td>
                                    <td style="width: 10%;"><a name="" id="" class="btn btn-primary" role="button" wire:click="addCliente({{ $cliente->id }})"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
            <div class="col-12 col-md-6">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th colspan="2">Usuários</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fazenda->usuarios as $cliente)
                            <tr>
                                <td style="width: 90%;">{{ $cliente->nome_dono }}</td>
                                <td style="width: 10%;"><a name="" id="" class="btn btn-danger" role="button" wire:click="removeCliente({{ $cliente->id }})"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>



@push("styles")

<link href="{{asset('admin/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

@endpush

@push("scripts")

<script src="{{asset('admin/libs/select2/js/select2.min.js')}}"></script>
<script>
    window.addEventListener("carregaModalClientes", (event) => {
        $("#modalClientes").modal("show");
    });

    $(document).ready(function(){
        
        
    })
</script>

@endpush