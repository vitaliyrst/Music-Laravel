<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="group_id">Выберите группу</label>
                    <select name="group_id" class="form-control" id="group_id">
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}"
                                    @if($group->id == $singer->group_id) selected @endif>
                                {{ $group->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input name="title" id="title" value="{{ $group->title }}" hidden>
                </div>
                <div class="form-group">
                    <label for="name">Имя исполнителя</label>
                    <input name="name" value="{{ $singer->name }}"
                           id="name"
                           type="text"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="position">Роль в группе</label>
                    <input name="position" value="{{ $singer->position }}"
                           id="position"
                           type="text"
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
                    <label for="description">Описание исполнителя</label>
                    <textarea name="description"
                              id="description"
                              class="form-control"
                              rows="10">{{ $singer->description }}
                    </textarea>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <button type="submit" form="add"
                                class="btn btn-primary btn-block active" role="button" aria-pressed="true">Добавить
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>