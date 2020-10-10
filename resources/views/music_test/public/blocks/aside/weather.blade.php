<div class="card-header bg-dark">
    <a href="https://yandex.by/pogoda/" class="text-white">Погода</a>
</div>
<div class="card-body">
    <div>Минск
        <img class="weather-img"
             src="{{ 'https://yastatic.net/weather/i/icons/blueye/color/svg/' . $weather['fact']['icon'] . '.svg'}}">
    </div>
    <div>Температура: {{ $weather['fact']['temp'] }} &#8451</div>
    <div>Скорость ветра: {{ $weather['fact']['wind_speed'] }} м/с</div>
</div>