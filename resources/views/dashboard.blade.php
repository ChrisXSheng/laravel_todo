<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <div class="mt-4">
                        <a href="{{ route('otp.setup') }}" class="btn btn-primary">
                            {{ __('Enable OTP') }}
                        </a>
                    </div>

                    <a href="{{ route('todos.index') }}" class="text-blue-500 hover:underline">View Todos</a>
                    <br>
                    <a href="{{ route('todos.create') }}" class="text-blue-500 hover:underline">Add Todo</a>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
