<div class="w-full bg-[#F5F5F5] pt-[200px] md:pt-[150px]">
    <div class="w-full bg-[#2E313C] pt-[200px] md:pt-[150px]">
        @livewire("institucional.newsletter")
        <div class="w1500 mx-auto flex flex-wrap items-start justify-between py-20 border-b border-[#B3D5FF]">
            <div class="self-center w-full px-5 md:w-1/3">
                <img src="{{ asset('imagens/logo_agroreserva_leite.svg') }}" class="w-full max-w-[250px] mx-auto" alt="">
            </div>
            <div class="w-full px-5 mt-4 md:w-1/3 md:mt-0">
                <div class="w-full">
                    <h3 class="font-montserrat font-bold text-[25px] text-[#D7D8E4] text-center sm:text-left text-md-left">Mapa do Site</h3>
                </div>
                <div class="w-full grid grid-cols-1 sm:grid-cols-2 mt-[25px]">
                    <div class="mx-auto md:mx-0 mx-md-0 text-center sm:text-left text-sm-left font-montserrat text-[16px] text-[#D7D8E4]">
                        <ul>
                            <li onclick="window.open('{{ route('index') }}')" class="hover:!text-[#F5B01F] cpointer">Início</li>
                            <li onclick="window.open('{{ route('cadastro') }}')" class="mt-[20px] hover:!text-[#F5B01F] cpointer">Cadastre-se</li>
                            <li @if(session()->get("usuario")) onclick="window.open('{{ route('conta.index') }}')" @else onclick="window.open('{{ route('login') }}')" @endif class="mt-[20px] hover:!text-[#F5B01F] cpointer">Minha Conta</li>
                            <li onclick="window.open('{{ route('reservas_abertas') }}')" class="mt-[20px] hover:!text-[#F5B01F] cpointer">Reservas Abertas</li>
                        </ul>
                    </div>
                    <div class="mx-auto text-center sm:text-left text-sm-left mt-4 sm:mt-0 mt-sm-0 font-montserrat text-[16px] text-[#D7D8E4]">
                        <ul>
                            <li onclick="window.open('{{ route('navegue_por_racas') }}')" class="hover:!text-[#F5B01F] cpointer">Navegue por raças</li>
                            <li onclick="window.open('{{ route('blog') }}')" class="mt-[20px] hover:!text-[#F5B01F] cpointer">Novidades (Blog)</li>
                            <li onclick="window.open('{{ route('sobre') }}')" class="mt-[20px] hover:!text-[#F5B01F] cpointer">Quem Somos</li>
                            {{-- <li class="mt-[20px] hover:!text-[#F5B01F] cpointer">Reservas Finalizadas</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-full px-5 mt-4 md:w-1/3 md:mt-0">
                <div class="w-full">
                    <h3 class="font-montserrat font-bold text-[25px] text-[#D7D8E4] text-center sm:text-left text-sm-left">Informações Legais</h3>
                </div>
                <div class="w-full grid grid-cols-1 sm:grid-cols-2 mt-[25px]">
                    <div class="mx-auto sm:mx-0 mx-sm-0 text-center sm:text-left text-sm-left font-montserrat text-[16px] text-[#D7D8E4]">
                        <ul>
                            <li onclick="window.open('{{ route('termos') }}')" class="hover:!text-[#F5B01F] cpointer">Termos e Condições</li>
                            <li onclick="window.open('{{ route('politicas') }}')" class="mt-[20px] hover:!text-[#F5B01F] cpointer">Política e Privacidade</li>
                        </ul>
                    </div>
                    <div class="mx-auto mx-sm-0 text-center sm:text-left text-sm-left font-montserrat text-[16px] text-[#D7D8E4]">
                        <ul>
                            <li onclick="window.open('https://api.whatsapp.com/send?phone=5514981809051', '_blank')" class="mt-[20px] sm:mt-0 hover:!text-[#F5B01F] cpointer">Precisa de Ajuda</li>
                            <li onclick="window.open('https://api.whatsapp.com/send?phone=5514981809051', '_blank')" class="mt-[20px] hover:!text-[#F5B01F] cpointer">Falar com os assessores</li>
                        </ul>
                    </div>
                </div>
                <div class="w-full mt-[20px]">
                    <div class="mx-auto sm:mx-0 mx-sm-0 text-center sm:text-left text-sm-left font-montserrat text-[14px] text-[#D7D8E4]">
                        <ul>
                            <li>Agro Reserva Pecuária Digital LTDA</li>
                            <li class="mt-[20px]">Cnpj: 41.893.302/0001-13</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap items-center justify-between py-8 mx-auto w1000">
            <div class="w-full text-center md:w-auto text-md-left">
                <i onclick="window.open('https://www.facebook.com/agroreserva1', '_blank')" class="cursor-pointer hover:scale-105 transition duration-150 fab fa-facebook-square text-[#FFB02A] text-[36px]"></i>
                <i onclick="window.open('https://www.youtube.com/c/BerranteComunicação', '_blank')" class="cursor-pointer hover:scale-105 transition duration-150 fab fa-youtube text-[#FFB02A] text-[36px] mx-8"></i>
                <i onclick="window.open('https://www.instagram.com/agro_reserva/', '_blank')" class="cursor-pointer hover:scale-105 transition duration-150 fab fa-instagram text-[#FFB02A] text-[36px]"></i>
            </div>
            <div class="w-full md:w-auto mt-[20px] md:mt-0">
                <div class="hidden w-full md:block">
                    <span class="font-roboto font-bold text-[16px] text-white">E-mail</span>
                </div>
                <div class="flex items-center justify-center w-full mt-2 md:justify-start">
                    <i class="fas fa-envelope text-[#FFB02A] text-[20px] mr-3"></i>
                    <span class="font-roboto text-[16px] text-[#A2A9B0]">contato@agroreserva.com.br</span>
                </div>
            </div>
            <div class="w-full md:w-auto mt-[20px] md:mt-0">
                <div class="hidden w-full md:block">
                    <span class="font-roboto font-bold text-[16px] text-white">Telefone</span>
                </div>
                <div class="flex flex-wrap items-center justify-center w-full mt-2 md:justify-start">
                    <div>
                        <i class="fas fa-phone-alt text-[#FFB02A] text-[20px] mr-3"></i>
                        <span class="font-roboto text-[16px] text-[#A2A9B0]">(14) 98180-9051 <span class="mx-2 text-[#FFB02A]">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full bg-[#F5F7FB] py-6 flex justify-center items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="152" height="23.119" viewBox="0 0 152 23.119">
            <g id="Grupo_120" data-name="Grupo 120" transform="translate(-171.337 -607.722)">
              <path id="Caminho_113" data-name="Caminho 113" d="M177.277,620.729c0,.089.01.177.015.265l.576-.182c-.025-.141.09-.193.273-.232,1.019-.222,2.544-.522,3.265-1.9a2.236,2.236,0,0,0,.271-.832c.091-1.191.126-1.258,1.229-1.651l.241-.085a8.9,8.9,0,0,0-1.6-.72,1.476,1.476,0,0,0-1.462.693,2.394,2.394,0,0,1-1.32.789h0c-.436.217-1.65.673-2.238.89a2.478,2.478,0,0,1-.328.12h0c-.174.052-.386.1-.643.167a15.511,15.511,0,0,1-2.565.263c-.542.037-1.087.01-1.631.011l-.018.128c1.079.544,2.4.229,3.516.9l-1.355.351a2.329,2.329,0,0,0,.279.1,2.447,2.447,0,0,0,.281.028,8.1,8.1,0,0,1,2.859.453C177.15,620.388,177.265,620.47,177.277,620.729Z" transform="translate(0 -3.044)" fill="#de2d0c"/>
              <path id="Caminho_114" data-name="Caminho 114" d="M176.721,623.793c.214-1.68-.894-4.351.43-5.514,1.128-.99,3.731-.3,5.682-.352.529-.013,1.06.028,1.587-.008a3.784,3.784,0,0,0,3.624-3.635,3.729,3.729,0,0,0-3.6-3.649c-2.114-.083-4.236-.081-6.349-.005-1.125.04-1.384-.38-1.406-1.441-.024-1.167.447-1.378,1.471-1.348,2.115.061,4.234,0,6.351.011a5.937,5.937,0,0,1,5.509,3.343,6.007,6.007,0,0,1-.436,6.825c-.727.97-1.01,1.452-.07,2.553a5.688,5.688,0,0,1,.62,6.581,5.942,5.942,0,0,1-5.41,3.518c-2.191.058-4.388-.054-6.576.045-1.293.058-1.5-.513-1.449-1.609C176.776,627.448,176.721,625.783,176.721,623.793Zm5.839,4.133c.3,0,.6,0,.9,0,2.8-.033,4.557-1.4,4.586-3.557s-1.74-3.591-4.524-3.661c-4.042-.1-4.042-.1-4.04,3.929C179.486,627.925,179.486,627.925,182.561,627.925Z" transform="translate(-2.052 -0.046)" fill="#2b323a"/>
              <path id="Caminho_115" data-name="Caminho 115" d="M333.574,608c2.674-.78,3.847.358,4.936,2.25a152.123,152.123,0,0,0,9.452,14.55q0-5.007,0-10.015c0-1.655.064-3.341-.026-5.446-.049-1.14.24-1.587,1.574-1.6,1.407-.012,1.528.567,1.521,1.64-.04,6.43,0,12.86-.047,19.29-.005.687.163,1.959-1.345,2-1.179.031-2.082.348-2.952-1.125-2.651-4.491-5.113-8.456-7.84-12.906C337.172,613.9,335.294,610.82,333.574,608Z" transform="translate(-64.614 -0.008)" fill="#2b323a"/>
              <path id="Caminho_116" data-name="Caminho 116" d="M207.017,624.635c0-2.416.023-6.307-.028-8.723-.021-1,.341-1.317,1.317-1.288.933.028,1.5.087,1.568,1.3.175,3.2.259,4.669,3.415,4.67.453,0,.909.034,1.358-.007.99-.093,1.506.146,1.529,1.325.025,1.247-.454,1.478-1.587,1.516-4.737.159-4.642.2-4.785,4.829-.057,1.843.369,2.5,2.309,2.38,2.858-.176,5.737.009,8.6-.074,1.211-.035,1.527.374,1.533,1.54.005,1.2-.549,1.318-1.517,1.31-4.077-.033-8.155-.052-12.231.019-1.218.021-1.551-.375-1.509-1.555C207.077,629.469,207.017,627.051,207.017,624.635Z" transform="translate(-14.199 -2.748)" fill="#2b323a"/>
              <path id="Caminho_117" data-name="Caminho 117" d="M304.889,608.156c1.646,1.97,1.613,3.665.557,5.744-2.455,4.835-4.716,9.775-6.874,14.751-.838,1.933-1.94,2.643-4.131,1.948Z" transform="translate(-49.029 -0.173)" fill="#2b323a"/>
              <path id="Caminho_118" data-name="Caminho 118" d="M322.4,634.19c-2.232.578-3.343-.028-4.085-1.946-1.107-2.864-3.014-6.67-4.3-9.466-1.184-2.573-1.176-2.576.57-5.516C317.071,622.62,319.945,628.885,322.4,634.19Z" transform="translate(-56.498 -3.8)" fill="#2b323a"/>
              <path id="Caminho_119" data-name="Caminho 119" d="M376.226,610.82c-2.2,0-4.393-.055-6.586.022-1.241.043-1.727-.271-1.69-1.506.032-1.072.36-1.45,1.534-1.436,4.472.054,8.945.076,13.417.016,1.373-.018,1.578.524,1.592,1.625.016,1.232-.663,1.309-1.68,1.289C380.618,610.79,378.422,610.818,376.226,610.82Z" transform="translate(-78.305 -0.071)" fill="#2b323a"/>
              <path id="Caminho_120" data-name="Caminho 120" d="M333.392,613.256c2.019,2.592,3.081,2.791,3.081,7.612,0,2.6-.108,8.28-.04,10.888.029,1.151-.676,1.121-1.545,1.131-.887.011-1.528-.011-1.517-1.134C333.42,626.652,333.392,618.737,333.392,613.256Z" transform="translate(-64.533 -2.204)" fill="#2b323a"/>
              <path id="Caminho_121" data-name="Caminho 121" d="M379.35,624.782c0-2.488.039-5.78-.017-8.267-.023-1.035.162-1.515,1.332-1.515,1.209,0,1.527.4,1.512,1.607-.06,4.9-.054,10.6,0,15.5.013,1.169-.237,1.611-1.481,1.635-1.4.027-1.372-.716-1.358-1.728C379.373,629.6,379.35,627.192,379.35,624.782Z" transform="translate(-82.838 -2.899)" fill="#2b323a"/>
              <path id="Caminho_122" data-name="Caminho 122" d="M214.51,607.851c2.039,0,4.079.042,6.117-.021,1.093-.034,1.657.16,1.608,1.462-.042,1.116-.426,1.38-1.47,1.367-4.154-.051-8.309-.073-12.461.009-1.228.025-1.267-.538-1.336-1.477-.086-1.164.38-1.4,1.426-1.358C210.43,607.906,212.471,607.854,214.51,607.851Z" transform="translate(-14.187 -0.042)" fill="#2b323a"/>
              <path id="Caminho_123" data-name="Caminho 123" d="M398.609,624.785c0-2.416.035-6.081-.017-8.5-.022-1,.341-1.317,1.317-1.288.933.027,1.5.086,1.567,1.3.176,3.2.248,4.442,3.4,4.443.453,0,.91.034,1.359-.007.99-.093,1.505.146,1.529,1.325.025,1.247-.454,1.478-1.587,1.516-4.737.159-4.642.2-4.785,4.829-.057,1.843.368,2.5,2.309,2.38,2.858-.176,5.737.009,8.6-.074,1.211-.035,1.527.374,1.532,1.54.006,1.2-.549,1.318-1.516,1.31-4.077-.033-8.155-.052-12.231.019-1.218.021-1.551-.375-1.509-1.555C398.669,629.62,398.609,627.2,398.609,624.785Z" transform="translate(-90.504 -2.899)" fill="#2b323a"/>
              <path id="Caminho_124" data-name="Caminho 124" d="M406.1,607.852c2.039,0,4.08.045,6.117-.022,1.093-.036,1.657.168,1.608,1.538-.042,1.174-.427,1.452-1.471,1.438-4.153-.053-8.308-.076-12.46.01-1.228.026-1.267-.566-1.336-1.554-.086-1.225.379-1.468,1.425-1.428C402.022,607.909,404.063,607.855,406.1,607.852Z" transform="translate(-90.492 -0.042)" fill="#2b323a"/>
              <g id="Grupo_118" data-name="Grupo 118" transform="translate(228.269 607.722)">
                <path id="Caminho_125" data-name="Caminho 125" d="M266.2,623.848c.2-1.671-.925-4.449.437-5.633,1.179-1.025,3.883-.3,5.913-.345a16.341,16.341,0,0,0,1.81-.037,3.589,3.589,0,0,0,3.213-3.742,3.43,3.43,0,0,0-3.477-3.425c-2.112-.078-4.231-.087-6.342-.01-1.172.043-1.6-.309-1.577-1.523.017-1.112.418-1.434,1.47-1.406,2.264.059,4.536-.075,6.795.052a6.48,6.48,0,0,1,6.054,6.454,6.614,6.614,0,0,1-6.3,6.463c-1.679.1-3.923-.849-4.879.49-.793,1.111-.211,3.206-.228,4.865-.01.981-.03,1.965,0,2.945s.079,1.734-1.341,1.738c-1.359,0-1.657-.5-1.584-1.725C266.262,627.428,266.2,625.838,266.2,623.848Z" transform="translate(-265.952 -607.722)" fill="#2b323a"/>
                <path id="Caminho_126" data-name="Caminho 126" d="M284.171,640.036c-3.249.459-4.19-.969-5.373-3.24a45.24,45.24,0,0,0-2.988-5.322c3.687-.342,3.766.217,5.109,2.644C281.841,635.785,283.122,638.119,284.171,640.036Z" transform="translate(-269.878 -617.145)" fill="#2b323a"/>
              </g>
              <path id="Caminho_127" data-name="Caminho 127" d="M315.521,631.856c-2.179.044-3.772.072-5.608-.023-2.054-.107-3.061.66-3.445,2.933,3.052-.039,6.389-.075,9.722-.111Z" transform="translate(-53.819 -9.599)" fill="#2b323a"/>
              <g id="Grupo_119" data-name="Grupo 119" transform="translate(209.849 607.722)">
                <path id="Caminho_128" data-name="Caminho 128" d="M235.587,623.848c.2-1.671-.925-4.449.436-5.633,1.18-1.025,3.883-.3,5.913-.345a16.347,16.347,0,0,0,1.81-.037,3.589,3.589,0,0,0,3.213-3.742,3.43,3.43,0,0,0-3.477-3.425c-2.112-.078-4.231-.087-6.342-.01-1.172.043-1.6-.309-1.577-1.523.017-1.112.418-1.434,1.47-1.406,2.264.059,4.536-.075,6.795.052a6.479,6.479,0,0,1,6.054,6.454,6.614,6.614,0,0,1-6.3,6.463c-1.679.1-3.923-.849-4.879.49-.792,1.111-.211,3.206-.228,4.865-.01.981-.029,1.965.005,2.945s.079,1.734-1.341,1.738c-1.359,0-1.657-.5-1.584-1.725C235.65,627.428,235.583,625.838,235.587,623.848Z" transform="translate(-235.339 -607.722)" fill="#2b323a"/>
                <path id="Caminho_129" data-name="Caminho 129" d="M253.558,640.036c-3.249.459-4.19-.969-5.373-3.24a45.153,45.153,0,0,0-2.988-5.322c3.687-.342,3.766.217,5.109,2.644C251.228,635.785,252.51,638.119,253.558,640.036Z" transform="translate(-239.265 -617.145)" fill="#2b323a"/>
              </g>
            </g>
        </svg>
        <span class="font-montserrat text-[14px] ml-3">Desenvolvido pela Agência Berrante Comunicação - Feito pensando em você</span>
    </div>
</div>