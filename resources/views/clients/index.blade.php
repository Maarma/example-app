<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>     
                        @foreach ($clients as $client)
                            <li>
                                <div class="flex border-b justify-between items-center">
                                <p class="w-[10%]"><b>First name:</b><br>{{ $client -> first_name }}<p>
                                <p class="w-[10%]"><b>Last name:</b><br>{{ $client -> last_name }}<p>
                                <p class="w-[10%]"><b>Username:</b><br>{{ $client -> username }}<p>
                                <p class="w-[20%]"><b>email:</b><br>{{ $client -> email}}<p>
                                <p class="w-[20%]"><b>address:</b><br>{{ $client -> address}}<p>
                                <div class="grid grid-cols-2 gap-2 pt-2">
                                    <x-primary-button>edit</x-primary-button>
                                    <form method="POST" action="{{ route('clients.destroy', $client) }}">
                                        @csrf
                                        @method('delete')
                                        <x-danger-button onclick="event.preventDefault(); this.closest('form').submit();">
                                            Delete
                                        </x-danger-button>
                                    </form>
                                </div>
                            </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
