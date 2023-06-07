<textarea {{ $attributes->merge(['class'=>"p-2 block w-full border border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"]) }}>
    {{ $slot }}
</textarea>
