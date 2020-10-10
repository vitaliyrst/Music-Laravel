<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="group">Выберите группу</label>
                    <select name="group_id" class="form-control" id="group">
                        <option disabled selected>Выберите группу</option>
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}">
                                {{ $group->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="album">Выберите альбом</label>
                    <select name="album_id" class="form-control" id="album">
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Название трека</label>
                    <input name="title" value="{{ $song->title }}"
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
                    <input name="song_number" value="{{ $song->song_number }}"
                           id="song_number"
                           type="text"
                           class="form-control">
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <button type="submit" form="add" class="btn btn-primary btn-block active" role="button"
                                aria-pressed="true">Добавить
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#group').on('change', function () {
            var group_id = $(this).val();
            if (group_id) {
                $.ajax({
                    url: '/cms/ajax/album/' + group_id,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function (data) {
                        console.log(data);
                        $('select[id="album"]').empty();
                        $.each(data, function (key, value) {
                            $('select[id="album"]').append
                            (
                                '<option value="' + value['id'] + '">' + value['title'] + '</option>'
                            )
                        });
                    }
                });
            }
        })
    })
</script>