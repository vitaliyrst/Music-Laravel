<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="group_id">Выберите группу</label>
                    <select name="group_id" class="form-control" id="group_id">
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}"
                                    @if($group->id == $album->group_id) selected @endif>
                                {{ $group->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input name="title" id="title" value="{{ $group->title }}" hidden>
                </div>
                <div class="form-group">
                    <label for="title">Название Альбома</label>
                    <input name="title" value="{{ $album->title }}"
                           id="title"
                           type="text"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="label">Лейбл</label>
                    <input name="label" value="{{ $album->label }}"
                           id="label"
                           type="text"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="release_date">Дата релиза</label>
                    <input name="release_date"
                           value="{{ $album->release_date }}"
                           id="release_date"
                           type="date"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="cover">Загрузка обложки</label>
                    <input name="cover"
                           type="file"
                           id="cover"
                           class="form-control">
                </div>
                <div class="form-group">
                    <img class="album-img img-fluid" src="{{ $album->cover }}">
                </div>
                <div class="form-group">
                    <label for="description">Описание альбома</label>
                    <textarea name="description"
                              id="description"
                              class="form-control"
                              rows="10">{{ $album->description }}
                    </textarea>
                </div>
            </div>
        </div>
    </div>
</div>