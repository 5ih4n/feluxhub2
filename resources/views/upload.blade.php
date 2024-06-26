<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('feluxvideos.store') }}" enctype="multipart/form-data">
            @csrf
            <textarea
                name="message"
                placeholder="{{ __('Säg något coolt') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <div class="my-3">
                <input type="file" name="media"class="text-slate-100">
            </div>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Ladda Upp') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>