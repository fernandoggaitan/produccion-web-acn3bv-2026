<x-layouts.app title="Editar curso">

    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">      
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.update', $course) }}" method="post">
        
        @csrf
        @method('PUT')

        <flux:input
            name="title"
            :label="__('Título')"
            type="text"
            placeholder="Ingrese el título del curso"
            class="mb-3"
            :value="old('title', $course->title)"
        />
        <flux:input
            name="price"
            :label="__('Precio')"
            type="number"
            placeholder="Ingrese el precio del curso"
            class="mb-3"
            :value="old('title', $course->price)"
        />
        <flux:textarea
            name="description"
            :label="__('Descripción')"
            placeholder="Ingrese la descripción del curso"
            class="mb-3">{{ old('description', $course->description) }}</flux:textarea>
        <x-btn-submit> Modificar </x-btn-submit>
        <x-enlace href="{{ route('courses.index') }}"> Volver a cursos </x-enlace>
    </form>

</x-layouts.app>