@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.tag.title_singular') }}:
                    {{ trans('cruds.tag.fields.id') }}
                    {{ $tag->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.tag.fields.id') }}
                            </th>
                            <td>
                                {{ $tag->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.tag.fields.name') }}
                            </th>
                            <td>
                                {{ $tag->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('tag_edit')
                    <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection