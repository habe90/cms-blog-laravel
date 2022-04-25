<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    public Category $category;

    public array $listsForFields = [];

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.category.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->category->save();

        return redirect()->route('admin.categories.index');
    }

    protected function rules(): array
    {
        return [
            'category.name' => [
                'string',
                'required',
                'unique:categories,name,' . $this->category->id,
            ],
            'category.slug' => [
                'string',
                'required',
            ],
            'category.description' => [
                'string',
                'nullable',
            ],
            'category.is_default' => [
                'boolean',
            ],
            'category.icon' => [
                'string',
                'nullable',
            ],
            'category.order' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'category.is_featured' => [
                'boolean',
            ],
            'category.parent_id' => [
                'integer',
                'exists:categories,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['parent'] = Category::pluck('name', 'id')->toArray();
    }
}
