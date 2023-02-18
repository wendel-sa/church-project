<x-app-layout>
    <x-slot name="header">
     
    </x-slot>

    <ul class="nav nav-pills justify-content-center my-4">

        <li class="nav-item">
            <a href="{{route('tela.notebook')}}" class="nav-link active">
                <i class="fa-solid fa-laptop me-1"></i>
                Notebook
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('tela.tv')}}" class="nav-link" target="_blank">
                <i class="fa-solid fa-display me-1"></i>
                Tela de projeção
            </a>
        </li>
    </ul>


    @livewire('tela-notebook')


</x-app-layout>
