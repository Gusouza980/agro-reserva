@extends('template.main2')

@section('conteudo')
    
@livewire('institucional.lotes.secao-lotes', ['pagina_reservas_abertas' => true])

@endsection