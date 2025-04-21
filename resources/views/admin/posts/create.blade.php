<x-layouts.app>
    <flux:breadcrumbs class="mb-8" >
            <flux:breadcrumbs.item :href="route('dashboard')">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.posts.index')">Posts</flux:breadcrumbs.item>
            <flux:breadcrumbs.item >Nuevo</flux:breadcrumbs.item>
        </flux:breadcrumbs>

    <div class="card">
        <form action="{{route('admin.posts.store')}}" method="POST" class="space-y-4">
            @csrf
            
            <flux:input name="title" label="Titulo" value="{{old('title')}}" 
            oninput="string_to_slug(this.value, '#slug')"
            placeholder="Escribe el titulo del post" required />

            <flux:input name="slug" id="slug" label="Slug" value="{{old('slug')}}" 
            placeholder="Escribe el slug del post" required />

            <flux:select wire:model="industry" placeholder="Elige la categoria del post" label="Categoria" name="category_id" required>
                @foreach ($categories as $category)
                    <flux:select.option :value="$category->id">{{ $category->name }}</flux:select.option>
                @endforeach    
            </flux:select>

            <div class="flex justify-end">
                <flux:button variant="primary" type="submit">Crear</flux:button>
                        
            </div>

        </form>
    </div>
</x-layouts.app>