@extends('template.main2')

@section('conteudo')
    
@livewire('institucional.embrioes.detalhes', ["embriao" => $embriao])

@endsection