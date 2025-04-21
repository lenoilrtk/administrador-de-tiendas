<x-layouts.app>
    <flux:breadcrumbs class="mb-8" >
            <flux:breadcrumbs.item :href="route('dashboard')">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.categories.index')">Categories</flux:breadcrumbs.item>
            <flux:breadcrumbs.item >Nuevo</flux:breadcrumbs.item>
        </flux:breadcrumbs>

    <div class="card">
        <form action="{{route('admin.categories.store')}}" method="POST">
            @csrf
            
            <flux:input name="name" label="Nombre" value="{{old('name')}}" placeholder="Nombre de la categoria" required />
            <div class="flex justify-end mt-2">
                <flux:button variant="primary" type="submit">Crear</flux:button>
                        
            </div>

        </form>
    </div>
</x-layouts.app>