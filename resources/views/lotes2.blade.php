@extends('template.main2')

@section('conteudo')
    
@livewire('institucional.lotes.secao-lotes', ['fazenda' => $fazenda, 'reserva' => $reserva])

@endsection