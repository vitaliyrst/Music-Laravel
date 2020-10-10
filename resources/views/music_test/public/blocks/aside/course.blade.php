<div class="card-header bg-dark">
    <a href="https://www.nbrb.by/statistics/rates/ratesdaily.asp" class="text-white">Курсы валют</a>
</div>
<div class="card-body">
    <p><img class="course-img" src="/storage/course/USD.svg">
        {{ $course[4]['Cur_Scale'] . '  ' . $course[4]['Cur_Abbreviation'] . ' - ' . $course[4]['Cur_OfficialRate']}}</p>
    <p><img class="course-img" src="/storage/course/EUR.svg">
        {{ $course[5]['Cur_Scale'] . '  ' . $course[5]['Cur_Abbreviation'] . ' - ' . $course[5]['Cur_OfficialRate']}}</p>
    <p><img class="course-img" src="/storage/course/RUR.png">
        {{ $course[16]['Cur_Scale'] . '  ' . $course[16]['Cur_Abbreviation'] . ' - ' . $course[16]['Cur_OfficialRate']}}</p>
</div>
<div class="card-footer">
    <small class="text-muted float-right">{{ \Carbon\Carbon::now()->format('H:i / d-m-Y')}}</small>
</div>
