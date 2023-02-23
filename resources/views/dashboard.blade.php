<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="mb-4">
                        <h1>Template</h1>
                        <x-template.navbar />
                    </div>

                    <div class="mb-4">
                        <h1>Form</h1>
                        <x-forms.input />
                    </div>

                    <div class="mb-4">
                        <h1>Output</h1>
                        <x-template.navbar one="Home" two="About" three="Contact" four="Blog" />
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
