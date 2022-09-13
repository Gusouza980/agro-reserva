@extends('painel.template.main')

@section('styles')

@endsection

@section('titulo')
    <a href="{{route('painel.index')}}">Inicio</a> / Marketplace / <a href="{{route('painel.marketplace.categorias')}}">Categorias</a>
@endsection

@section('conteudo')
    @livewire("painel.marketplace.categorias.datatable")
    @livewire("painel.marketplace.categorias.modal-cadastro")
@endsection

@section('scripts')

@endsection
