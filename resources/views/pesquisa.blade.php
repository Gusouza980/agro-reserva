@extends('template.main2')

@section('conteudo')
    
@livewire('institucional.lotes.secao-lotes', ['pesquisa' => $pesquisa])

@endsection