<div class="w-full bg-[#EFEFEF]">
    <div class="flex py-1 mx-auto w1200">
        <div class="flex-grow hidden text-start md:block">
            <span class="font-montserrat font-medium text-[12px]">
                Olá, seja bem-vindo(a) @if(session()->get("cliente")) {{ explode(" ", session()->get("cliente")["nome_dono"])[0] }} @endif!
            </span>
        </div>
        <div class="flex justify-center flex-grow">
            <div class="px-4 border-r border-black">
                <span class="font-montserrat font-bold text-[10px] md:text-[12px] text-[#3FDB67]">0%</span> <span class="font-montserrat text-[10px] md:text-[12px] font-medium">Comissão</span>
            </div>
            <div class="px-4 border-r border-black">
                <span class="font-montserrat font-bold text-[10px] md:text-[12px] text-[#EE682A]">100%</span> <span class="font-montserrat text-[10px] md:text-[12px] font-medium">Confiança</span>
            </div>
            <div class="px-4">
                <span class="font-montserrat font-bold text-[10px] md:text-[12px] text-[#F3B248]">100%</span> <span class="font-montserrat text-[10px] md:text-[12px] font-medium">Qualidade</span>
            </div>
        </div>
        <div class="items-center justify-end flex-grow hidden md:flex">
            <div class="px-3">
                <i onclick="window.open('https://www.facebook.com/agroreserva1', '_blank')" class="cursor-pointer hover:scale-105 transition duration-150 fab fa-facebook-square text-[#80828B] fa-lg"></i>
            </div>
            <div class="px-3">
                <i onclick="window.open('https://www.youtube.com/c/BerranteComunicação', '_blank')" class="cursor-pointer hover:scale-105 transition duration-150 fab fa-youtube text-[#80828B] fa-lg"></i>
            </div>
            <div class="pl-3">
                <i onclick="window.open('https://www.instagram.com/agro_reserva/', '_blank')" class="cursor-pointer hover:scale-105 transition duration-150 fab fa-instagram text-[#80828B] fa-lg"></i>
            </div>
        </div>
    </div>
</div>