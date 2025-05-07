<div class="w-full flex flex-col justify-center h-full items-center">
    <div class="w-full text-center font-medium font-montserrat">
        Caso tenha alguma dúvida ou dificuldade você pode obter ajuda na hora entrando em contato com o nosso time comercial !
    </div>
    <div class="w-full flex md:flex-row flex-col justify-center items-center gap-3 font-montserrat mt-5">
        @php
            $numeros = ['5534992754132', '5534996920202'];
            $sorteado = array_rand($numeros, 1);
        @endphp
        <a href="https://wa.me/{{ $numeros[$sorteado] }}" class="bg-green-600 text-white rounded-md px-4 py-1 hover:bg-green-700 transition duration-200 flex items-center gap-x-1">
            <i class="fa-brands fa-whatsapp"></i> Falar com um consultor
        </a>
    </div>
</div>
