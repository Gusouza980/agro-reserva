@extends('template.main2')

@section('conteudo')
<div class="w-full bg-[#F5F5F5] py-5">
    <div class="pb-5 mx-auto w600 font-montserrat">
        <div class="w-full mx-auto">
            <span class="cursor-pointer transition duration-300 text-[14px] text-[#9b9ca3] hover:scale-105 hover:text-[#EE682A]"><i class="mr-2 fas fa-chevron-left"></i> <span>Voltar</span></span>
        </div>
        <div class="w-full px-8 md:px-20 py-[40px] mt-4 bg-white rounded-t-lg shadow-[6px_6px_20px_rgba(36,62,111,0.11)]">
            <div class="w-full">
                @if(session()->get('sucesso'))
                    <div class="mb-3 shadow-lg alert alert-success">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>{{ session()->get("sucesso") }}</span>
                        </div>
                    </div>
                @endif
                @if(session()->get('erro'))
                    <div class="mb-3 shadow-lg alert alert-error">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>{{ session()->get("erro") }}</span>
                        </div>
                    </div>
                @endif
            </div>
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
                <div class="w-full text-right">
                    <label for="my-modal" class="text-[#283646] font-montserrat text-[14px] font-medium hover:text-[#E8521D] cursor-pointer">Esqueci minha senha</label>
                </div>
                
                <div class="w-full mt-4 text-center">
                    <button class="text-white rounded-[0.5rem] btn-warning text-[20px] waving-hand font-montserrat font-medium normal-case px-4 py-[10px] animation duration-500 hover:scale-105">Entrar</button>
                </div>
                <div class="w-full mt-4 text-center">
                    <a href="{{ route('cadastro') }}" class="font-montserrat text-[14px] font-medium hover:!text-[#E8521D] cursor-pointer">Não possui uma conta ? Clique aqui para se cadastrar.</a>
                </div>
            </form>
        </div>
    </div>
</div>

<input type="checkbox" id="my-modal" class="modal-toggle" />
<div class="modal">
    <div class="modal-box">
        <form class="flex flex-wrap w-full" action="{{ route('conta.senha.recuperar') }}" method="POST">
            @csrf
            <div class="w-full">
                <label class="form-label" for="">E-mail</label>
                <input type="email" name="email" class="w-full form-input-text" maxlength="100" required>
                <small>Informe seu e-mail usado no cadastro e uma senha temporária lhe será enviada dentro de alguns instantes.</small>
            </div>
            <div class="w-full mt-3 text-right">
                <button class="text-white rounded-[0.5rem] btn-warning text-[15px] waving-hand font-montserrat font-medium normal-case px-4 py-2 animation duration-500 hover:scale-105">Enviar</button>
            </div>
        </form>
    </div>
</div>


@endsection