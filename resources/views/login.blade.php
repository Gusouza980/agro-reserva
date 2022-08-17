@extends('template.main2')

@section('conteudo')
<div class="w-full bg-[#F5F5F5] py-5">
    <div class="w600 mx-auto font-montserrat pb-5">
        <div class="w-full mx-auto">
            <span class="cursor-pointer transition duration-300 text-[14px] text-[#9b9ca3] hover:scale-105 hover:text-[#EE682A]"><i class="fas fa-chevron-left mr-2"></i> <span>Voltar</span></span>
        </div>
        <div class="w-full px-8 md:px-20 py-[40px] mt-4 bg-white rounded-t-lg shadow-[6px_6px_20px_rgba(36,62,111,0.11)]">
            <form class="flex flex-wrap w-full" action="{{ route('logar') }}" method="POST">
                @csrf
                <div class="w-full mb-3">
                    <label class="form-label" for="">E-mail</label>
                    <input type="email" name="email" class="w-full form-input-text" maxlength="100" required>
                </div>
                <div class="w-full mb-3">
                    <label class="form-label" for="">Senha</label>
                    <input type="password" name="senha" class="w-full form-input-text" required>
                </div>
                
                <div class="w-full mt-4 text-center">
                    <button class="text-white rounded-[0.5rem] btn-warning text-[20px] waving-hand font-montserrat font-medium normal-case px-4 py-[10px] animation duration-500 hover:scale-105">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection