<?php

namespace App\Http\Livewire\Post;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Post $post;

    public array $category = [];

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function mount(Post $post)
    {
        $this->post     = $post;
        $this->category = $this->post->category()->pluck('id')->toArray();
        $this->initListsForFields();
        $this->mediaCollections = [
            'post_image' => $post->image,
        ];
    }

    public function render()
    {
        return view('livewire.post.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->post->save();
        $this->post->category()->sync($this->category);
        $this->syncMedia();

        return redirect()->route('admin.posts.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->post->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'post.name' => [
                'string',
                'required',
            ],
            'post.is_featured' => [
                'boolean',
            ],
            'post.description' => [
                'string',
                'nullable',
            ],
            'post.content' => [
                'string',
                'nullable',
            ],
            'category' => [
                'array',
            ],
            'category.*.id' => [
                'integer',
                'exists:categories,id',
            ],
            'post.comments' => [
                'boolean',
            ],
            'post.status' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'mediaCollections.post_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.post_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'post.slug' => [
                'string',
                'required',
            ],
            'post.tags' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['category'] = Category::pluck('name', 'id')->toArray();
        $this->listsForFields['status']   = $this->post::STATUS_SELECT;
    }
}
