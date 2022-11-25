<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Weather Forecast</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles: Normalize -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <!-- Styles: Application TODO move to CSS file -->
        <style>
            :root {
                --widget-border-color: #999;
            }
            body {
                font-family: 'Nunito', sans-serif;
                padding: 10px;
            }
            select {
                background-color: powderblue;
                margin: 1px;
                padding: 2px;
                border: 2px outset var(--widget-border-color);
                border-radius: 4px;
            }
            select option:first-of-type {
                display: none;
            }
            #report,
            #forecast {
                margin-top: 20px;
                background-color: #eee;
                padding: 20px;
                border: 1px solid black;
            }
            #weather-form input[type=button] {
                background-color: powderblue;
                margin: 1px;
                padding: 2px;
                width: 70px;
                border: 2px outset var(--widget-border-color);
                border-radius: 4px;
            }
            #weather-form input[type=button]:active {
                border-style: inset;
            }
            .initial-hidden {
                display: none;
            }
            .weather-report {
                border-collapse: collapse;
            }
            .weather-report th,
            .weather-report td {
                border: 1px solid #333;
                padding: 3px;
                background-color: inherit;
            }
            .weather-report tr:nth-child(2n+3) {
                background-color: #bbb;
            }
        </style>

        <!-- Scripts: jQuery -->
        <script
            src="//code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
            crossorigin="anonymous"
        ></script>

        <!-- Scripts: application TODO move to JS file -->
        <script>
            let decodeElement = document.createElement('div');
            let $forecast;
            let $report;
            let $citySelect;

            console.log("{{ asset('js/app.js') }}");

            function htmlDecode(input) {
                decodeElement.innerHTML = input;
                return decodeElement.childNodes[0].nodeValue;
            }

            function displayForecast(forecast) {
                $report.hide();
                if (typeof(forecast) === 'object' &&
                    forecast !== null &&
                    Object.keys(forecast).length
                ) {
                    $forecast.html(`
                        <p>
                            City: ${forecast.city}
                            <br>
                            Temperature: ${forecast.temperature} °C
                            <br>
                            Wind: force ${forecast.wind.force} Bft, from ${forecast.wind.direction}
                        </p>
                        <p>
                            Weather advice: ${forecast.advice}
                        </p>
                    `).show();
                } else {
                    $forecast.hide();
                }
            }

            function displayReport(forecasts) {
                $forecast.hide();
                if (Array.isArray(forecasts) &&
                    forecasts.length > 0
                ) {
                    console.log('forecasts:', forecasts); // TODO
                    let htmlString = `
                        <h2>City: ${forecasts[0].city}</h2>
                        <table class="weather-report">
                            <tr><th>Time</th><th>Temperature</th><th colspan=2>Wind</th><th>Advice</th></tr>
                            <tr><th>(UTC)</th><th>(°C)</th><th>Force (Bft)</th><th>Direction</th><th></th></tr>
                        `;
                    for (let forecast of forecasts) {
                        htmlString += `
                            <tr>
                                <td>${forecast.created_at}</td>
                                <td>${forecast.temperature}</td>
                                <td>${forecast.wind_force}</td>
                                <td>${forecast.wind_direction}</td>
                                <td>${forecast.advice.description}</td>
                            </tr>
                        `;
                    }
                    htmlString += '</table>';
                    $report.html(htmlString).show();
                } else {
                    $report.hide();
                }
            }

            function getForecast(city) {
                try {
                    jQuery.get(`${window.location.origin}/api/weather?city=${city}`, function (result, status, _jqXHR) {
                        if (status === 'success') {
                            displayForecast(result);
                        } else {
                            $forecast.hide();
                        }
                    });
                } catch (e) {
                    $forecast.hide();
                }
            }

            function getReport(city) {
                try {
                    jQuery.get(`${window.location.origin}/api/weather/report?city=${city}`, function (result, status, _jqXHR) {
                        if (status === 'success') {
                            displayReport(result);
                        } else {
                            $report.hide();
                        }
                    });
                } catch (e) {
                    $report.hide();
                }
            }

            jQuery(document).ready(function () {
                $forecast = jQuery('#forecast');
                $report = jQuery('#report');
                $citySelect = jQuery('#city');
                $forecastBtn = jQuery('#forecast-btn');
                $reportBtn = jQuery('#report-btn');
                $forecastBtn.click((_event) => getForecast($citySelect.val()));
                $reportBtn.click((_event) => getReport($citySelect.val()));
                // struggling with htmlencoded entities; FIXME
                //let forecast = htmlDecode('{{ json_encode($forecast) }}');
                //displayForecast(forecast);
                getForecast($citySelect.val());
            });
        </script>
    </head>
    <body class="antialiased">

        <h1>Weather Forecast: What's the Weather Like?</h1>

        <div id="weather-form">
            About the weather in:
            <select id="city" name="city">
                <option value="">Please select</option>
                @foreach ($cities as $city)
                    <option
                        value="{{ $city }}"
                        {{ ($city === $current_city) ? 'selected' : '' }}
                    >{{ $city }}</option>
                @endforeach
            </select>
            Get:
            <input type="button" id="forecast-btn" value="forecast">
            <input type="button" id="report-btn" value="report">
        </div>

        <div id="forecast" class="initial-hidden"></div>
        <div id="report" class="initial-hidden"></div>

    </body>
</html>
