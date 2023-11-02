<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <b>Title:</b><p>{{ $book-> title}}</p>
                    <p> 
                        <span><b>Authors:</b></span>
                        @foreach ($book->authors as $author)
                            <div>    
                                {{ $author->first_name }} {{ $author->last_name }}
                            </div>
                        @endforeach
                    </p>
                    <b>Release date:</b><p>{{ $book-> release_date}}</p>
                    <b>Cover picture:</b>
                    <img src="{{ $book-> cover_path}}" class="h-[100px]"alt="book's cover picture"/>
                    <b>language:</b><p>{{ $book-> language}}</p>
                    <b>Summary:</b><p>{{ $book-> summary}}</p>
                    <b>Price:</b><p>{{ $book-> price}}</p>
                    <b>Stock saldo:</b><p>{{ $book-> stock_saldo}}</p>
                    <b>Pages:</b><p>{{ $book-> pages}}</p>
                    <b>Type:</b><p>{{ $book-> type}}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
