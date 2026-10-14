<x-layouts.app :title="$course->title">

    <h1 class="mb-5"> Comentarios de {{ $course->title }} </h1>

    <ul class="mb-3">

        @foreach($course->comments as $com)
            <li class="mb-5">

                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between mb-1">
                        <!-- Nombre del usuario -->
                        <h4 class="text-sm font-semibold text-gray-900 truncate">
                            {{ $com->user->name }} dice:
                        </h4>
                    </div>

                    <!-- Texto del comentario -->
                    <p class="text-sm text-gray-600">
                        {{ $com->comment }}
                    </p>
                </div>

            </li>
        @endforeach

    </ul>

    <x-enlace href="{{ route('courses.index') }}"> Volver a cursos </x-enlace>

</x-layouts.app>