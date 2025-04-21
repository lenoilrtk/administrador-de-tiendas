<x-layouts.app>
    <div class="mb-4 flex justify-between items-center" >
        <flux:breadcrumbs class="mb-8" >
            <flux:breadcrumbs.item :href="route('dashboard')">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item >Categories</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <a href="{{route('admin.categories.create')}}" class="btn btn-blue">+</a>    
    </div>
    

<div class="relative overflow-x-auto">
    <table id="categories-table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">Nombre</th>
                <th scope="col" class="px-6 py-3" width="10px">Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$category->id}}
                    </th>
                    <td class="px-6 py-4">{{$category->name}}</td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <a href="{{route('admin.categories.edit', $category)}}" class="btn btn-blue text-xs">Editar</a>
                            <form class="delete-form" action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-red text-xs">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@push('js')
    <script>
        $(document).ready(function() {
            $('#categories-table').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json' // Traducción al español
                }
            });

            // SweetAlert para confirmación de eliminación
            forms = document.querySelectorAll('.delete-form');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminar!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    })
                });
            });
        });
    </script>
@endpush
</x-layouts.app>