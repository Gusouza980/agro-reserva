<div class="w-full">
    <div class="w-full flex justify-start">
        @foreach (\Acessos::$niveis as $key => $nivel)
            <button wire:click="$set('setor', '{{ $key }}')"
                class="flex-grow @if ($setor == $key) bg-gray-500 border text-white @else bg-gray-200 border text-gray-500 @endif px-5 py-3">{{ $nivel }}</button>
        @endforeach
    </div>
    <div class="w-full py-5 px-5">
        <table>
            <tbody>
                @foreach ($guias as $guia)
                    <tr class="">
                        <td class="whitespace-nowrap border border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            <a href="{{ asset($guia->caminho) }}" target="_blank"
                                class="transition duration-200 hover:scale-105"><i
                                    class="fas fa-file fa-lg mr-3"></i>{{ $guia->nome }}</a>
                        </td>
                        <td
                            class="whitespace-nowrap border border-l-0 border-slate-200 px-3 py-3 dark:border-navy-500 lg:px-5">
                            <button wire:click="excluir({{ $guia->id }})"
                                class="transition duration-200 hover:scale-105 text-red-500"><i
                                    class="fas fa-trash-alt fa-lg"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <x-loading></x-loading>
</div>
