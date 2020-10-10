<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="group_id">Выберите группу</label>
                    <select name="group_id" class="form-control" id="group_id">
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}"
                                @if($group->id == $song->album->group_id) selected @endif>
                                {{ $group->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="album">Выберите альбом</label>
                    <select name="album_id" class="form-control" id="album">
                        @foreach($albums as $album)
                            <option value="{{ $album->id }}"
                                    @if($album->id == $song->album_id) selected @endif>
                                {{ $album->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Название трека</label>
                    <input name="title"
                           value="{{ $song->title }}"
                           id="title"
                           type="text"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="duration">Длительность</label>
                    <input name="duration"
                           value="{{ $song->duration }}"
                           id="duration"
                           type="time"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="song_number">Порядок трека в альбоме</label>
                    <input name="song_number"
                           value="{{ $song->song_number }}"
                           id="song_number"
                           type="text"
                           class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>
