@csrf
@method('delete')
<button type="submit" {{ $attributes->merge(["class" => "text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"]) }}>
    <i class="fas fa-lg fa-trash-alt"></i>
</button>
