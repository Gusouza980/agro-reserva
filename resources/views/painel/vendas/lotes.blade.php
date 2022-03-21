@extends('painel.template.main')

@section('styles')

@endsection

@section('titulo')
    <a href="{{route('painel.index')}}">Inicio</a> / <a href="{{route('painel.vendas')}}">Vendas</a> / <a href="{{route('painel.vendas.lotes')}}">Lotes</a>
@endsection

@section('conteudo')

@livewire('vendas.lotes.datatable')

@endsection

@section('scripts')
 
@endsection