<x-layouts.app :title="$title">

    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <x-enlace href="{{ route('courses.create') }}"> Agregar curso nuevo </x-enlace>
    
    <form action="{{ route('courses.index') }}" method="get" class="my-5">
        <flux:input
            name="search"
            :label="__('Texto a buscar')"
            type="text"
            placeholder="Ingrese el título o la descripción del curso"
            class="mb-3"
            value="{{ $search }}"
        />
        <x-btn-submit> Buscar </x-btn-submit>
        <x-enlace href="{{ route('courses.index') }}"> Limpiar </x-enlace>
    </form>

    <div class="overflow-x-auto shadow-md rounded-lg border border-gray-200 my-4">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 whitespace-nowrap">ID</th>
                    <th scope="col" class="px-6 py-3">Título</th>
                    <th scope="col" class="px-6 py-3 whitespace-nowrap">Precio</th>
                    <th scope="col" class="px-6 py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $c)
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"> {{ $c->id }} </td>
                        <td class="px-6 py-4 w-full"> {{ $c->title }} </td>
                        <td class="px-6 py-4 whitespace-nowrap">${{ $c->price_format() }}</td>    
                        
                        <!-- Creada una sola celda para las acciones juntas -->
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div class="flex items-center justify-end gap-3">
                                <x-enlace href="{{ route('courses.show', $c) }}"> Ver comentarios </x-enlace>
                                <x-enlace href="{{ route('courses.edit', $c) }}"> Editar </x-enlace>
                                <form action="{{ route('courses.destroy', $c) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <x-btn-delete> Eliminar </x-btn-delete>
                                </form>
                            </div>
                        </td> 
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $courses->links() }}
    </div>

</x-layouts.app>