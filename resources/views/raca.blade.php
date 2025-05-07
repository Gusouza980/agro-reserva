@extends('template.main2')

@section('conteudo')
    
@livewire('institucional.lotes.secao-lotes', ['raca' => $raca->id])

@endsection