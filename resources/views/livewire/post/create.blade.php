<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('post.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.post.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="post.name">
        <div class="validation-message">
            {{ $errors->first('post.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.post.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('post.is_featured') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="is_featured" id="is_featured" wire:model.defer="post.is_featured">
        <label class="form-label inline ml-1" for="is_featured">{{ trans('cruds.post.fields.is_featured') }}</label>
        <div class="validation-message">
            {{ $errors->first('post.is_featured') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.post.fields.is_featured_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('post.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.post.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="post.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('post.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.post.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('post.content') ? 'invalid' : '' }}">
        <label class="form-label" for="content">{{ trans('cruds.post.fields.content') }}</label>
        <textarea class="form-control" name="content" id="content" wire:model.defer="post.content" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('post.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.post.fields.content_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('category') ? 'invalid' : '' }}">
        <label class="form-label" for="category">{{ trans('cruds.post.fields.category') }}</label>
        <x-select-list class="form-control" id="category" name="category" wire:model="category" :options="$this->listsForFields['category']" multiple />
        <div class="validation-message">
            {{ $errors->first('category') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.post.fields.category_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('post.comments') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="comments" id="comments" wire:model.defer="post.comments">
        <label class="form-label inline ml-1" for="comments">{{ trans('cruds.post.fields.comments') }}</label>
        <div class="validation-message">
            {{ $errors->first('post.comments') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.post.fields.comments_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('post.status') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.post.fields.status') }}</label>
        <select class="form-control" wire:model="post.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('post.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.post.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.post_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.post.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.posts.storeMedia') }}" collection-name="post_image" max-file-size="6" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.post_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.post.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('post.slug') ? 'invalid' : '' }}">
        <label class="form-label required" for="slug">{{ trans('cruds.post.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" required wire:model.defer="post.slug">
        <div class="validation-message">
            {{ $errors->first('post.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.post.fields.slug_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('post.tags') ? 'invalid' : '' }}">
        <label class="form-label" for="tags">{{ trans('cruds.post.fields.tags') }}</label>
        <input class="form-control" type="text" name="tags" id="tags" wire:model.defer="post.tags">
        <div class="validation-message">
            {{ $errors->first('post.tags') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.post.fields.tags_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>