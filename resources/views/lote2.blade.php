@extends('template.main2')

@section('conteudo')
    
@livewire('institucional.lotes.detalhes', ["lote" => $lote])

@endsection