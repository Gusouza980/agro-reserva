<div x-data="{ showFormDadosPessoais: @entangle('show') }" class="w-full max-w-[1400px] mx-auto relative">
    <div x-cloak x-show="showFormDadosPessoais" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-0" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-0" class="w-full font-montserrat absolute -top-[15vh] pb-5">
        <div class="w-full">
            <span wire:click="voltar" class="cursor-pointer transition duration-300 text-[14px] text-[#D7D8E4] hover:scale-105 hover:text-white"><i class="fas fa-chevron-left mr-2"></i> <span>Voltar</span></span>
        </div>
        <div class="w-full px-8 md:px-20 py-24 mt-3 bg-white rounded-t-lg shadow-[6px_6px_20px_rgba(36,62,111,0.11)]">
            <x-institucional.cadastro.step-bar step="2"></x-institucional.cadastro.step-bar>
            <div class="flex w-full mt-5">
                <div class="hidden md:block md:w-5/12">
                    @if ($categoria === 0)
                        <svg class="max-w-full" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="459.108" height="449"
                            viewBox="0 0 459.108 449">
                            <defs>
                                <clipPath id="clip-path">
                                    <path id="Caminho_2797" data-name="Caminho 2797"
                                        d="M158.009,430.629H145.732a11.311,11.311,0,0,1-11.272-10.365L132,395.74h39.673l-2.354,24.525a11.32,11.32,0,0,1-11.311,10.363Z"
                                        transform="translate(-132 -395.74)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                </clipPath>
                                <clipPath id="clip-path-2">
                                    <path id="Caminho_2815" data-name="Caminho 2815"
                                        d="M217.394,315.893s-14.478,39.884-9.885,56.964,28.564,11.818,34.449,1.359,17.291-48.4,17.291-48.4L247.431,303.09l-26.171,5.9-2.507,3.579Z"
                                        transform="translate(-206.609 -303.09)" fill="#858585" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                </clipPath>
                                <clipPath id="clip-path-3">
                                    <path id="Caminho_2840" data-name="Caminho 2840"
                                        d="M408.7,254.793s-15.31,80.38-17.607,177.266H253.374s15.617-82.227-1.914-189.467C251.489,242.564,322.491,192.03,408.7,254.793Z"
                                        transform="translate(-251.46 -223.334)" fill="#ffc100" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                </clipPath>
                                <clipPath id="clip-path-4">
                                    <path id="Caminho_2847" data-name="Caminho 2847"
                                        d="M429.773,325.222s2.124,56.266-17.741,75.758c0,0-23.856,5.454-93.623-47.577,0,0-6.928.6-10.526-3.636,0,0-11.244,3.943-17.138-2.421,0,0-7.56.3-9.253-6.7,0,0-4.784.6-6.469-1.512,0,0-5.741.3-6.555-2.727s5.674-5.474,5.674-5.474.124-6.957,3-9.071a22.964,22.964,0,0,1,5.541-3.033s-19.062-11.483-16.736-17.875,5.521,4.842,23.655,12.727c0,0,9.11.3,10.861,3.636L322.523,335.8s6.449,1.722,8.564,2.431c13.712,4.574,32.937,12.727,55.768,14.239l4.43-36.362S418.97,309.462,429.773,325.222Z"
                                        transform="translate(-265.755 -299.065)" fill="#858585" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                </clipPath>
                                <clipPath id="clip-path-5">
                                    <path id="Caminho_2858" data-name="Caminho 2858"
                                        d="M355.5,227.863s-10.679-16.593-7.722-45.233L304.094,185.5s-.383,37.874-14.354,39.884l11.406,14.593,10.057.746,17.387.077,25.339-8.182Z"
                                        transform="translate(-289.74 -182.63)" fill="#858585" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                </clipPath>
                                <clipPath id="clip-path-6">
                                    <path id="Caminho_2891" data-name="Caminho 2891"
                                        d="M228.8,314.221s-21.923,40.793-21.253,56.964,10.832,21.588,10.832,21.588,27.406-1.359,27.855-33.865l3.7-31.578s9.569-3.254,13.4-9.923c0,0,9.569-3.253,12.574-8.708s4.785-12.507,1.77-13.636-5.12,8.8-7.741,10.679c-1.751,1.254-4.555,2.871-6.21,3.828a1.445,1.445,0,0,1-1.99-.737h0a1.3,1.3,0,0,1,.392-1.6,29.331,29.331,0,0,0,6-5.741c2.871-3.828,10.995-15,6.957-17.5s-10.65,9.684-13.272,11.7c-1.6,1.263-3.828,2.708-5.234,3.627A2.4,2.4,0,0,1,253.71,299l-.163-.144a2.421,2.421,0,0,1-.612-2.871,40.458,40.458,0,0,1,2.526-4.641c1.742-2.306,4.067-4.526,7.655-8.67,3.741-4.287,7.062-7.32,4.536-9.292-4.966-3.828-17.818,10.689-19.511,12.507a18.858,18.858,0,0,0-2.66,4.363,1.387,1.387,0,0,1-1.914.584h0a1.589,1.589,0,0,1-.833-1.244c-.153-1.809-.45-6.009-.057-7.569.565-2.258,2.172-3.828,4.5-8,2.048-3.627,4.421-7.454,2.718-9.043-3.646-3.416-10.88,7.043-10.88,7.043l-5.2,9.359s2.163-4.785-.5-7.052-2.507,2.957-4.784,5.684-.1,8.411-.718,12.5a53.031,53.031,0,0,0-.632,7.273Z"
                                        transform="translate(-207.534 -264.293)" fill="#858585" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                </clipPath>
                            </defs>
                            <g id="Grupo_9407" data-name="Grupo 9407" transform="translate(-366 -437)">
                                <g id="Mobile_UX-bro" data-name="Mobile UX-bro" transform="translate(366 437)">
                                    <g id="freepik--background-simple--inject-16" transform="translate(36.06 0.001)"
                                        opacity="0.396">
                                        <path id="Caminho_2757" data-name="Caminho 2757"
                                            d="M233.729,53.8C113.82,41.859,44.425,112.057,31.88,229.048c-12.229,113.517,15.435,214.126,129.6,214.126,36.161,0,78.543-23.387,119.613-35.405,88.571-25.836,164.875-24.21,170.893-139.832C458.535,141.606,347.342,65.111,233.729,53.8ZM78.768,225.22c-6.172,0-6.153-9.569,0-9.569S84.921,225.22,78.768,225.22Z"
                                            transform="translate(-29.217 -52.485)" fill="#d7d7e3" />
                                        <path id="Caminho_2758" data-name="Caminho 2758"
                                            d="M233.729,53.8C113.82,41.859,44.425,112.057,31.88,229.048c-12.229,113.517,15.435,214.126,129.6,214.126,36.161,0,78.543-23.387,119.613-35.405,88.571-25.836,164.875-24.21,170.893-139.832C458.535,141.606,347.342,65.111,233.729,53.8ZM78.768,225.22c-6.172,0-6.153-9.569,0-9.569S84.921,225.22,78.768,225.22Z"
                                            transform="translate(-29.217 -52.485)" fill="#d7d7e3" opacity="0.75" />
                                    </g>
                                    <g id="freepik--Table--inject-16" transform="translate(46.378 372.212)">
                                        <g id="freepik--freepik--Table--inject-4--inject-16">
                                            <line id="Linha_99" data-name="Linha 99" x2="401.899" fill="none"
                                                stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1" />
                                        </g>
                                    </g>
                                    <g id="freepik--Coffee--inject-16" transform="translate(61.573 275.125)">
                                        <path id="Caminho_2795" data-name="Caminho 2795"
                                            d="M158.009,430.629H145.732a11.311,11.311,0,0,1-11.272-10.365L132,395.74h39.673l-2.354,24.525a11.32,11.32,0,0,1-11.311,10.363Z"
                                            transform="translate(-114.533 -342.402)" fill="#fff" />
                                        <g id="Grupo_3932" data-name="Grupo 3932"
                                            transform="translate(17.467 53.338)" clip-path="url(#clip-path)">
                                            <path id="Caminho_2796" data-name="Caminho 2796"
                                                d="M170.336,410.378l.134-.182c.057-.134.191-.421.23-.545a5.072,5.072,0,0,0,.1-.517c.029-.172,0-.077,0-.115.077-.67.134-1.349.23-2.019H133.4a5.292,5.292,0,0,1,.344,3.416v.048h0v1.32c.115.354.115.383,0,.115v.048a5.845,5.845,0,0,1,.364,1.713h35.721A4.038,4.038,0,0,1,170.336,410.378Z"
                                                transform="translate(-132.06 -396.225)" fill="#ffc100" />
                                        </g>
                                        <path id="Caminho_2798" data-name="Caminho 2798"
                                            d="M158.009,430.629H145.732a11.311,11.311,0,0,1-11.272-10.365L132,395.74h39.673l-2.354,24.525a11.32,11.32,0,0,1-11.311,10.363Z"
                                            transform="translate(-114.533 -342.402)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2799" data-name="Caminho 2799"
                                            d="M158.353,432.129H146.076a11.168,11.168,0,0,1-5.741-1.579L140,434.464h24.43l-.335-3.914a11.167,11.167,0,0,1-5.741,1.579Z"
                                            transform="translate(-114.877 -343.902)" fill="#fff" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2800" data-name="Caminho 2800"
                                            d="M177.678,399.445c-1.732-.411-3.368.316-4.861,1.713l-.488,4.947c1.359-2.249,2.976-3.828,4.66-3.4,3.608.861,4.88,5.454,3.732,10.229s-5,7.923-8.612,7.062l-1.148-.268-.067.689a12.344,12.344,0,0,1-.373,2.086l.459.105c5.607,1.349,11.406-2.737,12.947-9.138S183.314,400.8,177.678,399.445Z"
                                            transform="translate(-116.193 -342.557)" fill="#fff" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2801" data-name="Caminho 2801"
                                            d="M152.482,428.8c-3.99.6-8.4,3.885-7.923,7.033s5.674,4.976,9.665,4.373c3.215-.5,3.828-3.206,5.569-4.9,5.119-4.966,24.879-4.88,32.2-4.67a2.306,2.306,0,0,0,2.344-2.66h0a2.306,2.306,0,0,0-2.545-1.914c-6.086.7-23.109,2.756-31.08,4.785C158.376,431.389,155.706,428.308,152.482,428.8Z"
                                            transform="translate(-115.072 -343.708)" fill="#fff" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2802" data-name="Caminho 2802"
                                            d="M164.389,441.537H136.113a33.836,33.836,0,0,1-12.555-2.421l-9.177-3.665a1.024,1.024,0,0,1,.383-1.971h70.993a1.024,1.024,0,0,1,.383,1.971l-9.177,3.665A33.8,33.8,0,0,1,164.389,441.537Z"
                                            transform="translate(-113.746 -344.029)" fill="#fff" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2803" data-name="Caminho 2803"
                                            d="M153.34,343.445A10.525,10.525,0,0,0,150,340"
                                            transform="translate(-115.308 -340)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2804" data-name="Caminho 2804"
                                            d="M152.3,361.464c3.024-6.038,3.359-10.593,2.641-13.894"
                                            transform="translate(-115.407 -340.326)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2805" data-name="Caminho 2805"
                                            d="M147.187,380.2c-.746-4.1-.163-9.253,3.464-15.4"
                                            transform="translate(-115.175 -341.069)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2806" data-name="Caminho 2806"
                                            d="M154.572,392.521a19.234,19.234,0,0,1-6.622-8.851"
                                            transform="translate(-115.22 -341.882)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2807" data-name="Caminho 2807"
                                            d="M164.288,354.68a8.467,8.467,0,0,0-2.938-3.32"
                                            transform="translate(-115.797 -340.49)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2808" data-name="Caminho 2808"
                                            d="M163.56,367.419c1.914-4.172,2.191-7.387,1.732-9.8"
                                            transform="translate(-115.893 -340.759)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2809" data-name="Caminho 2809"
                                            d="M164.891,391.969s-11.11-7.416-3.043-21.119"
                                            transform="translate(-115.692 -341.33)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2810" data-name="Caminho 2810"
                                            d="M143.444,366.7a8.4,8.4,0,0,0-.364-2.478"
                                            transform="translate(-115.01 -341.044)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2811" data-name="Caminho 2811"
                                            d="M140.63,375.281a20.041,20.041,0,0,0,2.411-5.742"
                                            transform="translate(-114.904 -341.273)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2812" data-name="Caminho 2812"
                                            d="M142.928,392.276s-7.5-5-3.579-14.306"
                                            transform="translate(-114.8 -341.636)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    </g>
                                    <g id="freepik--Comment--inject-16" transform="translate(148.047 131)">
                                        <path id="Caminho_2904" data-name="Caminho 2904"
                                            d="M420.855,132.954H390.942a1.292,1.292,0,0,1-1.292-1.292h0a1.282,1.282,0,0,1,1.292-1.292h29.941a1.292,1.292,0,0,1,1.292,1.292h0a1.3,1.3,0,0,1-1.321,1.292Z"
                                            transform="translate(-382.942 -124.399)" fill="#263238" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2905" data-name="Caminho 2905"
                                            d="M419.993,139.684H390.942a1.292,1.292,0,0,1-1.292-1.292h0a1.282,1.282,0,0,1,1.292-1.292h29.08a1.292,1.292,0,0,1,1.292,1.292h0a1.3,1.3,0,0,1-1.321,1.292Z"
                                            transform="translate(-382.942 -124.689)" fill="#263238" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <rect id="Retângulo_2621" data-name="Retângulo 2621" width="23.052"
                                            height="2.584" rx="1.292" transform="translate(6.679 18.851)"
                                            fill="#263238" stroke="#263238" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2906" data-name="Caminho 2906"
                                            d="M426.15,152.07a4.239,4.239,0,0,0,4.239-4.239V131.42"
                                            transform="translate(-384.515 -124.444)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2907" data-name="Caminho 2907"
                                            d="M422.262,152.99H405.947l-11.33,11.33V152.99H392.56"
                                            transform="translate(-383.068 -125.374)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2908" data-name="Caminho 2908"
                                            d="M382.64,131.42v16.4a4.239,4.239,0,0,0,4.239,4.239h2.44"
                                            transform="translate(-382.64 -124.444)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2909" data-name="Caminho 2909"
                                            d="M428.514,128.369a4.239,4.239,0,0,0-4.239-4.239h-37.4a4.239,4.239,0,0,0-4.239,4.239"
                                            transform="translate(-382.64 -124.13)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                    </g>
                                    <g id="freepik--Rating--inject-16" transform="translate(300.35 124.537)">
                                        <path id="Caminho_2910" data-name="Caminho 2910"
                                            d="M443.849,186.869a4.249,4.249,0,0,0-4.239-4.239H377"
                                            transform="translate(-369.948 -182.63)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2911" data-name="Caminho 2911"
                                            d="M396.5,210.566h43.951a4.239,4.239,0,0,0,4.239-4.239V190.06"
                                            transform="translate(-370.788 -182.95)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2912" data-name="Caminho 2912"
                                            d="M381.69,217.4v5.416l11.339-11.33"
                                            transform="translate(-370.15 -183.874)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2913" data-name="Caminho 2913"
                                            d="M369.63,207.06a4.239,4.239,0,0,0,4.239,4.239h7.3v3.55"
                                            transform="translate(-369.63 -183.683)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2914" data-name="Caminho 2914"
                                            d="M373.869,182.63a4.239,4.239,0,0,0-4.239,4.239v16.21"
                                            transform="translate(-369.63 -182.63)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2915" data-name="Caminho 2915"
                                            d="M385.094,201.807l-5.158,2.708.986-5.741L376.74,194.7l5.77-.833,2.584-5.234,2.584,5.234,5.761.833-4.172,4.076.986,5.741Z"
                                            transform="translate(-369.936 -182.889)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2916" data-name="Caminho 2916"
                                            d="M407.864,201.807l-5.158,2.708.986-5.741L399.52,194.7l5.77-.833,2.574-5.234,2.584,5.234,5.77.833-4.182,4.076.986,5.741Z"
                                            transform="translate(-370.918 -182.889)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2917" data-name="Caminho 2917"
                                            d="M430.634,201.807l-5.158,2.708.986-5.741L422.29,194.7l5.77-.833,2.574-5.234,2.584,5.234,5.77.833-4.172,4.076.986,5.741Z"
                                            transform="translate(-371.9 -182.889)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                    </g>
                                    <g id="freepik--Clouds--inject-6" transform="translate(0 0)" opacity="0.729">
                                        <path id="Caminho_2630" data-name="Caminho 2630"
                                            d="M236.934,176.324c-7.5-4.1-10.921-.683-13.655-4.1s7.517-12.288-12.96-21.207c0,0-1.367-19.121-29.36-19.8s-20.476,19.121-27.993,23.893-9.555-2.722-17.06,2.05-4.1,14.338-10.25,15.7-14.338-6.138-21.843-1.367-7.528,8.954-10.933,8.954-10.25-2.733-14.338,0-8.883,6.138-8.883,6.138H242.4S244.427,180.448,236.934,176.324Z"
                                            transform="translate(-69.66 -97.367)" fill="#80828b" />
                                        <path id="Caminho_2631" data-name="Caminho 2631"
                                            d="M290.427,125.065c-3.758-2.05-5.467-.342-6.833-2.05s3.758-6.162-6.5-10.6c0,0-.683-9.578-14.7-9.92s-10.25,9.578-14.008,11.97-4.8-1.367-8.553,1.025-2.05,7.187-5.125,7.87-7.187-3.087-10.945-.683-3.758,4.442-5.467,4.442-5.125-1.367-7.187,0-4.442,3.075-4.442,3.075h86.5S294.244,127.115,290.427,125.065Z"
                                            transform="translate(-45.253 -102.483)" fill="#80828b" />
                                        <path id="Caminho_2632" data-name="Caminho 2632"
                                            d="M360.427,160.065c-3.758-2.05-5.467-.342-6.833-2.05s3.758-6.162-6.5-10.6c0,0-.683-9.578-14.7-9.92s-10.25,9.578-14.008,11.97-4.8-1.367-8.553,1.025-2.05,7.187-5.125,7.87-7.187-3.087-10.945-.683-3.758,4.442-5.467,4.442-5.125-1.367-7.187,0-4.442,3.075-4.442,3.075h86.5S364.244,162.115,360.427,160.065Z"
                                            transform="translate(-32.783 -96.247)" fill="#80828b" />
                                        <g id="Grupo_3929" data-name="Grupo 3929" transform="translate(0 0)"
                                            opacity="0.6">
                                            <path id="Caminho_2633" data-name="Caminho 2633"
                                                d="M236.934,176.324c-7.5-4.1-10.921-.683-13.655-4.1s7.517-12.288-12.96-21.207c0,0-1.367-19.121-29.36-19.8s-20.476,19.121-27.993,23.893-9.555-2.722-17.06,2.05-4.1,14.338-10.25,15.7-14.338-6.138-21.843-1.367-7.528,8.954-10.933,8.954-10.25-2.733-14.338,0-8.883,6.138-8.883,6.138H242.4S244.427,180.448,236.934,176.324Z"
                                                transform="translate(-69.66 -97.367)" fill="#80828b" />
                                            <path id="Caminho_2634" data-name="Caminho 2634"
                                                d="M290.427,125.065c-3.758-2.05-5.467-.342-6.833-2.05s3.758-6.162-6.5-10.6c0,0-.683-9.578-14.7-9.92s-10.25,9.578-14.008,11.97-4.8-1.367-8.553,1.025-2.05,7.187-5.125,7.87-7.187-3.087-10.945-.683-3.758,4.442-5.467,4.442-5.125-1.367-7.187,0-4.442,3.075-4.442,3.075h86.5S294.244,127.115,290.427,125.065Z"
                                                transform="translate(-45.253 -102.483)" fill="#80828b" />
                                            <path id="Caminho_2635" data-name="Caminho 2635"
                                                d="M360.427,160.065c-3.758-2.05-5.467-.342-6.833-2.05s3.758-6.162-6.5-10.6c0,0-.683-9.578-14.7-9.92s-10.25,9.578-14.008,11.97-4.8-1.367-8.553,1.025-2.05,7.187-5.125,7.87-7.187-3.087-10.945-.683-3.758,4.442-5.467,4.442-5.125-1.367-7.187,0-4.442,3.075-4.442,3.075h86.5S364.244,162.115,360.427,160.065Z"
                                                transform="translate(-32.783 -96.247)" fill="#80828b" />
                                        </g>
                                    </g>
                                    <g id="freepik--Character--inject-16" transform="translate(130.406 45.381)">
                                        <path id="Caminho_2813" data-name="Caminho 2813"
                                            d="M217.394,315.893s-14.478,39.884-9.885,56.964,28.564,11.818,34.449,1.359,17.291-48.4,17.291-48.4L247.431,303.09l-26.171,5.9-2.507,3.579Z"
                                            transform="translate(-206.609 -108.665)" fill="#858585" />
                                        <g id="Grupo_3933" data-name="Grupo 3933" transform="translate(0 194.425)"
                                            clip-path="url(#clip-path-2)">
                                            <path id="Caminho_2814" data-name="Caminho 2814"
                                                d="M244.8,372.726a5.149,5.149,0,0,1,.861-2.689,2.957,2.957,0,0,1-.306-2.871c1.617-5.741,5.043-12.564,6.861-18.3,1.914-5.962,5.6-12.708,5.741-19.033.191-10.057-9.837-14.411-18.535-16.267-4.641,9.368-22.009,43.195-32.87,46.754.163,2.871.8,5.674.545,8.536v.306a6.364,6.364,0,0,1,.6,1.914,6.538,6.538,0,0,1,0,1.675Z"
                                                transform="translate(-206.607 -303.542)" opacity="0.2" />
                                        </g>
                                        <path id="Caminho_2816" data-name="Caminho 2816"
                                            d="M217.394,315.893s-14.478,39.884-9.885,56.964,28.564,11.818,34.449,1.359,17.291-48.4,17.291-48.4L247.431,303.09l-26.171,5.9-2.507,3.579Z"
                                            transform="translate(-206.609 -108.665)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2817" data-name="Caminho 2817"
                                            d="M356.184,160.176s5.55-5.043,1.407-10.344c0,0,5.54-3.942,1.541-10.765,0,0,6.086-7.722-1.541-12.87,0,0,3.895-8.038-5.043-7.885,0,0,1.512-8.478-7.426-5.3,0,0,.6-8.488-6.966-4.7,0,0-3.34-7.569-7.272.306,0,0-3.828-10-10.459-6.517,0,0-12.88-5.9-14.7,1.665,0,0-8.335-2.115-10.526,3.636,0,0-9.32-1.206-9.77,6.823,0,0-8.794,3.024-6.067,9.569,0,0-3.923,5.158-.526,10.306,0,0-3.263,3.483.526,9.847,0,0-1.665,6.516,2.871,11.215l55.3,9.091,2.574,12.574,10.727-4.239Z"
                                            transform="translate(-209.662 -99.909)" fill="#263238" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2818" data-name="Caminho 2818"
                                            d="M322.729,107.2c-2.019-2.612-5.741-4.89-12.239-2.048"
                                            transform="translate(-211.086 -100.078)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2819" data-name="Caminho 2819"
                                            d="M325.493,111.9a11.972,11.972,0,0,0-.833-2.287"
                                            transform="translate(-211.697 -100.327)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2820" data-name="Caminho 2820"
                                            d="M314.943,111.264s-9.847,6.067-13.483-2.574"
                                            transform="translate(-210.697 -100.287)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2821" data-name="Caminho 2821"
                                            d="M331.5,118.954s-11,3.56-12.5-5.694"
                                            transform="translate(-211.453 -100.484)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2822" data-name="Caminho 2822"
                                            d="M322.3,127.071c-1.914-2.765-5.684-5.426-12.526-2.44"
                                            transform="translate(-211.055 -100.918)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2823" data-name="Caminho 2823"
                                            d="M324.773,131.4a12.088,12.088,0,0,0-.823-2.277"
                                            transform="translate(-211.666 -101.168)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2824" data-name="Caminho 2824"
                                            d="M300.788,130.965a9.409,9.409,0,0,1-1.388-2.325"
                                            transform="translate(-210.608 -101.147)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2825" data-name="Caminho 2825"
                                            d="M313.01,131.33s-6.507,4-10.89.871"
                                            transform="translate(-210.725 -101.263)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2826" data-name="Caminho 2826"
                                            d="M359.062,145.164s2.765-8.526-6.832-9.684"
                                            transform="translate(-212.885 -101.442)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2827" data-name="Caminho 2827"
                                            d="M341.3,141.78s-3.569,6.363,3.9,8.823"
                                            transform="translate(-212.377 -101.713)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2828" data-name="Caminho 2828"
                                            d="M352.808,141.094s-8.67.172-7.741-6.794"
                                            transform="translate(-212.573 -101.391)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2829" data-name="Caminho 2829"
                                            d="M352.1,154.767s-6.172-6.1-.536-10.287"
                                            transform="translate(-212.754 -101.83)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2830" data-name="Caminho 2830"
                                            d="M302.952,125.344s2.766-8.526-6.832-9.684"
                                            transform="translate(-210.467 -100.588)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2831" data-name="Caminho 2831"
                                            d="M285.192,122s-3.569,6.363,3.9,8.823"
                                            transform="translate(-209.959 -100.861)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2832" data-name="Caminho 2832"
                                            d="M296.7,121.274s-8.669.172-7.741-6.794"
                                            transform="translate(-210.155 -100.537)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2833" data-name="Caminho 2833"
                                            d="M295.989,134.947s-6.172-6.086-.536-10.277"
                                            transform="translate(-210.336 -100.976)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2834" data-name="Caminho 2834"
                                            d="M351.892,126.183s2.775-8.526-6.832-9.693"
                                            transform="translate(-212.576 -100.623)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2835" data-name="Caminho 2835"
                                            d="M334.132,122.8s-3.569,6.363,3.9,8.823"
                                            transform="translate(-212.068 -100.895)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2836" data-name="Caminho 2836"
                                            d="M345.648,122.1s-8.67.182-7.741-6.784"
                                            transform="translate(-212.265 -100.573)" fill="none" stroke="#7f7f7f"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2837" data-name="Caminho 2837"
                                            d="M408.7,254.793s-15.31,80.38-17.607,177.266H253.374s15.617-82.227-1.914-189.467C251.489,242.564,322.491,192.03,408.7,254.793Z"
                                            transform="translate(-208.542 -105.228)" fill="#ffc100" />
                                        <g id="Grupo_3934" data-name="Grupo 3934"
                                            transform="translate(42.918 118.106)" clip-path="url(#clip-path-3)">
                                            <path id="Caminho_2838" data-name="Caminho 2838"
                                                d="M405.505,264.33s-17.569,28.334-20.6,55.232a443.558,443.558,0,0,0-3.024,44.764L303.7,343.763s47.262,39.932,72.419,56.63c11.023,7.311,17.282,31.147,17.282,31.147l1.636-34.449-2.057-73.107,18.009-50.563Z"
                                                transform="translate(-253.711 -225.101)" opacity="0.2" />
                                            <path id="Caminho_2839" data-name="Caminho 2839"
                                                d="M336.686,257.112,320.2,244.481,302.793,256.49l-5.273-17.464,16.631-6.517,21.7,2.574,7.273,9.732Z"
                                                transform="translate(-253.445 -223.729)" opacity="0.2" />
                                        </g>
                                        <path id="Caminho_2841" data-name="Caminho 2841"
                                            d="M408.7,254.793s-15.31,80.38-17.607,177.266H253.374s15.617-82.227-1.914-189.467C251.489,242.564,322.491,192.03,408.7,254.793Z"
                                            transform="translate(-208.542 -105.228)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2842" data-name="Caminho 2842"
                                            d="M429.773,325.222s2.124,56.266-17.741,75.758c0,0-23.856,5.454-93.623-47.577,0,0-6.928.6-10.526-3.636,0,0-11.244,3.943-17.138-2.421,0,0-7.56.3-9.253-6.7,0,0-4.784.6-6.469-1.512,0,0-5.741.3-6.555-2.727s5.674-5.474,5.674-5.474.124-6.957,3-9.071a22.964,22.964,0,0,1,5.541-3.033s-19.062-11.483-16.736-17.875,5.521,4.842,23.655,12.727c0,0,9.11.3,10.861,3.636L322.523,335.8s6.449,1.722,8.564,2.431c13.712,4.574,32.937,12.727,55.768,14.239l4.43-36.362S418.97,309.462,429.773,325.222Z"
                                            transform="translate(-209.158 -108.492)" fill="#858585" />
                                        <g id="Grupo_3935" data-name="Grupo 3935"
                                            transform="translate(56.596 190.573)" clip-path="url(#clip-path-4)">
                                            <path id="Caminho_2843" data-name="Caminho 2843"
                                                d="M406.059,316.141l-6.488,37.042-7.292-.268.632-5.148,3.292-27.09,2.651-11.846,5.627,1.206Z"
                                                transform="translate(-271.207 -299.486)" opacity="0.2" />
                                            <path id="Caminho_2844" data-name="Caminho 2844"
                                                d="M428.215,368.912s-6.871,22.439-15.205,30.621c0,0,7.579-11.818-25.75-20.3s-65.3-28.583-65.3-28.583-11.483-9.158-16.669-7.473-3.062,4.3-1.665,3.952,3.33.191,3.445,2.086.182,3.215-2.077,3.416a27.286,27.286,0,0,1,4.421-.957c.957.325,4.66,2.6,5.741,3,1.56.593,3.081-.1,4.852.641,3.2,1.34,6.842,5.856,10.363,7.655,2.019,1.053,23.119,15.932,25.253,17.042,23.521,12.22,31.224,15.483,31.224,15.483l12.44,5.483,9.77,1.914h4.536l6.43-8.775,6-15.569,1.139-6.43Z"
                                                transform="translate(-267.316 -300.957)" opacity="0.2" />
                                            <path id="Caminho_2845" data-name="Caminho 2845"
                                                d="M299.535,352.271a4.277,4.277,0,0,1-1.847-3.6c.23-2.2-4.421,1.014-6.985-2.411,0,0-5.435-.354-8.995-7.062,0,0-5.9,1.033-6.775-1.589,0,0-.431-8.067-1.11-7.732s-2.383,1.483-2.383,1.483l1.7,10.641,9.76,7.99,11.358,4.545h5.273Z"
                                                transform="translate(-265.999 -300.393)" opacity="0.2" />
                                            <path id="Caminho_2846" data-name="Caminho 2846"
                                                d="M280.389,318.987s2.431.249,8.449-2.115c0,0-8.851-2.239-14.593-6.832s-7.072-9.646-8.536-7.493,4.564,8.861,4.564,8.861Z"
                                                transform="translate(-265.743 -299.193)" opacity="0.2" />
                                        </g>
                                        <path id="Caminho_2848" data-name="Caminho 2848"
                                            d="M429.773,325.222s2.124,56.266-17.741,75.758c0,0-23.856,5.454-93.623-47.577,0,0-6.928.6-10.526-3.636,0,0-11.244,3.943-17.138-2.421,0,0-7.56.3-9.253-6.7,0,0-4.784.6-6.469-1.512,0,0-5.741.3-6.555-2.727s5.674-5.474,5.674-5.474.124-6.957,3-9.071a22.964,22.964,0,0,1,5.541-3.033s-19.062-11.483-16.736-17.875,5.521,4.842,23.655,12.727c0,0,9.11.3,10.861,3.636L322.523,335.8s6.449,1.722,8.564,2.431c13.712,4.574,32.937,12.727,55.768,14.239l4.43-36.362S418.97,309.462,429.773,325.222Z"
                                            transform="translate(-209.158 -108.492)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2849" data-name="Caminho 2849"
                                            d="M394.56,355.18c7.741.383,10.947-1.569,17.425,7.158"
                                            transform="translate(-214.709 -110.91)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2850" data-name="Caminho 2850"
                                            d="M294.725,324.66s-11.148,4.785-11.741,7.655a80.192,80.192,0,0,0-.813,9.5"
                                            transform="translate(-209.866 -109.595)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2851" data-name="Caminho 2851"
                                            d="M301.006,331.31a9.483,9.483,0,0,1-3.148,3.751c-3.129,2.306-6.631,2.612-6.7,5.454a76.134,76.134,0,0,0,.613,8.22"
                                            transform="translate(-210.253 -109.881)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <line id="Linha_100" data-name="Linha 100" x2="0.88" y2="8.201"
                                            transform="translate(64.955 222.472)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <line id="Linha_101" data-name="Linha 101" y1="3.139" x2="9.215"
                                            transform="translate(73.5 207.228)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2852" data-name="Caminho 2852"
                                            d="M306.35,342.16a23.921,23.921,0,0,1-5.55,4.009"
                                            transform="translate(-210.669 -110.349)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2853" data-name="Caminho 2853"
                                            d="M249.96,243.43S217.627,256.262,216,313.064a1.474,1.474,0,0,0,2.316,1.244c4.986-3.56,17.885-8.363,39.53,12.727a1.608,1.608,0,0,0,2.727-1.139v-.076c0-6.057-.077-18.564-1.34-33.2C257.9,276.912,255.233,258.74,249.96,243.43Z"
                                            transform="translate(-207.014 -106.094)" fill="#ffc100" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2854" data-name="Caminho 2854"
                                            d="M224.82,306.278c7.56-1.4,21.186-.832,34.87,15.071"
                                            transform="translate(-207.394 -108.781)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2855" data-name="Caminho 2855"
                                            d="M218.5,308.212a19.453,19.453,0,0,1,3.5-1.292"
                                            transform="translate(-207.122 -108.83)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2856" data-name="Caminho 2856"
                                            d="M355.5,227.863s-10.679-16.593-7.722-45.233L304.094,185.5s-.383,37.874-14.354,39.884l11.406,14.593,10.057.746,17.387.077,25.339-8.182Z"
                                            transform="translate(-210.192 -103.474)" fill="#858585" />
                                        <g id="Grupo_3936" data-name="Grupo 3936"
                                            transform="translate(79.548 79.156)" clip-path="url(#clip-path-5)">
                                            <path id="Caminho_2857" data-name="Caminho 2857"
                                                d="M343.586,188.273a73.116,73.116,0,0,1-10.373,2.938,4.172,4.172,0,0,1-3.148,2.871c-4.851,1.072-9.818,1.378-14.7,2.287s-9.569,1.971-14.411,2.172c-5.206.21-10.3-.957-15.31-2.21l-.325-.077c2.23,2.5,4.383,5.014,5.56,8.229.8,2.23.89,4.785,1.914,6.871.5,1.072,1.416,1.837,1.971,2.871a3.828,3.828,0,0,1,2.239,5.3l-.287.679a5.359,5.359,0,0,1-3.024,3.158c2.871,3.493,5.694,5.741,8.172,5.741,8.229,0,24.1-4.909,34.315-15.31,9.732-9.885,9.722-27.6,9.751-29.013C344.973,185.105,344.514,187.938,343.586,188.273Z"
                                                transform="translate(-289.549 -182.723)" fill="#263238"
                                                stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1" />
                                        </g>
                                        <path id="Caminho_2859" data-name="Caminho 2859"
                                            d="M355.5,227.863s-10.679-16.593-7.722-45.233L304.094,185.5s-.383,37.874-14.354,39.884l11.406,14.593,10.057.746,17.387.077,25.339-8.182Z"
                                            transform="translate(-210.192 -103.474)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2860" data-name="Caminho 2860"
                                            d="M346.893,165.682s2.555-10,8.239-8.612,2.048,33.865-10,25.683c0,0,0,16.22-10.229,26.592s-21.549,13.473-29.769,13.473-20.64-24.88-22.707-37.568-1.378-42.037,1.569-45.673,39.3.679,47.376-2.727-1.014,14.545,3.311,18.861,7.5.957,6.593,18.181l3.627-3.407Z"
                                            transform="translate(-209.825 -101.482)" fill="#858585" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2861" data-name="Caminho 2861"
                                            d="M314.9,175.458c0,1.617,1.024,2.928,2.287,2.928s2.287-1.311,2.287-2.928-1.024-2.928-2.287-2.928S314.9,173.841,314.9,175.458Z"
                                            transform="translate(-211.276 -103.039)" fill="#263238" />
                                        <path id="Caminho_2862" data-name="Caminho 2862"
                                            d="M290.06,175.458c0,1.617,1.024,2.928,2.287,2.928s2.287-1.311,2.287-2.928-1.024-2.928-2.287-2.928S290.06,173.841,290.06,175.458Z"
                                            transform="translate(-210.206 -103.039)" fill="#263238" />
                                        <path id="Caminho_2863" data-name="Caminho 2863"
                                            d="M329.5,164.438s-6.823-7.119-17.224,0"
                                            transform="translate(-211.163 -102.553)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                                        <path id="Caminho_2864" data-name="Caminho 2864"
                                            d="M296.324,165.165s-8.488-8.928-12.124-2.344"
                                            transform="translate(-209.953 -102.516)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                                        <path id="Caminho_2865" data-name="Caminho 2865"
                                            d="M324.05,200.58s-20.382,6.8-29.08.957C295,201.585,305.946,220.6,324.05,200.58Z"
                                            transform="translate(-210.417 -104.247)" fill="#fff" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2866" data-name="Caminho 2866"
                                            d="M312.648,185.64s3.3,3,1.215,5.588a3.636,3.636,0,0,1-3.895,1.062,3.464,3.464,0,0,0-3.684.622c-1.818,1.971-6.507,1.521-8.028-.957a7.818,7.818,0,0,0-2.172-.45A2.105,2.105,0,0,1,294,189.812c-.2-1.263.211-2.871,2.708-4.134"
                                            transform="translate(-210.374 -103.603)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2867" data-name="Caminho 2867"
                                            d="M300.35,170.47a31.825,31.825,0,0,1,1.091,11.339"
                                            transform="translate(-210.649 -102.95)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2868" data-name="Caminho 2868"
                                            d="M319.9,200.2s-8.794-2.076-14.067.44a1.914,1.914,0,0,1-1.914-.086c-1.1-.727-3.349-1.646-7.033-.833"
                                            transform="translate(-210.5 -104.196)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2869" data-name="Caminho 2869"
                                            d="M356.491,227.6c-4.019,3.569-18.028,11.2-36.841,15.11l8.507,1.368,10.784,14.545s22.238-12.057,27.262-28.64l-4.985-2.775A4.1,4.1,0,0,0,356.491,227.6Z"
                                            transform="translate(-211.481 -105.37)" fill="#ffc100" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2870" data-name="Caminho 2870"
                                            d="M291.815,226.573c3.359,4.277,8.249,12.325,26.736,16.066l-8.316,1.368-9.655,14.545s-16.267-10.909-17.76-30.458l4.172-2.517A3.732,3.732,0,0,1,291.815,226.573Z"
                                            transform="translate(-209.894 -105.304)" fill="#ffc100" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2871" data-name="Caminho 2871"
                                            d="M321.923,177.25a12.047,12.047,0,0,1-9.693,0"
                                            transform="translate(-211.161 -103.242)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2872" data-name="Caminho 2872"
                                            d="M297.083,177.25a12.048,12.048,0,0,1-9.693,0"
                                            transform="translate(-210.091 -103.242)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2873" data-name="Caminho 2873"
                                            d="M414.924,256.21s24.564,8.918,21.942,69.443a1.1,1.1,0,0,1-1.914.66c-3.674-4.622-13.818-12.851-37.367-7.655a1.378,1.378,0,0,1-1.655-1.493C396.867,308.208,401.738,269.9,414.924,256.21Z"
                                            transform="translate(-214.768 -106.645)" fill="#ffc100" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2874" data-name="Caminho 2874"
                                            d="M399.835,312.9l-1.445.344" transform="translate(-214.874 -109.088)"
                                            fill="none" stroke="#263238" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2875" data-name="Caminho 2875"
                                            d="M411.359,311.56a48.269,48.269,0,0,0-9.8.957"
                                            transform="translate(-215.011 -109.03)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2876" data-name="Caminho 2876"
                                            d="M430.846,316.767A35.837,35.837,0,0,0,413.88,311.6"
                                            transform="translate(-215.542 -109.032)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2877" data-name="Caminho 2877"
                                            d="M436.479,320.76a27.822,27.822,0,0,0-2.919-2.43"
                                            transform="translate(-216.39 -109.322)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2878" data-name="Caminho 2878"
                                            d="M272.667,307.958a1.483,1.483,0,0,1-1.254.574H249.271a3.349,3.349,0,0,1-2.871-2.144L228.994,257.73a1.723,1.723,0,0,1,.086-1.522l1.742-1.914a1.464,1.464,0,0,1,1.244-.565h22.143a3.349,3.349,0,0,1,2.871,2.143l17.358,48.659a1.722,1.722,0,0,1-.086,1.521Z"
                                            transform="translate(-207.568 -106.538)" fill="#fff" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2879" data-name="Caminho 2879"
                                            d="M249.27,308.615h22.143a1.455,1.455,0,0,0,1.378-2.143l-17.358-48.659a3.35,3.35,0,0,0-2.871-2.143H230.39A1.464,1.464,0,0,0,229,257.813l17.358,48.659a3.349,3.349,0,0,0,2.909,2.144Z"
                                            transform="translate(-207.567 -106.621)" fill="#263238" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <path id="Caminho_2880" data-name="Caminho 2880"
                                            d="M250.217,267.11h5.253a1.455,1.455,0,0,0,1.378-2.144l-1.914-5.253a3.349,3.349,0,0,0-2.871-2.144H246.81a1.455,1.455,0,0,0-1.378,2.143l1.866,5.253A3.378,3.378,0,0,0,250.217,267.11Z"
                                            transform="translate(-208.275 -106.703)" fill="#858585"
                                            stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1" />
                                        <path id="Caminho_2881" data-name="Caminho 2881"
                                            d="M246.9,260.183a1.914,1.914,0,0,0,1.694,1.244.852.852,0,0,0,.8-1.244,1.971,1.971,0,0,0-1.694-1.253.852.852,0,0,0-.8,1.253Z"
                                            transform="translate(-208.341 -106.762)" />
                                        <path id="Caminho_2882" data-name="Caminho 2882"
                                            d="M252.546,262.494a1.971,1.971,0,0,0,1.694,1.254.852.852,0,0,0,.8-1.254,1.914,1.914,0,0,0-1.694-1.244.852.852,0,0,0-.8,1.244Z"
                                            transform="translate(-208.585 -106.862)" />
                                        <path id="Caminho_2883" data-name="Caminho 2883"
                                            d="M248.545,264.813a1.914,1.914,0,0,0,1.694,1.244.852.852,0,0,0,.8-1.244,1.971,1.971,0,0,0-1.694-1.254.852.852,0,0,0-.8,1.254Z"
                                            transform="translate(-208.412 -106.961)" />
                                        <path id="Caminho_2884" data-name="Caminho 2884"
                                            d="M228.8,314.221s-21.923,40.793-21.253,56.964,10.832,21.588,10.832,21.588,27.406-1.359,27.855-33.865l3.7-31.578s9.569-3.254,13.4-9.923c0,0,9.569-3.253,12.574-8.708s4.785-12.507,1.77-13.636-5.12,8.8-7.741,10.679c-1.751,1.254-4.555,2.871-6.21,3.828a1.445,1.445,0,0,1-1.99-.737h0a1.3,1.3,0,0,1,.392-1.6,29.331,29.331,0,0,0,6-5.741c2.871-3.828,10.995-15,6.957-17.5s-10.65,9.684-13.272,11.7c-1.6,1.263-3.828,2.708-5.234,3.627A2.4,2.4,0,0,1,253.71,299l-.163-.144a2.421,2.421,0,0,1-.612-2.871,40.458,40.458,0,0,1,2.526-4.641c1.742-2.306,4.067-4.526,7.655-8.67,3.741-4.287,7.062-7.32,4.536-9.292-4.966-3.828-17.818,10.689-19.511,12.507a18.858,18.858,0,0,0-2.66,4.363,1.387,1.387,0,0,1-1.914.584h0a1.589,1.589,0,0,1-.833-1.244c-.153-1.809-.45-6.009-.057-7.569.565-2.258,2.172-3.828,4.5-8,2.048-3.627,4.421-7.454,2.718-9.043-3.646-3.416-10.88,7.043-10.88,7.043l-5.2,9.359s2.163-4.785-.5-7.052-2.507,2.957-4.784,5.684-.1,8.411-.718,12.5a53.031,53.031,0,0,0-.632,7.273Z"
                                            transform="translate(-206.649 -106.993)" fill="#858585" />
                                        <g id="Grupo_3937" data-name="Grupo 3937"
                                            transform="translate(0.885 157.3)" clip-path="url(#clip-path-6)">
                                            <path id="Caminho_2885" data-name="Caminho 2885"
                                                d="M259.061,317.255a44.87,44.87,0,0,1-8.115-7.914c-2.718-3.55-4.536-8.315-7.942-8.315s-6.229-4.593-9.933-1.914.957,14.832,0,19.75,5,87.193-22.841,65.022a22.009,22.009,0,0,0,1.914,4.784,1.562,1.562,0,0,0,.105.163c.22.277.44.555.6.794h0l.115.287a14.057,14.057,0,0,0,5.741,4.421c.392,0,.813-.048,1.254-.048l.44-.191,1.091-.392A5.1,5.1,0,0,1,224,392.688l.852-.134a26.048,26.048,0,0,1,3.655-.861c.325-.105.651-.23.957-.354a46.083,46.083,0,0,0,10.9-8.976,28.5,28.5,0,0,1,2.823-5.923c.957-1.627,1.914-3.081,1.837-5a4.373,4.373,0,0,1,.957-3.081c.411-5.607.565-11.062,1.474-16.66,1-6.115,2.143-12.143,2.124-18.373a5.228,5.228,0,0,1,.057-.785,5.034,5.034,0,0,1,.115-1.914,5.186,5.186,0,0,1,2.191-2.871c.861-.622,1.856-1.043,2.708-1.665a3.568,3.568,0,0,1,1.455-.574C257.654,323.762,261.367,319.159,259.061,317.255Z"
                                                transform="translate(-207.65 -265.758)" opacity="0.2" />
                                            <path id="Caminho_2886" data-name="Caminho 2886"
                                                d="M268.934,300.351a12.091,12.091,0,0,1-1.914-1.914,1.282,1.282,0,0,0-2.048,0,18.011,18.011,0,0,1-5.493,5.3s2.048,4.545,4.1,3.636c1.464-.651,4.153-3.579,5.56-5.186a1.273,1.273,0,0,0-.2-1.837Z"
                                                transform="translate(-209.773 -265.743)" opacity="0.2" />
                                            <path id="Caminho_2887" data-name="Caminho 2887"
                                                d="M255.195,290.7a8.765,8.765,0,0,1-3.474-2.23.718.718,0,0,0-1.177.134l-2.344,4.488a8.49,8.49,0,0,0,4.086,3.292,35.861,35.861,0,0,1,3.177-4.536.718.718,0,0,0-.268-1.148Z"
                                                transform="translate(-209.287 -265.325)" opacity="0.2" />
                                            <path id="Caminho_2888" data-name="Caminho 2888"
                                                d="M242.924,281.67s-2.775,3.636-5.454,2.612v6.478l5.454-.335A19.99,19.99,0,0,1,242.924,281.67Z"
                                                transform="translate(-208.824 -265.042)" opacity="0.2" />
                                            <path id="Caminho_2889" data-name="Caminho 2889"
                                                d="M275.739,312.43a27.955,27.955,0,0,1-7.99,2.1,1.569,1.569,0,0,0-1.512,1.186l-.517,2.153S270.055,317.31,275.739,312.43Z"
                                                transform="translate(-210.042 -266.368)" opacity="0.2" />
                                            <path id="Caminho_2890" data-name="Caminho 2890"
                                                d="M235.3,280.53s-1.636,3.483-3.569,4.842.23,2.316,0,5.474C231.734,290.845,234.671,282.961,235.3,280.53Z"
                                                transform="translate(-208.542 -264.993)" opacity="0.2" />
                                        </g>
                                        <path id="Caminho_2892" data-name="Caminho 2892"
                                            d="M228.8,314.221s-21.923,40.793-21.253,56.964,10.832,21.588,10.832,21.588,27.406-1.359,27.855-33.865l3.7-31.578s9.569-3.254,13.4-9.923c0,0,9.569-3.253,12.574-8.708s4.785-12.507,1.77-13.636-5.12,8.8-7.741,10.679c-1.751,1.254-4.555,2.871-6.21,3.828a1.445,1.445,0,0,1-1.99-.737h0a1.3,1.3,0,0,1,.392-1.6,29.331,29.331,0,0,0,6-5.741c2.871-3.828,10.995-15,6.957-17.5s-10.65,9.684-13.272,11.7c-1.6,1.263-3.828,2.708-5.234,3.627A2.4,2.4,0,0,1,253.71,299l-.163-.144a2.421,2.421,0,0,1-.612-2.871,40.458,40.458,0,0,1,2.526-4.641c1.742-2.306,4.067-4.526,7.655-8.67,3.741-4.287,7.062-7.32,4.536-9.292-4.966-3.828-17.818,10.689-19.511,12.507a18.858,18.858,0,0,0-2.66,4.363,1.387,1.387,0,0,1-1.914.584h0a1.589,1.589,0,0,1-.833-1.244c-.153-1.809-.45-6.009-.057-7.569.565-2.258,2.172-3.828,4.5-8,2.048-3.627,4.421-7.454,2.718-9.043-3.646-3.416-10.88,7.043-10.88,7.043l-5.2,9.359s2.163-4.785-.5-7.052-2.507,2.957-4.784,5.684-.1,8.411-.718,12.5a53.031,53.031,0,0,0-.632,7.273Z"
                                            transform="translate(-206.649 -106.993)" fill="none"
                                            stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1" />
                                        <path id="Caminho_2893" data-name="Caminho 2893"
                                            d="M234.49,283.33s-2.651,9.091-4.21,9.569"
                                            transform="translate(-207.629 -107.814)" fill="none"
                                            stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1" />
                                        <path id="Caminho_2894" data-name="Caminho 2894"
                                            d="M373.52,426.3c1.253.163,2.507.316,3.828.459"
                                            transform="translate(-213.803 -113.975)" fill="none"
                                            stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1" />
                                        <path id="Caminho_2895" data-name="Caminho 2895"
                                            d="M315.71,415.52c12.535,3.445,28.985,6.842,50.544,9.7"
                                            transform="translate(-211.311 -113.51)" fill="none"
                                            stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1" />
                                        <path id="Caminho_2896" data-name="Caminho 2896"
                                            d="M278.92,399.74c4.459,3.493,13.339,8.612,30.621,13.8"
                                            transform="translate(-209.726 -112.83)" fill="none"
                                            stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1" />
                                        <path id="Caminho_2897" data-name="Caminho 2897"
                                            d="M274.49,395.12a9.978,9.978,0,0,0,1.981,2.45"
                                            transform="translate(-209.535 -112.631)" fill="none"
                                            stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1" />
                                        <path id="Caminho_2898" data-name="Caminho 2898"
                                            d="M324.347,248.2l-1.627,46.544h0a8.162,8.162,0,0,1-8.21-8.507l1.33-38.037"
                                            transform="translate(-211.259 -106.3)" fill="none" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2899" data-name="Caminho 2899"
                                            d="M322.9,252.541a2.871,2.871,0,1,1-2.871-2.871A2.871,2.871,0,0,1,322.9,252.541Z"
                                            transform="translate(-211.374 -106.363)" fill="#ffc100"
                                            stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="0.75" />
                                        <ellipse id="Elipse_322" data-name="Elipse 322" cx="2.871"
                                            cy="2.871" rx="2.871" ry="2.871"
                                            transform="translate(104.542 174.607)" fill="#ffc100" stroke="#263238"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                        <path id="Caminho_2900" data-name="Caminho 2900"
                                            d="M324.09,198.92a8.832,8.832,0,0,0,3.186,2.785"
                                            transform="translate(-211.672 -104.176)" fill="#858585"
                                            stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="0.75" />
                                        <path id="Caminho_2901" data-name="Caminho 2901"
                                            d="M298.16,205.55s1.359,1.665,4.947,1.789"
                                            transform="translate(-210.555 -104.462)" fill="none"
                                            stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="0.75" />
                                        <path id="Caminho_2902" data-name="Caminho 2902"
                                            d="M325.03,200.58a39.347,39.347,0,0,1-7.32,4.584"
                                            transform="translate(-211.397 -104.247)" fill="#858585"
                                            stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="0.75" />
                                        <path id="Caminho_2903" data-name="Caminho 2903"
                                            d="M296.17,205.727s3.158,10.526,13.138,9.282,13.578-10.9,13.578-10.9"
                                            transform="translate(-210.469 -104.399)" fill="none"
                                            stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="0.75" />
                                    </g>
                                </g>
                                <text id="Pessoa_física" data-name="Pessoa física"
                                    transform="translate(511.433 879)" fill="#4a5860" font-size="28"
                                    font-family="Montserrat-Medium, Montserrat" font-weight="500"
                                    letter-spacing="-0.015em">
                                    <tspan x="0" y="0">Pessoa física</tspan>
                                </text>
                            </g>
                        </svg>
                    @else
                        <svg class="max-w-full" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="489.258" height="467"
                            viewBox="0 0 489.258 467">
                            <defs>
                                <clipPath id="clip-path">
                                    <path id="Caminho_2711" data-name="Caminho 2711"
                                        d="M430.7,287.8l-7.922-5.047-29.206-72.143L342.914,186.56H232.05l50.663,24.055,29.206,72.143,7.922,5.047H419.953l7.657,4.862Z"
                                        transform="translate(-232.05 -186.56)" fill="#263238" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                </clipPath>
                            </defs>
                            <g id="Country_side-bro" data-name="Country side-bro" transform="translate(0)">
                                <g id="freepik--background-simple--inject-6" transform="translate(2.089 0)"
                                    opacity="0.399">
                                    <path id="Caminho_2626" data-name="Caminho 2626"
                                        d="M514.974,365.112c10.2-80.538-39.264-187.568-90.458-231.764-92.491-79.8-169.333-64.371-229.108-35.8S127.157,221.566,85.883,264.734s-64.74,101.233-2.125,159.044,113.174,28.432,178.584,24.76,152.265,25.2,199.221.1C494.36,431.122,510.5,400.75,514.974,365.112Z"
                                        transform="translate(-45.286 -74.441)" fill="#d7d8e4" />
                                    <path id="Caminho_2627" data-name="Caminho 2627"
                                        d="M514.974,365.112c10.2-80.538-39.264-187.568-90.458-231.764-92.491-79.8-169.333-64.371-229.108-35.8S127.157,221.566,85.883,264.734s-64.74,101.233-2.125,159.044,113.174,28.432,178.584,24.76,152.265,25.2,199.221.1C494.36,431.122,510.5,400.75,514.974,365.112Z"
                                        transform="translate(-45.286 -74.441)" fill="#d7d8e4" opacity="0.8" />
                                </g>
                                <g id="freepik--Floor--inject-6" transform="translate(7.914 304.251)"
                                    opacity="0.297">
                                    <path id="Caminho_2628" data-name="Caminho 2628"
                                        d="M50.33,337.923c5.832,14.851,16.306,29.968,32.647,45.039,62.615,57.8,113.174,28.432,178.584,24.76s152.265,25.2,199.221.1c28.524-15.244,44.461-40.246,51.09-69.925Z"
                                        transform="translate(-50.33 -337.9)" fill="#80828b" />
                                    <path id="Caminho_2629" data-name="Caminho 2629"
                                        d="M50.33,337.923c5.832,14.851,16.306,29.968,32.647,45.039,62.615,57.8,113.174,28.432,178.584,24.76s152.265,25.2,199.221.1c28.524-15.244,44.461-40.246,51.09-69.925Z"
                                        transform="translate(-50.33 -337.9)" fill="#80828b" opacity="0.5" />
                                </g>
                                <g id="freepik--Clouds--inject-6" transform="translate(30.237 32.383)"
                                    opacity="0.538">
                                    <path id="Caminho_2630" data-name="Caminho 2630"
                                        d="M233.624,175.431c-7.356-4.019-10.705-.67-13.385-4.019s7.368-12.045-12.7-20.787c0,0-1.34-18.743-28.779-19.413s-20.071,18.743-27.439,23.42-9.366-2.668-16.722,2.009-4.019,14.054-10.047,15.394-14.054-6.017-21.411-1.34-7.379,8.777-10.717,8.777-10.047-2.679-14.054,0-8.707,6.017-8.707,6.017H238.982S240.968,179.473,233.624,175.431Z"
                                        transform="translate(-69.66 -98.037)" fill="#80828b" />
                                    <path id="Caminho_2631" data-name="Caminho 2631"
                                        d="M288.769,124.618c-3.684-2.009-5.358-.335-6.7-2.009s3.684-6.04-6.375-10.394c0,0-.67-9.389-14.412-9.724s-10.047,9.389-13.731,11.733-4.7-1.34-8.384,1-2.009,7.045-5.024,7.714-7.044-3.026-10.728-.67-3.684,4.354-5.358,4.354-5.024-1.34-7.044,0-4.354,3.014-4.354,3.014h84.788S292.51,126.627,288.769,124.618Z"
                                        transform="translate(-48.448 -102.483)" fill="#80828b" />
                                    <path id="Caminho_2632" data-name="Caminho 2632"
                                        d="M358.769,159.618c-3.684-2.009-5.358-.335-6.7-2.009s3.684-6.04-6.375-10.394c0,0-.67-9.389-14.412-9.724s-10.047,9.389-13.731,11.733-4.7-1.34-8.384,1-2.009,7.045-5.024,7.714-7.044-3.026-10.728-.67-3.684,4.354-5.358,4.354-5.024-1.34-7.044,0-4.354,3.014-4.354,3.014h84.788S362.51,161.627,358.769,159.618Z"
                                        transform="translate(-37.609 -97.063)" fill="#80828b" />
                                    <g id="Grupo_3929" data-name="Grupo 3929" opacity="0.6">
                                        <path id="Caminho_2633" data-name="Caminho 2633"
                                            d="M233.624,175.431c-7.356-4.019-10.705-.67-13.385-4.019s7.368-12.045-12.7-20.787c0,0-1.34-18.743-28.779-19.413s-20.071,18.743-27.439,23.42-9.366-2.668-16.722,2.009-4.019,14.054-10.047,15.394-14.054-6.017-21.411-1.34-7.379,8.777-10.717,8.777-10.047-2.679-14.054,0-8.707,6.017-8.707,6.017H238.982S240.968,179.473,233.624,175.431Z"
                                            transform="translate(-69.66 -98.037)" fill="#80828b" />
                                        <path id="Caminho_2634" data-name="Caminho 2634"
                                            d="M288.769,124.618c-3.684-2.009-5.358-.335-6.7-2.009s3.684-6.04-6.375-10.394c0,0-.67-9.389-14.412-9.724s-10.047,9.389-13.731,11.733-4.7-1.34-8.384,1-2.009,7.045-5.024,7.714-7.044-3.026-10.728-.67-3.684,4.354-5.358,4.354-5.024-1.34-7.044,0-4.354,3.014-4.354,3.014h84.788S292.51,126.627,288.769,124.618Z"
                                            transform="translate(-48.448 -102.483)" fill="#80828b" />
                                        <path id="Caminho_2635" data-name="Caminho 2635"
                                            d="M358.769,159.618c-3.684-2.009-5.358-.335-6.7-2.009s3.684-6.04-6.375-10.394c0,0-.67-9.389-14.412-9.724s-10.047,9.389-13.731,11.733-4.7-1.34-8.384,1-2.009,7.045-5.024,7.714-7.044-3.026-10.728-.67-3.684,4.354-5.358,4.354-5.024-1.34-7.044,0-4.354,3.014-4.354,3.014h84.788S362.51,161.627,358.769,159.618Z"
                                            transform="translate(-37.609 -97.063)" fill="#80828b" />
                                    </g>
                                </g>
                                <g id="freepik--Trees--inject-6" transform="translate(0 190.098)">
                                    <path id="Caminho_2636" data-name="Caminho 2636"
                                        d="M50.733,316.857s16.641,1.651,25.071,11.964c0,0,8.9-11.953,24.9-11.7a32.335,32.335,0,1,0-49.97-.231Z"
                                        transform="translate(-43.477 -235.166)" fill="#ffc100" />
                                    <path id="Caminho_2637" data-name="Caminho 2637"
                                        d="M50.733,316.857s16.641,1.651,25.071,11.964c0,0,8.9-11.953,24.9-11.7a32.335,32.335,0,1,0-49.97-.231Z"
                                        transform="translate(-43.477 -235.166)" fill="#fff" opacity="0.3" />
                                    <path id="Caminho_2638" data-name="Caminho 2638"
                                        d="M71.066,266.13,70.5,349.509h2.818Z"
                                        transform="translate(-39.293 -234.859)" fill="#263238" />
                                    <path id="Caminho_2639" data-name="Caminho 2639"
                                        d="M71.757,319.2S77.37,309.083,87.486,306c0,0-10.671,2.529-16.006,11.225Z"
                                        transform="translate(-39.141 -228.685)" fill="#263238" />
                                    <path id="Caminho_2640" data-name="Caminho 2640"
                                        d="M71.757,294.4s5.613-10.1,15.729-13.2c0,0-10.671,2.529-16.006,11.237Z"
                                        transform="translate(-39.141 -232.525)" fill="#263238" />
                                    <path id="Caminho_2641" data-name="Caminho 2641"
                                        d="M71.757,306.77s5.613-10.116,15.729-13.2c0,0-10.671,2.529-16.006,11.225Z"
                                        transform="translate(-39.141 -230.61)" fill="#263238" />
                                    <path id="Caminho_2642" data-name="Caminho 2642"
                                        d="M73.035,300.77s-5.416-10.1-15.175-13.2c0,0,10.3,2.529,15.44,11.237Z"
                                        transform="translate(-41.25 -231.539)" fill="#263238" />
                                    <path id="Caminho_2643" data-name="Caminho 2643"
                                        d="M73.035,312.868s-5.416-10.1-15.175-13.188c0,0,10.3,2.529,15.44,11.225Z"
                                        transform="translate(-41.25 -229.664)" fill="#263238" />
                                    <path id="Caminho_2644" data-name="Caminho 2644"
                                        d="M95.589,312.739s19.817,1.963,29.876,14.251c0,0,10.613-14.239,29.679-13.95a38.525,38.525,0,1,0-59.566-.266Z"
                                        transform="translate(-36.747 -237.365)" fill="#ffc100" />
                                    <path id="Caminho_2645" data-name="Caminho 2645"
                                        d="M95.589,312.739s19.817,1.963,29.876,14.251c0,0,10.613-14.239,29.679-13.95a38.525,38.525,0,1,0-59.566-.266Z"
                                        transform="translate(-36.747 -237.365)" fill="#fff" opacity="0.5" />
                                    <path id="Caminho_2646" data-name="Caminho 2646"
                                        d="M119.82,252.28l-.67,99.374H122.5Z" transform="translate(-31.76 -237.003)"
                                        fill="#263238" />
                                    <path id="Caminho_2647" data-name="Caminho 2647"
                                        d="M120.645,315.529s6.687-12.045,18.731-15.729c0,0-12.7,3.014-19.066,13.385Z"
                                        transform="translate(-31.58 -229.645)" fill="#263238" />
                                    <path id="Caminho_2648" data-name="Caminho 2648"
                                        d="M120.645,285.969s6.687-12.045,18.731-15.729c0,0-12.7,3.014-19.066,13.385Z"
                                        transform="translate(-31.58 -234.222)" fill="#263238" />
                                    <path id="Caminho_2649" data-name="Caminho 2649"
                                        d="M120.645,300.749s6.687-12.045,18.731-15.729c0,0-12.7,3.014-19.066,13.384Z"
                                        transform="translate(-31.58 -231.934)" fill="#263238" />
                                    <path id="Caminho_2650" data-name="Caminho 2650"
                                        d="M122.165,293.509s-6.456-12.045-18.085-15.729c0,0,12.276,3.014,18.408,13.385Z"
                                        transform="translate(-34.093 -233.055)" fill="#263238" />
                                    <path id="Caminho_2651" data-name="Caminho 2651"
                                        d="M122.165,307.989s-6.456-12.045-18.085-15.729c0,0,12.276,3.014,18.408,13.385Z"
                                        transform="translate(-34.093 -230.813)" fill="#263238" />
                                    <path id="Caminho_2652" data-name="Caminho 2652"
                                        d="M141.341,320.222s14.043,1.386,21.145,10.082A27.2,27.2,0,0,1,183.5,320.43a27.277,27.277,0,1,0-42.163-.185Z"
                                        transform="translate(-29.272 -233.369)" fill="#ffc100" />
                                    <path id="Caminho_2653" data-name="Caminho 2653"
                                        d="M141.341,320.222s14.043,1.386,21.145,10.082A27.2,27.2,0,0,1,183.5,320.43a27.277,27.277,0,1,0-42.163-.185Z"
                                        transform="translate(-29.272 -233.369)" fill="#fff" opacity="0.5" />
                                    <path id="Caminho_2654" data-name="Caminho 2654"
                                        d="M158.493,277.42l-.473,70.341h2.367Z"
                                        transform="translate(-25.741 -233.111)" fill="#263238" />
                                    <path id="Caminho_2655" data-name="Caminho 2655"
                                        d="M159.083,322.193s4.735-8.534,13.258-11.133c0,0-9,2.125-13.5,9.47Z"
                                        transform="translate(-25.615 -227.902)" fill="#263238" />
                                    <path id="Caminho_2656" data-name="Caminho 2656"
                                        d="M159.083,301.273s4.735-8.534,13.258-11.133c0,0-9,2.125-13.5,9.47Z"
                                        transform="translate(-25.615 -231.141)" fill="#263238" />
                                    <path id="Caminho_2657" data-name="Caminho 2657"
                                        d="M159.083,311.733s4.735-8.534,13.258-11.133c0,0-9,2.125-13.5,9.47Z"
                                        transform="translate(-25.615 -229.521)" fill="#263238" />
                                    <path id="Caminho_2658" data-name="Caminho 2658"
                                        d="M160.156,306.6s-4.619-8.523-12.8-11.133c0,0,8.684,2.136,13.027,9.47Z"
                                        transform="translate(-27.392 -230.316)" fill="#263238" />
                                    <path id="Caminho_2659" data-name="Caminho 2659"
                                        d="M160.156,316.853s-4.619-8.523-12.8-11.133c0,0,8.684,2.136,13.027,9.481Z"
                                        transform="translate(-27.392 -228.729)" fill="#263238" />
                                    <path id="Caminho_2660" data-name="Caminho 2660"
                                        d="M373.043,316.857s16.63,1.651,25.06,11.964c0,0,8.915-11.953,24.91-11.7a32.335,32.335,0,1,0-49.97-.231Z"
                                        transform="translate(6.428 -235.166)" fill="#ffc100" />
                                    <path id="Caminho_2661" data-name="Caminho 2661"
                                        d="M373.043,316.857s16.63,1.651,25.06,11.964c0,0,8.915-11.953,24.91-11.7a32.335,32.335,0,1,0-49.97-.231Z"
                                        transform="translate(6.428 -235.166)" fill="#fff" opacity="0.3" />
                                    <path id="Caminho_2662" data-name="Caminho 2662"
                                        d="M393.376,266.13l-.566,83.379h2.806Z"
                                        transform="translate(10.612 -234.859)" fill="#263238" />
                                    <path id="Caminho_2663" data-name="Caminho 2663"
                                        d="M394.039,319.2s5.612-10.116,15.717-13.2c0,0-10.671,2.529-16.006,11.225Z"
                                        transform="translate(10.758 -228.685)" fill="#263238" />
                                    <path id="Caminho_2664" data-name="Caminho 2664"
                                        d="M394.039,294.4s5.612-10.1,15.717-13.2c0,0-10.671,2.529-16.006,11.237Z"
                                        transform="translate(10.758 -232.525)" fill="#263238" />
                                    <path id="Caminho_2665" data-name="Caminho 2665"
                                        d="M394.039,306.77s5.612-10.116,15.717-13.2c0,0-10.671,2.529-16.006,11.225Z"
                                        transform="translate(10.758 -230.61)" fill="#263238" />
                                    <path id="Caminho_2666" data-name="Caminho 2666"
                                        d="M395.345,300.77s-5.428-10.1-15.175-13.2c0,0,10.29,2.529,15.44,11.237Z"
                                        transform="translate(8.655 -231.539)" fill="#263238" />
                                    <path id="Caminho_2667" data-name="Caminho 2667"
                                        d="M395.345,312.868s-5.428-10.1-15.175-13.188c0,0,10.29,2.529,15.44,11.225Z"
                                        transform="translate(8.655 -229.664)" fill="#263238" />
                                    <path id="Caminho_2668" data-name="Caminho 2668"
                                        d="M401.907,309.564s22.277,2.183,33.56,16.041c0,0,11.929-15.994,33.352-15.671a43.295,43.295,0,1,0-66.98-.3Z"
                                        transform="translate(10.511 -239.051)" fill="#ffc100" />
                                    <path id="Caminho_2669" data-name="Caminho 2669"
                                        d="M401.907,309.564s22.277,2.183,33.56,16.041c0,0,11.929-15.994,33.352-15.671a43.295,43.295,0,1,0-66.98-.3Z"
                                        transform="translate(10.511 -239.051)" fill="#fff" opacity="0.5" />
                                    <path id="Caminho_2670" data-name="Caminho 2670"
                                        d="M429.121,241.64,428.37,353.3h3.765Z"
                                        transform="translate(16.118 -238.651)" fill="#263238" />
                                    <path id="Caminho_2671" data-name="Caminho 2671"
                                        d="M430.051,312.711s7.518-13.535,21.053-17.681c0,0-14.285,3.384-21.434,15.013Z"
                                        transform="translate(16.32 -230.384)" fill="#263238" />
                                    <path id="Caminho_2672" data-name="Caminho 2672"
                                        d="M430.051,279.5s7.518-13.535,21.053-17.669c0,0-14.285,3.384-21.434,15.013Z"
                                        transform="translate(16.32 -235.524)" fill="#263238" />
                                    <path id="Caminho_2673" data-name="Caminho 2673"
                                        d="M430.051,296.1s7.518-13.535,21.053-17.669c0,0-14.285,3.384-21.434,15.013Z"
                                        transform="translate(16.32 -232.954)" fill="#263238" />
                                    <path id="Caminho_2674" data-name="Caminho 2674"
                                        d="M431.724,287.959s-7.252-13.535-20.314-17.669c0,0,13.789,3.384,20.683,15.013Z"
                                        transform="translate(13.492 -234.214)" fill="#263238" />
                                    <path id="Caminho_2675" data-name="Caminho 2675"
                                        d="M431.724,304.239S424.471,290.7,411.41,286.57c0,0,13.789,3.384,20.683,15.013Z"
                                        transform="translate(13.492 -231.694)" fill="#263238" />
                                </g>
                                <g id="freepik--Windmill--inject-6" transform="translate(369.1 33.373)">
                                    <path id="Caminho_2676" data-name="Caminho 2676"
                                        d="M408.33,146.5l35.419,5.543V124.33l-35.419,5.543Z"
                                        transform="translate(-356.085 -100.09)" fill="#263238" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2677" data-name="Caminho 2677"
                                        d="M395.719,134.03,383.79,369.963h23.859Z"
                                        transform="translate(-359.885 -98.588)" fill="none" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <line id="Linha_95" data-name="Linha 95" y1="15.001"
                                        transform="translate(36.077 20.799)" fill="none" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <line id="Linha_96" data-name="Linha 96" x2="25.591"
                                        transform="translate(23.108 36.019)" fill="none" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2678" data-name="Caminho 2678"
                                        d="M401.061,247.768H388.67l9.193-56.818h-5.994Z"
                                        transform="translate(-359.129 -89.775)" fill="none" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2679" data-name="Caminho 2679"
                                        d="M388.6,130.9l-.924,5.243-24.482-2.518,1.536-8.731Z"
                                        transform="translate(-363.074 -100.003)" fill="#ffc100" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2680" data-name="Caminho 2680"
                                        d="M387.572,133.48l.924,5.231-23.87,6.017L363.09,136Z"
                                        transform="translate(-363.09 -98.673)" fill="#263238" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2681" data-name="Caminho 2681"
                                        d="M387.57,136.96l2.656,4.608L369.855,155.38l-4.435-7.68Z"
                                        transform="translate(-362.729 -98.134)" fill="#ffc100" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2682" data-name="Caminho 2682"
                                        d="M388.378,140.14l4.077,3.418L378.03,163.5l-6.79-5.7Z"
                                        transform="translate(-361.828 -97.642)" fill="#263238" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2683" data-name="Caminho 2683"
                                        d="M389.909,142.61l5,1.825-6.733,23.674-8.326-3.037Z"
                                        transform="translate(-360.495 -97.26)" fill="#ffc100" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2684" data-name="Caminho 2684"
                                        d="M391.978,144.09h5.312l1.778,24.54H390.2Z"
                                        transform="translate(-358.892 -97.03)" fill="#263238" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2685" data-name="Caminho 2685"
                                        d="M395.22,144.635l5-1.825,10.059,22.462-8.326,3.037Z"
                                        transform="translate(-358.115 -97.229)" fill="#ffc100" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2686" data-name="Caminho 2686"
                                        d="M398.61,143.938l4.065-3.418,17.138,17.657-6.79,5.7Z"
                                        transform="translate(-357.59 -97.583)" fill="#263238" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2687" data-name="Caminho 2687"
                                        d="M401.47,142.076l2.656-4.6,22.15,10.74-4.435,7.668Z"
                                        transform="translate(-357.147 -98.054)" fill="#ffc100" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2688" data-name="Caminho 2688"
                                        d="M403.48,139.291l.924-5.231,24.483,2.518-1.547,8.731Z"
                                        transform="translate(-356.836 -98.583)" fill="#263238" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2689" data-name="Caminho 2689"
                                        d="M404.5,136.718l-.924-5.243,23.871-6.005,1.536,8.731Z"
                                        transform="translate(-356.821 -99.913)" fill="#ffc100" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2690" data-name="Caminho 2690"
                                        d="M404.426,134.188l-2.656-4.608,20.371-13.8,4.435,7.668Z"
                                        transform="translate(-357.101 -101.414)" fill="#263238" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2691" data-name="Caminho 2691"
                                        d="M403.137,131.682l-4.077-3.418,14.424-19.944,6.79,5.693Z"
                                        transform="translate(-357.521 -102.569)" fill="#ffc100" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2692" data-name="Caminho 2692"
                                        d="M400.78,129.5l-5-1.825L402.513,104l8.326,3.037Z"
                                        transform="translate(-358.028 -103.238)" fill="#263238" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2693" data-name="Caminho 2693"
                                        d="M390.516,129.072l-2.656,4.608-22.15-10.74,4.435-7.68Z"
                                        transform="translate(-362.684 -101.494)" fill="#263238" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2694" data-name="Caminho 2694"
                                        d="M392.9,127.884l-4.077,3.418L371.69,113.633l6.79-5.693Z"
                                        transform="translate(-361.758 -102.628)" fill="#ffc100" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2695" data-name="Caminho 2695"
                                        d="M395.459,127.474l-5,1.813L380.4,106.826l8.338-3.026Z"
                                        transform="translate(-360.41 -103.269)" fill="#263238" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2696" data-name="Caminho 2696"
                                        d="M397.881,127.892h-5.312L390.79,103.34h8.869Z"
                                        transform="translate(-358.801 -103.34)" fill="#ffc100" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2697" data-name="Caminho 2697"
                                        d="M397.824,134.752a3.072,3.072,0,1,0-3.072,3.072,3.072,3.072,0,0,0,3.072-3.072Z"
                                        transform="translate(-358.663 -98.952)" fill="#263238" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                </g>
                                <g id="freepik--Farm--inject-6" transform="translate(132.174 129.479)">
                                    <rect id="Retângulo_2590" data-name="Retângulo 2590" width="114.329"
                                        height="76.797" transform="translate(160.603 98.473)" fill="#263238"
                                        stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1" />
                                    <path id="Caminho_2698" data-name="Caminho 2698"
                                        d="M319.87,361.4H166.67V284.419l28.247-72.154,47.2-22.935,48.653,23.1,29.1,71.992Z"
                                        transform="translate(-156.577 -186.131)" fill="#ffc100" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2699" data-name="Caminho 2699"
                                        d="M161.325,293.336l-3.4-4.666,8-5.82,28.386-72.374,49.208-23.917,50.663,24.055,29.206,72.143,7.922,5.047-3.095,4.862-9.019-5.74-.346-.543-28.663-71.276-46.632-22.138-45.189,21.953-28.12,71.912Z"
                                        transform="translate(-157.93 -186.56)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <rect id="Retângulo_2591" data-name="Retângulo 2591" width="25.406"
                                        height="64.867" transform="translate(73.99 31.689)" fill="#ffc100"
                                        stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1" />
                                    <rect id="Retângulo_2592" data-name="Retângulo 2592" width="53.122"
                                        height="69.486" transform="translate(60.132 105.795)" fill="#fff"
                                        stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1" />
                                    <rect id="Retângulo_2593" data-name="Retângulo 2593" width="86.994"
                                        height="4.619" transform="translate(43.191 94.246)" fill="#ffc100"
                                        stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1" />
                                    <rect id="Retângulo_2594" data-name="Retângulo 2594" width="86.994"
                                        height="4.619" transform="translate(43.191 27.069)" fill="#ffc100"
                                        stroke="#263238" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1" />
                                    <path id="Caminho_2700" data-name="Caminho 2700"
                                        d="M221.462,313.29,212.5,286.96v52.661Z"
                                        transform="translate(-149.481 -171.015)" fill="#263238" />
                                    <path id="Caminho_2701" data-name="Caminho 2701"
                                        d="M231.615,283.5H213.68l8.962,26.33Z"
                                        transform="translate(-149.298 -171.55)" fill="#263238" />
                                    <path id="Caminho_2702" data-name="Caminho 2702"
                                        d="M222.642,313.23l-8.962,26.319h17.935Z"
                                        transform="translate(-149.298 -166.947)" fill="#263238" />
                                    <path id="Caminho_2703" data-name="Caminho 2703"
                                        d="M222.63,313.29l8.962,26.33V286.96Z"
                                        transform="translate(-147.912 -171.015)" fill="#263238" />
                                    <path id="Caminho_2704" data-name="Caminho 2704"
                                        d="M254.6,283.5H236.67l8.962,26.33Z" transform="translate(-145.738 -171.55)"
                                        fill="#263238" />
                                    <path id="Caminho_2705" data-name="Caminho 2705"
                                        d="M244.433,313.233l-8.823-25.9v51.818Z"
                                        transform="translate(-145.902 -170.957)" fill="#263238" />
                                    <path id="Caminho_2706" data-name="Caminho 2706"
                                        d="M245.61,313.346l9.112,26.746V286.6Z"
                                        transform="translate(-144.354 -171.07)" fill="#263238" />
                                    <path id="Caminho_2707" data-name="Caminho 2707"
                                        d="M245.632,313.23l-8.962,26.319H254.6Z"
                                        transform="translate(-145.738 -166.947)" fill="#263238" />
                                    <path id="Caminho_2708" data-name="Caminho 2708"
                                        d="M430.7,287.8l-7.922-5.047-29.206-72.143L342.914,186.56H232.05l50.663,24.055,29.206,72.143,7.922,5.047H419.953l7.657,4.862Z"
                                        transform="translate(-146.454 -186.56)" fill="#263238" />
                                    <g id="Grupo_3930" data-name="Grupo 3930" transform="translate(85.596)"
                                        clip-path="url(#clip-path)">
                                        <path id="Caminho_2709" data-name="Caminho 2709"
                                            d="M430.7,287.8l-7.922-5.047-29.206-72.143L342.914,186.56H232.05l50.663,24.055,29.206,72.143,7.922,5.047H419.953l7.657,4.862Z"
                                            transform="translate(-232.05 -186.56)" fill="#fff"
                                            opacity="0.5" />
                                        <path id="Caminho_2710" data-name="Caminho 2710"
                                            d="M282.713,210.615H393.577L342.914,186.56H232.05Z"
                                            transform="translate(-232.05 -186.56)" fill="#fff"
                                            opacity="0.5" />
                                    </g>
                                    <path id="Caminho_2712" data-name="Caminho 2712"
                                        d="M430.7,287.8l-7.922-5.047-29.206-72.143L342.914,186.56H232.05l50.663,24.055,29.206,72.143,7.922,5.047H419.953l7.657,4.862Z"
                                        transform="translate(-146.454 -186.56)" fill="none" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2713" data-name="Caminho 2713"
                                        d="M308.485,274.23H419.349l-3.095,4.862H305.39Z"
                                        transform="translate(-135.098 -172.986)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <rect id="Retângulo_2595" data-name="Retângulo 2595" width="5.485"
                                        height="8.846" transform="translate(173.445 118.879)" fill="#fff" />
                                    <rect id="Retângulo_2596" data-name="Retângulo 2596" width="5.485"
                                        height="8.846" transform="translate(180.085 118.879)" fill="#fff" />
                                    <rect id="Retângulo_2597" data-name="Retângulo 2597" width="5.485"
                                        height="7.899" transform="translate(173.445 128.88)" fill="#fff" />
                                    <rect id="Retângulo_2598" data-name="Retângulo 2598" width="5.485"
                                        height="7.899" transform="translate(180.085 128.88)" fill="#fff" />
                                    <rect id="Retângulo_2599" data-name="Retângulo 2599" width="5.485"
                                        height="8.846" transform="translate(196.16 118.879)" fill="#fff" />
                                    <rect id="Retângulo_2600" data-name="Retângulo 2600" width="5.485"
                                        height="8.846" transform="translate(202.801 118.879)" fill="#fff" />
                                    <rect id="Retângulo_2601" data-name="Retângulo 2601" width="5.485"
                                        height="7.899" transform="translate(196.16 128.88)" fill="#fff" />
                                    <rect id="Retângulo_2602" data-name="Retângulo 2602" width="5.485"
                                        height="7.899" transform="translate(202.801 128.88)" fill="#fff" />
                                    <rect id="Retângulo_2603" data-name="Retângulo 2603" width="5.485"
                                        height="8.846" transform="translate(233.496 118.879)" fill="#fff" />
                                    <rect id="Retângulo_2604" data-name="Retângulo 2604" width="5.485"
                                        height="8.846" transform="translate(240.136 118.879)" fill="#fff" />
                                    <rect id="Retângulo_2605" data-name="Retângulo 2605" width="5.485"
                                        height="7.899" transform="translate(233.496 128.88)" fill="#fff" />
                                    <rect id="Retângulo_2606" data-name="Retângulo 2606" width="5.485"
                                        height="7.899" transform="translate(240.136 128.88)" fill="#fff" />
                                    <rect id="Retângulo_2607" data-name="Retângulo 2607" width="5.485"
                                        height="8.846" transform="translate(256.212 118.879)" fill="#fff" />
                                    <rect id="Retângulo_2608" data-name="Retângulo 2608" width="5.485"
                                        height="8.846" transform="translate(262.852 118.879)" fill="#fff" />
                                    <rect id="Retângulo_2609" data-name="Retângulo 2609" width="5.485"
                                        height="7.899" transform="translate(256.212 128.88)" fill="#fff" />
                                    <rect id="Retângulo_2610" data-name="Retângulo 2610" width="5.485"
                                        height="7.899" transform="translate(262.852 128.88)" fill="#fff" />
                                    <rect id="Retângulo_2611" data-name="Retângulo 2611" width="16.168"
                                        height="7.703" transform="translate(212.189 108.682)" fill="#fff" />
                                    <path id="Caminho_2714" data-name="Caminho 2714"
                                        d="M462.817,319.67V323.9h-12.7V319.67h-3.176V323.9H434.327V319.67h-3.234V323.9h-12.7V319.67h-3.176V323.9h-12.7V319.67h-3.164V323.9h-12.7V319.67h-3.13V323.9h-12.7V319.67h-3.176V323.9h-12.7V319.67h-3.176V323.9h-12.7V319.67h-3.164V323.9h-12.7V319.67H320.01v28.536h3.176V338.69h12.7v9.516h3.164V338.69h12.7v9.516h3.176V338.69h12.7v9.516h3.176V338.69h12.7v9.516h3.176V338.69h12.7v9.516h3.164V338.69h12.7v9.516h3.176V338.69h12.7v9.516h3.187V338.69h12.7v9.516h3.176V338.69h12.7v9.516h3.164V319.67ZM323.255,334.995v-7.4h12.7v7.4Zm15.856,0v-7.4h12.7v7.4Zm15.867,0v-7.4h12.7v7.4Zm15.856,0v-7.4h12.7v7.4Zm15.856,0v-7.4h12.7v7.4Zm15.856,0v-7.4h12.7v7.4Zm15.867,0v-7.4h12.7v7.4Zm15.856,0v-7.4h12.7v7.4Zm15.856,0v-7.4h12.7v7.4Z"
                                        transform="translate(-132.834 -165.95)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <line id="Linha_97" data-name="Linha 97" x2="145.902"
                                        transform="translate(187.245 182.256)" fill="none" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                </g>
                                <g id="freepik--Plants--inject-6" transform="translate(2.625 284.35)">
                                    <path id="Caminho_2715" data-name="Caminho 2715"
                                        d="M351.21,335.081s.439-2.31.485-2.437c.531-1.64,2.518-4.5,4.446-4.5a2.31,2.31,0,0,1,2.206,2.6,4.793,4.793,0,0,1-2.46,3.187A16.654,16.654,0,0,1,351.21,335.081Z"
                                        transform="translate(1.546 -319.51)" fill="#ffc100" />
                                    <path id="Caminho_2716" data-name="Caminho 2716"
                                        d="M349.448,320.763c1.813.647,2.714,4.019,2.656,5.774,0,.15-.346,2.471-.381,2.46h0c.15.531.3,1.1.45,1.732.277,1.155.577,2.46.8,3.915a39.975,39.975,0,0,1,.52,4.712,29.379,29.379,0,0,1-.185,5.289.15.15,0,0,1,0,.069c.242-.52.958-1.929,1.028-2.033.947-1.444,3.615-3.672,5.485-3.153a2.31,2.31,0,0,1,1.432,3.083,4.769,4.769,0,0,1-3.21,2.414,15.845,15.845,0,0,1-4.769-.115,39.976,39.976,0,0,1-1.155,5.278c-.289,1.016-.6,2.021-.935,3.026l.45-.878c.947-1.444,3.626-3.672,5.485-3.153a2.31,2.31,0,0,1,1.432,3.083,4.77,4.77,0,0,1-3.21,2.414,15.092,15.092,0,0,1-4.619-.092l-.381,1.155c-.647,1.848-1.293,3.684-1.859,5.509-.208.647-.381,1.282-.566,1.929.2-.393.37-.716.393-.762.947-1.444,3.626-3.672,5.485-3.164a2.31,2.31,0,0,1,1.432,3.095,4.781,4.781,0,0,1-3.21,2.414,14.483,14.483,0,0,1-4.5-.081c-.162.67-.323,1.328-.45,1.975-.081.439-.185.866-.242,1.316s-.127.889-.185,1.317c-.081.855-.185,1.721-.243,2.541,0,.577-.092,1.155-.127,1.674.2-.635.6-1.882.647-1.986a8.984,8.984,0,0,1,2.956-3.361,2.49,2.49,0,0,1,.254-.45,2.31,2.31,0,0,1,3.361-.52c1.467,1.259,1.1,4.723.427,6.317,0,.092-.589,1.063-.935,1.663l.785-.97c.531-.658,1.086-1.293,1.686-1.986l.9-.982c.3-.335.647-.647.982-.982.762-.739,1.582-1.467,2.425-2.171a15.209,15.209,0,0,1-3.164-3.326,4.8,4.8,0,0,1-.393-4.007,2.31,2.31,0,0,1,3.245-1.028c1.64,1.028,1.8,4.5,1.374,6.178,0,.1-.462,1.27-.716,1.905.508-.416,1.016-.843,1.548-1.247,1.524-1.155,3.107-2.31,4.677-3.465l1.444-1.074a15.706,15.706,0,0,1-3.3-3.465,4.758,4.758,0,0,1-.381-4.007,2.31,2.31,0,0,1,3.234-1.028c1.64,1.028,1.8,4.515,1.386,6.178,0,.127-.67,1.8-.855,2.229,1.051-.785,2.09-1.582,3.095-2.4a40.223,40.223,0,0,0,3.823-3.557,15.869,15.869,0,0,1-3.326-3.465,4.735,4.735,0,0,1-.381-4,2.31,2.31,0,0,1,3.245-1.028c1.628,1.028,1.79,4.5,1.374,6.178,0,.1-.508,1.386-.762,1.986l.1.058a29.578,29.578,0,0,0,3.13-4.2c.52-.82.97-1.628,1.386-2.425a15.726,15.726,0,0,1-3.592-3,4.828,4.828,0,0,1-.82-3.938,2.31,2.31,0,0,1,3.106-1.386c1.744.843,2.31,4.284,2.056,5.994,0,.092-.254,1.028-.439,1.7.185-.358.381-.728.554-1.086.635-1.317,1.155-2.552,1.571-3.661.242-.635.439-1.155.635-1.744a15.255,15.255,0,0,1-1.79-4.3,4.827,4.827,0,0,1,.97-3.892,2.31,2.31,0,0,1,3.4.219c1.155,1.547,0,4.85-.947,6.259-.081.115-1.651,1.859-1.675,1.836h0c-.173.52-.358,1.074-.577,1.686-.416,1.155-.889,2.367-1.5,3.707a37.7,37.7,0,0,1-2.171,4.215A29.433,29.433,0,0,1,375.235,356h0c.473-.3,1.848-1.086,1.963-1.155,1.582-.681,5.047-1.062,6.317.393a2.31,2.31,0,0,1-.508,3.361,4.769,4.769,0,0,1-4.007.242,16.169,16.169,0,0,1-3.915-2.714,39.891,39.891,0,0,1-3.869,3.765c-.8.681-1.617,1.351-2.448,2.009l.866-.485c1.582-.681,5.047-1.062,6.317.393a2.31,2.31,0,0,1-.508,3.361,4.769,4.769,0,0,1-4.007.242,15.015,15.015,0,0,1-3.811-2.621l-.97.751c-1.547,1.155-3.095,2.31-4.619,3.557-.52.427-1.028.866-1.524,1.293l.751-.416c1.582-.681,5.047-1.062,6.317.393a2.31,2.31,0,0,1-.508,3.372,4.827,4.827,0,0,1-4.019.243,14.519,14.519,0,0,1-3.707-2.552c-.508.462-1,.924-1.467,1.4s-.635.624-.924.97l-.889.993c-.543.658-1.1,1.328-1.605,1.986-.358.45-.693.889-1.028,1.328.52-.427,1.547-1.247,1.64-1.3,1.467-.912,4.827-1.813,6.305-.566a2.31,2.31,0,0,1,0,3.4,4.8,4.8,0,0,1-3.938.855,15.7,15.7,0,0,1-4.25-2.079c-.554.728-1.086,1.444-1.582,2.125-1.7,2.31-3.037,4.388-3.95,5.774l-.092.139-1.155-.566.185-.277c.958-1.432,2.31-3.465,4.123-5.774.554-.739,1.155-1.524,1.8-2.31a26.664,26.664,0,0,1-1.825-2.31,16.818,16.818,0,0,1-4.55.554c-.058.912-.116,1.8-.15,2.645-.116,2.91-.1,5.335-.081,7.033v.2l-1.293-.624c0-1.686.058-3.973.231-6.663,0-.935.139-1.917.231-2.933a16.086,16.086,0,0,1-4.411-1.732,4.758,4.758,0,0,1-2.021-3.464,2.31,2.31,0,0,1,2.506-2.31c1.917.242,3.522,3.337,3.846,5.024,0,.1.092,1.213.139,1.917a11.644,11.644,0,0,1,.116-1.247c.081-.843.2-1.686.312-2.587l.208-1.317c.069-.45.185-.9.277-1.363.231-1.039.52-2.1.831-3.153a14.744,14.744,0,0,1-4.481-1.028,4.781,4.781,0,0,1-2.529-3.118,2.309,2.309,0,0,1,2.136-2.656c1.929,0,3.984,2.772,4.55,4.4,0,.1.312,1.316.462,1.986.185-.635.381-1.27.589-1.894.624-1.836,1.317-3.661,1.986-5.485.208-.566.416-1.155.612-1.686a16.008,16.008,0,0,1-4.619-1.039,4.793,4.793,0,0,1-2.529-3.13,2.31,2.31,0,0,1,2.136-2.645c1.929,0,3.984,2.76,4.562,4.388,0,.127.439,1.871.508,2.31.45-1.236.878-2.46,1.259-3.7a40.044,40.044,0,0,0,1.224-5.081,15.821,15.821,0,0,1-4.619-1.051,4.723,4.723,0,0,1-2.529-3.118,2.31,2.31,0,0,1,2.136-2.645c1.929,0,3.984,2.76,4.55,4.388,0,.116.346,1.444.473,2.079h.1a29.243,29.243,0,0,0,.3-5.243,26.6,26.6,0,0,0-.185-2.783,15.512,15.512,0,0,1-4.619-.531,4.769,4.769,0,0,1-2.852-2.829,2.31,2.31,0,0,1,1.836-2.864c1.905-.254,4.261,2.31,5.012,3.869,0,.081.346.993.577,1.651-.058-.4-.092-.82-.15-1.155-.2-1.455-.462-2.76-.7-3.926-.15-.658-.3-1.259-.439-1.8a15.545,15.545,0,0,1-3.857-2.61,4.781,4.781,0,0,1-1.236-3.823,2.31,2.31,0,0,1,2.9-1.651Z"
                                        transform="translate(-0.399 -320.667)" fill="#ffc100" />
                                    <path id="Caminho_2717" data-name="Caminho 2717"
                                        d="M378.817,347.207a16.274,16.274,0,0,1-4.527-1.605s1.628-1.686,1.744-1.778c1.351-1.074,4.619-2.31,6.19-1.282a2.31,2.31,0,0,1,.4,3.372,4.769,4.769,0,0,1-3.811,1.293Z"
                                        transform="translate(5.12 -317.34)" fill="#ffc100" />
                                    <path id="Caminho_2718" data-name="Caminho 2718"
                                        d="M370.963,382.092S361.724,360.011,356.62,361s8.788,35.2,8.788,35.2-16.11-30.4-27.1-30.4,4.03,33.606,17.946,44.8c0,0-21.942-23.674-34.8-18.558s25.637,29.125,25.637,29.125-22.323-7.044-19.782-1.64,9.527,6.409,9.527,6.409l-25.268,1.27h87.906l-19.782-1.917s20.521-10.243,15.013-14.4-17.588,4.8-17.588,4.8S398,392.658,393.967,384.02s-21.942,15.671-21.942,15.671,14.655-31.042,11.722-36.481S370.963,382.092,370.963,382.092Z"
                                        transform="translate(-4.592 -314.426)" fill="#ffc100" />
                                    <path id="Caminho_2719" data-name="Caminho 2719"
                                        d="M366.574,380.27c-8.084,23.813-8.084,40.662-8.084,40.662s9.527.37,19.413-6.929"
                                        transform="translate(2.673 -311.438)" fill="none" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2720" data-name="Caminho 2720"
                                        d="M362.884,394.169a143.5,143.5,0,0,0-6.594-20.879"
                                        transform="translate(2.333 -312.519)" fill="none" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2721" data-name="Caminho 2721"
                                        d="M341.38,379.32l20.51,30.407s13.927-11.722,18.685-18.316"
                                        transform="translate(0.024 -311.585)" fill="none" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2722" data-name="Caminho 2722"
                                        d="M362.907,414.168S341.288,403.913,332.5,398"
                                        transform="translate(-1.351 -308.693)" fill="none" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2723" data-name="Caminho 2723"
                                        d="M63.85,329.079s.2-1.039.219-1.155c.243-.751,1.155-2.044,2.033-2.044a1.039,1.039,0,0,1,1,1.155,2.229,2.229,0,0,1-1.155,1.455A7.3,7.3,0,0,1,63.85,329.079Z"
                                        transform="translate(-42.947 -319.86)" fill="#ffc100" />
                                    <path id="Caminho_2724" data-name="Caminho 2724"
                                        d="M63.029,322.554c.831.3,1.236,1.836,1.155,2.621,0,.058-.162,1.155-.173,1.155h0a3.9,3.9,0,0,0,.2.785c.127.52.266,1.155.37,1.778a19.435,19.435,0,0,1,.231,2.148,13.152,13.152,0,0,1-.081,2.414h0c.1-.231.427-.878.462-.924.427-.647,1.651-1.663,2.494-1.432a1.039,1.039,0,0,1,.658,1.4,2.183,2.183,0,0,1-1.467,1.155,6.928,6.928,0,0,1-2.171-.058,18.406,18.406,0,0,1-.52,2.414c-.127.45-.277.912-.427,1.374l.208-.4c.427-.658,1.651-1.674,2.494-1.432a1.039,1.039,0,0,1,.751,1.386,2.182,2.182,0,0,1-1.467,1.155,6.929,6.929,0,0,1-2.1,0c-.069.173-.127.358-.185.531-.289.843-.577,1.674-.843,2.506-.092.289-.173.589-.254.878l.173-.346c.439-.658,1.651-1.674,2.506-1.444a1.039,1.039,0,0,1,.647,1.409,2.171,2.171,0,0,1-1.455,1.1,6.349,6.349,0,0,1-2.056,0c-.069.3-.15.6-.208.9s-.081.393-.1.6a1.765,1.765,0,0,1-.092.6c0,.381-.081.785-.1,1.155s0,.508,0,.762c.081-.289.277-.855.289-.9a4.169,4.169,0,0,1,1.351-1.536,1.153,1.153,0,0,1,.115-.2,1.039,1.039,0,0,1,1.524-.242c.67.577.508,2.148.2,2.875l-.427.762.358-.45.774-.9.4-.45c.139-.15.3-.289.45-.439a11.021,11.021,0,0,1,1.155-.993,6.769,6.769,0,0,1-1.444-1.513,2.206,2.206,0,0,1-.358-2.009,1.051,1.051,0,0,1,1.478-.474c.751.474.82,2.056.635,2.818,0,0-.219.577-.335.866l.7-.566c.693-.543,1.42-1.062,2.136-1.582l.658-.485a7.068,7.068,0,0,1-1.5-1.57,2.16,2.16,0,0,1-.185-1.825,1.051,1.051,0,0,1,1.478-.462c.751.462.82,2.044.624,2.806,0,.058-.3.82-.381,1.016.485-.358.959-.716,1.409-1.086a19.632,19.632,0,0,0,1.744-1.628A7.3,7.3,0,0,1,72.983,337a2.206,2.206,0,0,1-.185-1.825,1.051,1.051,0,0,1,1.478-.462c.751.462.82,2.044.635,2.806,0,.058-.231.635-.346.912h0a13.456,13.456,0,0,0,1.42-1.917,9.24,9.24,0,0,0,.635-1.155,7.357,7.357,0,0,1-1.64-1.374,2.217,2.217,0,0,1-.37-1.79,1.051,1.051,0,0,1,1.42-.635c.785.393,1.039,1.952.924,2.737,0,0-.1.462-.2.774l.254-.5c.289-.6.52-1.155.716-1.674.1-.289.208-.543.289-.785a7.183,7.183,0,0,1-.808-1.963,2.206,2.206,0,0,1,.485-1.767,1.051,1.051,0,0,1,1.547.1c.531.7,0,2.206-.427,2.841,0,0-.751.855-.762.843h0c-.069.242-.162.5-.254.774-.2.508-.4,1.086-.681,1.686a17.948,17.948,0,0,1-.993,1.917,12.853,12.853,0,0,1-1.4,1.975h0c.219-.139.843-.5.9-.52.716-.312,2.31-.485,2.876.185a1.028,1.028,0,0,1-.231,1.524,2.194,2.194,0,0,1-1.825.115,7.529,7.529,0,0,1-1.79-1.236,18.964,18.964,0,0,1-1.675,1.8l-1.155.912.393-.219c.728-.3,2.31-.485,2.876.185a1.028,1.028,0,0,1-.231,1.524,2.148,2.148,0,0,1-1.825.115,6.663,6.663,0,0,1-1.732-1.155l-.439.346c-.7.543-1.409,1.074-2.09,1.628-.243.185-.462.393-.693.589l.335-.2c.728-.312,2.31-.485,2.876.185a1.028,1.028,0,0,1-.231,1.524,2.183,2.183,0,0,1-1.825.115,6.64,6.64,0,0,1-1.686-1.155c-.231.208-.462.416-.67.635s-.289.277-.427.439l-.4.45-.728.9-.462.612.739-.6c.67-.416,2.206-.82,2.876-.254a1.039,1.039,0,0,1,0,1.548,2.229,2.229,0,0,1-1.79.393,7.149,7.149,0,0,1-1.94-.958l-.716.97c-.774,1.074-1.386,2-1.8,2.656v.069l-.543-.266.092-.127c.427-.647,1.062-1.571,1.871-2.645.254-.335.531-.693.82-1.051a12.131,12.131,0,0,1-.832-1.039,7.633,7.633,0,0,1-2.067.254c0,.416-.058.82-.069,1.155v3.3l-.589-.289c0-.774,0-1.813.1-3.037a5.977,5.977,0,0,1,.1-1.34,6.93,6.93,0,0,1-2.009-.785,2.183,2.183,0,0,1-.924-1.582,1.039,1.039,0,0,1,1.155-1.039c.878.1,1.605,1.513,1.744,2.31a5.278,5.278,0,0,0,.069.866v-.566a8.069,8.069,0,0,1,.139-1.155,3.793,3.793,0,0,1,.092-.6c.035-.208.092-.4.127-.612.1-.473.243-.958.381-1.444a6.927,6.927,0,0,1-2.044-.462,2.183,2.183,0,0,1-1.155-1.42,1.051,1.051,0,0,1,.982-1.213c.878,0,1.813,1.259,2.067,2.009,0,0,.15.589.208.9.092-.289.173-.577.277-.866.277-.831.589-1.663.9-2.494l.277-.774a7.091,7.091,0,0,1-2.113-.473,2.183,2.183,0,0,1-1.155-1.42,1.039,1.039,0,0,1,.97-1.155c.889,0,1.825,1.259,2.079,2,0,.058.2.855.243,1.051.2-.554.393-1.155.566-1.686a17.172,17.172,0,0,0,.554-2.31,7.288,7.288,0,0,1-2.125-.474,2.182,2.182,0,0,1-1.155-1.42,1.051,1.051,0,0,1,.982-1.213c.878,0,1.813,1.259,2.067,2.009,0,0,.162.647.219.935h0a14.181,14.181,0,0,0,.139-2.39,6.411,6.411,0,0,0-.081-1.259,7.226,7.226,0,0,1-2.125-.242,2.194,2.194,0,0,1-1.3-1.293,1.051,1.051,0,0,1,.843-1.3c.866-.115,1.94,1.051,2.31,1.767,0,0,.173.45.266.751v-.543c-.092-.67-.219-1.259-.323-1.79l-.2-.82A7.518,7.518,0,0,1,62.3,325.21a2.183,2.183,0,0,1-.554-1.744,1.039,1.039,0,0,1,1.282-.912Z"
                                        transform="translate(-43.824 -320.379)" fill="#ffc100" />
                                    <path id="Caminho_2725" data-name="Caminho 2725"
                                        d="M76.426,334.6a7.367,7.367,0,0,1-2.056-.728s.739-.762.785-.808c.612-.485,2.09-1.074,2.829-.589a1.039,1.039,0,0,1,.173,1.536,2.113,2.113,0,0,1-1.732.589Z"
                                        transform="translate(-41.319 -318.867)" fill="#ffc100" />
                                    <path id="Caminho_2726" data-name="Caminho 2726"
                                        d="M72.831,350.492s-4.169-10.059-6.5-9.62,3.961,16.041,3.961,16.041-7.333-13.858-12.345-13.858,1.836,15.3,8.176,20.406c0,0-10.012-10.786-15.844-8.453s11.71,13.269,11.71,13.269-10.174-3.2-9.019-.693S57.3,370.5,57.3,370.5l-11.548.577h40.1l-9.008-.878s9.343-4.619,6.837-6.559-8,2.194-8,2.194,9.5-10.5,7.668-14.435-10.012,7.148-10.012,7.148S80,344.406,78.674,341.934,72.831,350.492,72.831,350.492Z"
                                        transform="translate(-45.75 -317.541)" fill="#ffc100" />
                                    <path id="Caminho_2727" data-name="Caminho 2727"
                                        d="M70.852,349.66a63.838,63.838,0,0,0-3.672,18.477,15.313,15.313,0,0,0,8.846-3.072"
                                        transform="translate(-42.432 -316.178)" fill="none" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2728" data-name="Caminho 2728"
                                        d="M69.173,356a64.672,64.672,0,0,0-3-9.516"
                                        transform="translate(-42.588 -316.67)" fill="none" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2729" data-name="Caminho 2729"
                                        d="M59.38,349.23l9.343,13.858s6.386-5.347,8.511-8.349"
                                        transform="translate(-43.64 -316.244)" fill="none" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2730" data-name="Caminho 2730"
                                        d="M69.178,365.095s-9.839-4.677-13.858-7.345"
                                        transform="translate(-44.268 -314.925)" fill="none" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                </g>
                                <g id="freepik--Car--inject-6" transform="translate(56.995 273.149)">
                                    <line id="Linha_98" data-name="Linha 98" x2="106.718"
                                        transform="translate(2.714 38.286)" fill="none" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2731" data-name="Caminho 2731"
                                        d="M133.6,322.26H135.8l-.312,18.974H132.62Z"
                                        transform="translate(-86.669 -309.219)" fill="#323232" />
                                    <path id="Caminho_2732" data-name="Caminho 2732"
                                        d="M101.18,336.935H119.9l2.079,2.61h75.538V329.14H102.739Z"
                                        transform="translate(-91.537 -308.153)" fill="#263238" />
                                    <path id="Caminho_2733" data-name="Caminho 2733"
                                        d="M94,321.62l.081,14.4a1.882,1.882,0,0,0,1.328,1.49,32.093,32.093,0,0,0,4.238.15l3.465-6.386a4.2,4.2,0,0,1,3.938-2.829c3.118-.069,17.08.67,17.08.67a3.846,3.846,0,0,1,2.379,2.749c.589,2.229.37,8.765.37,8.765l12.853.37.439-18.477Z"
                                        transform="translate(-92.649 -309.318)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2734" data-name="Caminho 2734"
                                        d="M182.7,338.678a7.807,7.807,0,1,0-7.8,7.8A7.807,7.807,0,0,0,182.7,338.678Z"
                                        transform="translate(-81.332 -307.887)" fill="#263238" />
                                    <path id="Caminho_2735" data-name="Caminho 2735"
                                        d="M180.935,338.469a6.248,6.248,0,1,0-6.236,6.236A6.248,6.248,0,0,0,180.935,338.469Z"
                                        transform="translate(-81.123 -307.678)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2736" data-name="Caminho 2736"
                                        d="M178.408,338.17a4.019,4.019,0,1,0-4.007,4.007A4.019,4.019,0,0,0,178.408,338.17Z"
                                        transform="translate(-80.824 -307.379)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2737" data-name="Caminho 2737"
                                        d="M176.217,337.909a2.079,2.079,0,1,0-2.079,2.079,2.079,2.079,0,0,0,2.079-2.079Z"
                                        transform="translate(-80.562 -307.118)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2738" data-name="Caminho 2738"
                                        d="M121.093,338.678a7.807,7.807,0,1,0-7.807,7.8,7.807,7.807,0,0,0,7.807-7.8Z"
                                        transform="translate(-90.871 -307.887)" fill="#263238" />
                                    <path id="Caminho_2739" data-name="Caminho 2739"
                                        d="M119.325,338.469a6.248,6.248,0,1,0-6.248,6.236,6.248,6.248,0,0,0,6.248-6.236Z"
                                        transform="translate(-90.662 -307.678)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2740" data-name="Caminho 2740"
                                        d="M116.8,338.17a4.007,4.007,0,1,0-1.178,2.838,4.019,4.019,0,0,0,1.178-2.838Z"
                                        transform="translate(-90.363 -307.379)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2741" data-name="Caminho 2741"
                                        d="M114.557,337.909a2.079,2.079,0,1,0-2.079,2.079,2.079,2.079,0,0,0,2.079-2.079Z"
                                        transform="translate(-90.11 -307.118)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2742" data-name="Caminho 2742"
                                        d="M139.394,311.121s-3.245.162-3.187.589a5.5,5.5,0,0,0,.473,1.27l-2.067,10.728a25.6,25.6,0,0,0-.381,3.187c0,1.062-.312,15.521-.312,15.521a1.351,1.351,0,0,0,1.224.855c1,.1,32.335.577,32.335.577a4.434,4.434,0,0,0,1.651-1.328c.9-1.063,5.208-6.536,10.255-8.084a10.394,10.394,0,0,1,9.885,1.64c1.224,1.155,1.386,5.162,1.547,5.959s1.594.843,1.905.843,2.229-.208,2.656-.8a7.275,7.275,0,0,0,.647-2.7,2.148,2.148,0,0,0-.266-.8l1.432-6.063s.312-1.155-.058-1.432-1.328-.37-1.49-.959.647-1.7,0-2.552-2.76-1.7-4.354-2.067-10.9-1.062-10.9-1.062l-14.713-.8-3.7-5.716-3.2-5a.681.681,0,0,0-.208-1c-.635-.427-2.448-.589-6.005-.855S139.394,311.121,139.394,311.121Z"
                                        transform="translate(-86.468 -310.967)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2743" data-name="Caminho 2743"
                                        d="M136.36,342.542l.37-15.9s-.37-.739.52-1.929a12.1,12.1,0,0,1,1.79-1.928l1.328-8.465a2.31,2.31,0,0,1,2.16-2.079c2.079-.231,13.662.219,13.662.219l4.689,11.063a11.837,11.837,0,0,1,.589,4.019c-.069,2.229-.739,15.59-.739,15.59Z"
                                        transform="translate(-86.09 -310.781)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2744" data-name="Caminho 2744"
                                        d="M158.269,311.97c-.635-.427-2.448-.589-6.005-.855s-13.177,0-13.177,0-3.245.162-3.187.589a2.31,2.31,0,0,0,.173.589h22.5A.866.866,0,0,0,158.269,311.97Z"
                                        transform="translate(-86.161 -310.962)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2745" data-name="Caminho 2745"
                                        d="M153.387,313.324l-10.093-.1a1.894,1.894,0,0,0-1.859,1.536c-.473,1.651-1.155,7.333-1.155,7.333s0,.8,1.155.855,15.891.323,15.891.323a1.028,1.028,0,0,0,1.109-1.062c0-1-3.465-8.292-3.465-8.292S154.727,312.966,153.387,313.324Z"
                                        transform="translate(-85.483 -310.618)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2746" data-name="Caminho 2746"
                                        d="M155.667,323.239l-4.977-.081,1.478-9.908h.289a1.224,1.224,0,0,1,1.155.831c.4.8,3.465,6.929,3.465,7.9a1.27,1.27,0,0,1-1.409,1.259Zm-4.3-.624,4.3.069a.669.669,0,0,0,.762-.67c0-.67-2.1-5.058-3.464-7.691v-.058a.589.589,0,0,0-.323-.346Z"
                                        transform="translate(-83.871 -310.614)" fill="#263238" />
                                    <path id="Caminho_2747" data-name="Caminho 2747"
                                        d="M152.1,313.273l-1.49,9.885h.716l1.478-9.828A1.305,1.305,0,0,0,152.1,313.273Z"
                                        transform="translate(-83.884 -310.614)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2748" data-name="Caminho 2748"
                                        d="M158.74,317.67l-3.2-5s-1,0-.577,1.282,3.464,8.338,3.464,8.338a3.049,3.049,0,0,0,1.651.855,22.912,22.912,0,0,0,2.714.266v-.092h-.358Z"
                                        transform="translate(-83.226 -310.704)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2749" data-name="Caminho 2749"
                                        d="M94.052,323.41l46.066,1.062.046-1.963L94.04,321.62Z"
                                        transform="translate(-92.643 -309.318)" fill="#263238" />
                                    <path id="Caminho_2750" data-name="Caminho 2750"
                                        d="M140.525,322.986h0l-47.256-1.155a.462.462,0,0,1-.439-.462.473.473,0,0,1,.45-.439l47.267,1.155a.45.45,0,0,1,.439.45A.462.462,0,0,1,140.525,322.986Z"
                                        transform="translate(-92.83 -309.425)" fill="#fff" />
                                    <path id="Caminho_2751" data-name="Caminho 2751"
                                        d="M140.525,322.986h0l-47.256-1.155a.462.462,0,0,1-.439-.462.473.473,0,0,1,.45-.439l47.267,1.155a.45.45,0,0,1,.439.45A.462.462,0,0,1,140.525,322.986Z"
                                        transform="translate(-92.83 -309.425)" fill="none" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2752" data-name="Caminho 2752"
                                        d="M96.29,339.827l5.578,1.155,2.6-8.165s.37-1.559,3.788-1.929,9.874-.381,12.4.37,2.818,2.818,3.187,5.047.15,5.5.751,5.867,4.157.081,4.827-.069,1.409-9.239,1.155-11.548-2.829-4.827-6.467-4.977-14.482-.45-19.309.219-6.536,2.749-7.275,5.774A74.407,74.407,0,0,0,96.29,339.827Z"
                                        transform="translate(-92.294 -308.736)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2753" data-name="Caminho 2753"
                                        d="M191.6,339.449a7.276,7.276,0,0,0,.647-2.7,2.148,2.148,0,0,0-.266-.8l1.432-6.063s.312-1.155-.058-1.432a4.614,4.614,0,0,0-.82-.358c-5.139-.346-17.149-.993-22.1,1.34-5.382,2.518-10.982,9.851-12.334,11.687l5.6.081a4.434,4.434,0,0,0,1.651-1.328c.9-1.062,5.208-6.536,10.255-8.084a10.393,10.393,0,0,1,9.885,1.64c1.224,1.155,1.386,5.162,1.547,5.959s1.594.843,1.905.843S191.174,340.038,191.6,339.449Z"
                                        transform="translate(-82.724 -308.37)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2754" data-name="Caminho 2754"
                                        d="M187.64,334.85h1.871l.081.081a1.963,1.963,0,0,1,.508,1.905l-.45,1.605a1.432,1.432,0,0,1-1.628,1.028l-1.582-.266a3.626,3.626,0,0,1,1.2-4.354Z"
                                        transform="translate(-78.381 -307.269)" fill="#fff" stroke="#263238"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                    <path id="Caminho_2755" data-name="Caminho 2755"
                                        d="M140.133,322.86s.139.589-.208.739a1.385,1.385,0,0,1-1.328-.393c-.3-.346-.058-.8.739-.8S140.133,322.86,140.133,322.86Z"
                                        transform="translate(-85.763 -309.195)" fill="#263238" />
                                    <path id="Caminho_2756" data-name="Caminho 2756"
                                        d="M138.46,322.7a12.979,12.979,0,0,1,5.347.092,1.629,1.629,0,0,1-.693.2C142.767,322.99,137.721,322.99,138.46,322.7Z"
                                        transform="translate(-85.776 -309.187)" fill="#263238" />
                                </g>
                            </g>
                            <text id="Pessoa_jurídica" data-name="Pessoa jurídica" transform="translate(134 460)"
                                fill="#4a5860" font-size="28" font-family="Montserrat-Medium, Montserrat"
                                font-weight="500" letter-spacing="-0.015em">
                                <tspan x="0" y="0">Pessoa jurídica</tspan>
                            </text>
                        </svg>
                    @endif
                </div>
                <div class="w-full md:w-7/12 md:pl-6">
                    <form class="flex flex-wrap items-center w-full" wire:submit.prevent='salvar'>
                        @if ($categoria === 0)
                            <div class="w-full md:w-1/3 mb-3">
                                <label class="form-label" for="">RG</label>
                                <input type="text" class="w-full form-input-text" wire:model.defer="rg"
                                    maxlength="20" required>
                            </div>
                            <div class="w-full md:w-1/3 md:pl-5 mb-3">
                                <label class="form-label" for="">CPF</label>
                                <input type="text" class="w-full form-input-text cpf" wire:model.defer="cpf"
                                    maxlength="14" minlength="14" required>
                            </div>
                            <div class="w-full md:w-1/3 md:pl-5 mb-3">
                                <label class="form-label" for="">Nascimento</label>
                                <input type="date" class="w-full form-input-text" wire:model.defer="nascimento" required>
                            </div>
                        @else
                            <div class="w-full md:w-1/3 mb-3">
                                <label class="form-label" for="">CNPJ</label>
                                <input type="text" class="w-full form-input-text cnpj" wire:model.defer="cnpj"
                                    maxlength="18" minlength="18" required>
                            </div>
                            <div class="w-full md:w-2/3 md:pl-5 mb-3">
                                <label class="form-label" for="">Nome Fantasia</label>
                                <input type="text" class="w-full form-input-text"
                                    wire:model.defer="nome_fantasia" maxlength="100" required>
                            </div>
                        @endif
                        <div class="w-full md:w-1/3 mb-3">
                            <label class="form-label" for="">CEP</label>
                            <input type="text" class="w-full form-input-text cep" wire:model.defer="cep"
                                maxlength="9" minlength="9" required>
                        </div>
                        <div class="w-full md:w-2/3 md:pl-5 mb-3">
                            <label class="form-label" for="">@if($categoria === 0) Endereço Residencial @else Endereço Comercial @endif</label>
                            <input type="text" class="w-full form-input-text" wire:model.defer="rua"
                                maxlength="50" required>
                        </div>
                        <div class="w-full md:w-3/12 mb-3">
                            <label class="form-label" for="">Número</label>
                            <input type="text" class="w-full form-input-text" wire:model.defer="numero"
                                maxlength="10" required>
                        </div>
                        <div class="w-full md:w-4/12 md:pl-5 mb-3">
                            <label class="form-label" for="">Bairro</label>
                            <input type="text" class="w-full form-input-text" wire:model.defer="bairro"
                                maxlength="50" required>
                        </div>
                        <div class="w-full md:w-5/12 md:pl-5 mb-3">
                            <label class="form-label" for="">Cidade</label>
                            <input type="text" class="w-full form-input-text" wire:model.defer="cidade"
                                maxlength="50" required>
                        </div>
                        <div class="w-full md:w-2/12 mb-3">
                            <label class="form-label" for="">Estado</label>
                            <input type="text" class="w-full form-input-text" wire:model.defer="estado"
                                maxlength="2" required>
                        </div>
                        <div class="w-full md:w-4/12 md:pl-5 mb-3">
                            <label class="form-label" for="">País</label>
                            <input type="text" class="w-full form-input-text" wire:model.defer="pais"
                                maxlength="50" required>
                        </div>
                        <div class="w-full md:w-6/12 md:pl-5 mb-3">
                            <label class="form-label" for="">Complemento (Opcional)</label>
                            <input type="text" class="w-full form-input-text"
                                wire:model.defer="complemento" maxlength="100">
                        </div>
                        <div class="w-full mt-5 text-right">
                            <button
                                class="shadow-md rounded-[15px] bg-[#FDAF3C] hover:bg-[#de8a10] border-2 border-[##FDAF3C] text-white px-5 py-3 font-montserrat text-[20px] font-medium">Avançar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push("scripts")

<script>
    
</script>

@endpush