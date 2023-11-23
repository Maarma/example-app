<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('books.update', $book) }}">
                        @csrf
                        @method('patch')
                        <x-input-label for="title" value="Title" />
                        <x-text-input
                        value="{{ old('title', $book->title) }}"
                            name="title"
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            <x-input-label for="release_date" value="Release date" />
                        <x-text-input
                        value="{{ old('release_date', $book->release_date) }}"
                            name="release_date"
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <x-input-error :messages="$errors->get('release_date')" class="mt-2" />
                            <x-input-label for="cover_path" value="Cover path" />
                        <x-text-input
                        value="{{ old('cover_path', $book->cover_path) }}"
                            name="cover_path"
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <x-input-error :messages="$errors->get('cover_path')" class="mt-2" />
                            <x-input-label for="language" value="Language" />
                        <x-text-input
                        value="{{ old('language', $book->language) }}"
                            name="language"
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <x-input-error :messages="$errors->get('language')" class="mt-2" />
                            <x-input-label for="summary" value="Summary" />
                        <x-text-input
                        value="{{ old('summary', $book->summary) }}"
                            name="summary"
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <x-input-error :messages="$errors->get('summary')" class="mt-2" />
                            <x-input-label for="price" value="Price" />
                        <x-text-input
                        value="{{ old('price', $book->price) }}"
                            name="price"
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            <x-input-label for="stock_saldo" value="stock saldo" />
                        <x-text-input
                        value="{{ old('stock_saldo', $book->stock_saldo) }}"
                            name="stock_saldo"
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <x-input-error :messages="$errors->get('stock_saldo')" class="mt-2" />
                            <x-input-label for="pages" value="Pages" />
                        <x-text-input
                        value="{{ old('pages', $book->pages) }}"
                            name="pages"
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        />
                        <x-input-error :messages="$errors->get('pages')" class="mt-2" />
                            <x-input-label for="type" value="Type" />
                            <select value="{{ old('type', $book->type) }}" name="type"
                             class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="new" {{ $book -> type == 'new' ? "selected" : "" }}>new</option>
                                <option value="old" {{ $book -> type == 'old' ? "selected" : "" }}>old</option>
                                <option value="ebook" {{ $book -> type == 'ebook' ? "selected" : "" }}>ebook</option>
                            </select>
                        
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                        <div class="mt-4 space-x-2">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <a href="{{ route('books.index') }}">{{ __('Cancel') }}</a>
                        </div>
                        
                    </form>
                    <x-input-label for="authors" value="Authors" class="text-2xl py-4" />
                    @foreach ($book->authors as $author)
                            
                                <div class="flex border-b justify-between items-center">
                                <p>{{ $author->first_name }} {{ $author->last_name }}<p>
                                <div>
                                    <form method="POST" action="{{ route('book.detach.author', $book) }}">
                                        
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" value="{{$author->id}}" name="author_id">
                                        <x-danger-button onclick="event.preventDefault(); this.closest('form').submit();">
                                            Delete
                                        </x-danger-button>
                                    </form>
                                </div>
                            </div>
                            
                        @endforeach
                        <form method="POST" action="{{ route('book.attach.author', $book) }}">
                            @csrf
                            @method('post')
                            
                            <x-input-label for="author_id" value="Add author:" class="text-2xl py-4" />
                            <select name="author_id" id="author_id"
                                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option></option>
                                @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</option>
                                @endforeach
                            </select>

                            <div class="mt-4 space-x-2">
                                <x-primary-button>{{ __('Add') }}</x-primary-button>
                            </div>
                            
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
