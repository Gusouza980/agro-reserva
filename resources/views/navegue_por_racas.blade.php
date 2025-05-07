@extends('template.main2')

@section('conteudo')
    
@livewire('institucional.lotes.secao-lotes', ['pagina_navegue_por_racas' => true])

@endsection