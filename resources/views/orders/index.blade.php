<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>     
                        @foreach ($orders as $order)
                            <li>
                                <div class="flex border-b justify-between items-center">
                                <p class="w-[25%]"><b>Delivery address:</b><br>{{ $order -> delivery_address }}<p>
                                <p class="w-[25%]"><b>Order date:</b><br>{{ $order -> order_date }}<p>
                                <p class="w-[25%]"><b>Order status:</b><br>{{ $order -> status }}<p>
                                <div class="grid grid-cols-2 gap-2 pt-2">
                                    <x-primary-button>edit</x-primary-button>
                                    <form method="POST" action="{{ route('orders.destroy', $order) }}">
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
