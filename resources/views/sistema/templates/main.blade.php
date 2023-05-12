<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from lineone.piniastudio.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Sep 2022 01:23:26 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Meta tags  -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />

    <title>{{ env("SYSTEM_TITLE") }} - Painel Administrativo</title>
    <link rel="icon" type="image/png" href="images/favicon.png" />

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('painel/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=1.1"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Javascript Assets -->
    <script src="{{ asset('painel/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet" />
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <style>
        .note-modal-backdrop{
            display: none !important; 
        }
    </style>
    @toastr_js
    @toastr_render
    @yield("styles")
    @stack("styles")
    @livewireStyles()
</head>

<body x-data class="is-header-blur" x-bind="$store.global.documentBody">
    <!-- App preloader-->
    <div class="fixed z-50 grid w-full h-full app-preloader place-content-center bg-slate-50 dark:bg-navy-900">
        <div class="relative inline-block w-48 h-48 app-preloader-inner"></div>
    </div>

    <!-- Page Wrapper -->
    <div id="root" class="flex min-h-100vh grow bg-slate-50 dark:bg-navy-900" x-cloak>
        <!-- Sidebar -->
        <div class="sidebar print:hidden">
            <!-- Main Sidebar -->
            <div class="main-sidebar">
                <div
                    class="flex flex-col items-center w-full h-full bg-white border-r border-slate-150 dark:border-navy-700 dark:bg-navy-800">
                    <!-- Application Logo -->
                    <div class="flex pt-4">
                        <a href="{{ route('painel.index') }}">
                            <img class="h-11 w-11 transition-transform duration-500 ease-in-out hover:rotate-[360deg]"
                                src="{{ asset('painel/images/app-logo.svg') }}" alt="logo" />
                        </a>
                    </div>

                    @include("painel.includes.template.menu")
                </div>
            </div>

            <!-- Sidebar Panel -->
            <div class="sidebar-panel">
                <div class="flex h-full grow flex-col bg-white pl-[var(--main-sidebar-width)] dark:bg-navy-750">
                    
                </div>
            </div>
        </div>

        <!-- App Header Wrapper-->
        <nav class="header print:hidden">
            <!-- App Header  -->
            <div class="relative flex w-full bg-white header-container dark:bg-navy-750 print:hidden">
                <!-- Header Items -->
                <div class="flex items-center justify-end w-full">
                    <!-- Left: Sidebar Toggle Button -->
                    {{-- <div class="h-7 w-7">
                        <button
                            class="menu-toggle ml-0.5 flex h-7 w-7 flex-col justify-center space-y-1.5 text-primary outline-none focus:outline-none dark:text-accent-light/80"
                            :class="$store.global.isSidebarExpanded && 'active'"
                            @click="$store.global.isSidebarExpanded = !$store.global.isSidebarExpanded">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div> --}}

                    <!-- Right: Header buttons -->
                    <div class="-mr-1.5 flex items-center space-x-2">
                        <!-- Mobile Search Toggle -->
                        <button @click="$store.global.isSearchbarActive = !$store.global.isSearchbarActive"
                            class="w-8 h-8 p-0 rounded-full btn hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5.5 w-5.5 text-slate-500 dark:text-navy-100" fill="none"
                                viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>

                        <!-- Dark Mode Toggle -->
                        {{-- <button @click="$store.global.isDarkModeEnabled = !$store.global.isDarkModeEnabled"
                            class="w-8 h-8 p-0 rounded-full btn hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg x-show="$store.global.isDarkModeEnabled"
                                x-transition:enter="transition-transform duration-200 ease-out absolute origin-top"
                                x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static"
                                class="w-6 h-6 text-amber-400" fill="currentColor" viewbox="0 0 24 24">
                                <path
                                    d="M11.75 3.412a.818.818 0 01-.07.917 6.332 6.332 0 00-1.4 3.971c0 3.564 2.98 6.494 6.706 6.494a6.86 6.86 0 002.856-.617.818.818 0 011.1 1.047C19.593 18.614 16.218 21 12.283 21 7.18 21 3 16.973 3 11.956c0-4.563 3.46-8.31 7.925-8.948a.818.818 0 01.826.404z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" x-show="!$store.global.isDarkModeEnabled"
                                x-transition:enter="transition-transform duration-200 ease-out absolute origin-top"
                                x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static"
                                class="w-6 h-6 text-amber-400" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button> --}}
                        <!-- Monochrome Mode Toggle -->
                        {{-- <button @click="$store.global.isMonochromeModeEnabled = !$store.global.isMonochromeModeEnabled"
                            class="w-8 h-8 p-0 rounded-full btn hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <i
                                class="text-lg font-semibold text-transparent fa-solid fa-palette bg-gradient-to-r from-sky-400 to-blue-600 bg-clip-text"></i>
                        </button> --}}

                        <!-- Notification-->
                        {{-- <div x-effect="if($store.global.isSearchbarActive) isShowPopper = false"
                            x-data="usePopper({ placement: 'bottom-end', offset: 12 })" @click.outside="if(isShowPopper) isShowPopper = false"
                            class="flex">
                            <button @click="isShowPopper = !isShowPopper" x-ref="popperRef"
                                class="relative w-8 h-8 p-0 rounded-full btn hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 text-slate-500 dark:text-navy-100" stroke="currentColor"
                                    fill="none" viewbox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M15.375 17.556h-6.75m6.75 0H21l-1.58-1.562a2.254 2.254 0 01-.67-1.596v-3.51a6.612 6.612 0 00-1.238-3.85 6.744 6.744 0 00-3.262-2.437v-.379c0-.59-.237-1.154-.659-1.571A2.265 2.265 0 0012 2c-.597 0-1.169.234-1.591.65a2.208 2.208 0 00-.659 1.572v.38c-2.621.915-4.5 3.385-4.5 6.287v3.51c0 .598-.24 1.172-.67 1.595L3 17.556h12.375zm0 0v1.11c0 .885-.356 1.733-.989 2.358A3.397 3.397 0 0112 22a3.397 3.397 0 01-2.386-.976 3.313 3.313 0 01-.989-2.357v-1.111h6.75z" />
                                </svg>

                                <span class="absolute flex items-center justify-center w-3 h-3 -top-px -right-px">
                                    <span
                                        class="absolute inline-flex w-full h-full rounded-full animate-ping bg-secondary opacity-80"></span>
                                    <span class="inline-flex w-2 h-2 rounded-full bg-secondary"></span>
                                </span>
                            </button>
                            <div :class="isShowPopper && 'show'" class="popper-root" x-ref="popperRoot">
                                <div x-data="{ activeTab: 'tabAll' }"
                                    class="popper-box mx-4 mt-1 flex max-h-[calc(100vh-6rem)] w-[calc(100vw-2rem)] flex-col rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-800 dark:bg-navy-700 dark:shadow-soft-dark sm:m-0 sm:w-80">
                                    <div
                                        class="rounded-t-lg bg-slate-100 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                                        <div class="flex items-center justify-between px-4 pt-2">
                                            <div class="flex items-center space-x-2">
                                                <h3 class="font-medium text-slate-700 dark:text-navy-100">
                                                    Notifications
                                                </h3>
                                                <div
                                                    class="badge h-5 rounded-full bg-primary/10 px-1.5 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                                    26
                                                </div>
                                            </div>

                                            <button
                                                class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5"
                                                    fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="flex px-3 overflow-x-auto is-scrollbar-hidden shrink-0">
                                            <button @click="activeTab = 'tabAll'"
                                                :class="activeTab === 'tabAll' ?
                                                    'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                    'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                                class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                                <span>All</span>
                                            </button>
                                            <button @click="activeTab = 'tabAlerts'"
                                                :class="activeTab === 'tabAlerts' ?
                                                    'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                    'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                                class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                                <span>Alerts</span>
                                            </button>
                                            <button @click="activeTab = 'tabEvents'"
                                                :class="activeTab === 'tabEvents' ?
                                                    'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                    'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                                class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                                <span>Events</span>
                                            </button>
                                            <button @click="activeTab = 'tabLogs'"
                                                :class="activeTab === 'tabLogs' ?
                                                    'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                    'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                                class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                                <span>Logs</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="flex flex-col overflow-hidden tab-content">
                                        
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </nav>

        <!-- Mobile Searchbar -->
        <div x-show="$store.breakpoints.isXs && $store.global.isSearchbarActive"
            x-transition:enter="easy-out transition-all" x-transition:enter-start="opacity-0 scale-105"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in transition-all"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            class="fixed inset-0 z-[100] flex flex-col bg-white dark:bg-navy-700 sm:hidden">
            <div class="flex items-center px-3 pt-2 space-x-2 bg-slate-100 dark:bg-navy-800">
                <button
                    class="btn -ml-1.5 h-7 w-7 shrink-0 rounded-full p-0 text-slate-600 hover:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-100 dark:hover:bg-navy-300/20 dark:active:bg-navy-300/25"
                    @click="$store.global.isSearchbarActive = false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke-width="1.5"
                        viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <input x-effect="$store.global.isSearchbarActive && $nextTick(() => $el.focus() );"
                    class="w-full h-8 bg-transparent form-input placeholder-slate-400 dark:placeholder-navy-300"
                    type="text" placeholder="Search here..." />
            </div>
        </div>
        <!-- Main Content Wrapper -->
        <main class="w-full pb-8 main-content">
            <div class="w-full px-6 mt-4">
                <ul class="flex flex-wrap items-center space-x-2">
                    <li class="flex items-center space-x-2">
                        <a class="rounded-lg border border-slate-200 px-1.5 py-1 leading-none text-primary transition-colors hover:text-primary-focus dark:border-navy-500 dark:text-accent-light dark:hover:text-accent"
                            href="{{ route('painel.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </a>
                        <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </li>
                    @yield("breadcrumb")
                </ul>
            </div>
            @yield("conteudo")
        </main>
    </div>
    @livewire('painel.senha.modal-alterar')
    <!--
        This is a place for Alpine.js Teleport feature
        @see https://alpinejs.dev/directives/teleport
      -->
    <div id="x-teleport-target"></div>
    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());
        window.addEventListener("notificaToastr", (event) => {
            switch(event.detail.tipo){
                case 'success':
                    toastr.success(event.detail.mensagem)
                    break;
                case 'error':
                    toastr.error(event.detail.mensagem)
            }
        })
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @livewireScripts()
    @yield("scripts")
    @stack("scripts")
</body>

<!-- Mirrored from lineone.piniastudio.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Sep 2022 01:23:42 GMT -->

</html>
