@extends('template.main2')

@section('styles')

@endsection

@section('conteudo')

    <livewire:institucional.cliente.conta.pagina :cliente="$cliente->toArray()" />

@endsection
