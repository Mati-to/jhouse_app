const weatherBox = document.querySelector('.weather-box');
const weatherDetails = document.querySelector('.weather-details');
const error = document.querySelector('.weather-notFound');


const APIKey = 'efe08ebabcd00794d3986b4778416db6';
const lat = 35.65;
const long = 139.83;
const weatherAPI5Days = `api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${long}&appid=${APIKey}`;



async function getWeatherDay() {
  const response = await fetch(weatherAPI);
  const data = await response.json();
  console.log(data)

  if (data.cod === 404) {
    weatherBox.style.display = 'none';
    weatherDetails.style.details = 'none';
    error.style.display = 'block';
    error.classList.add('animate__animated', 'animate__fadeIn');
    return;
  }

  // error.style.display = 'none';
  // error.classList.remove('animate__animated', 'animate__fadeIn');

  const image = document.querySelector('.weather-box img');
  const temperature = document.querySelector('.weather-box .temperature');
  const description = document.querySelector('.weather-box .description');
  const humidity = document.querySelector('.span-humidity');
  const wind = document.querySelector('.weather-box .wind .span-wind');

  switch (data.weather[0].main) {
    case 'Clear': image.src = '../src/img/weather_clear.svg';
      break;
    case 'Rain': image.src = '../src/img/weather_rain.svg';
      break;
    case 'Snow': image.src = '../src/img/weather_snow.svg';
      break;
    case 'Clouds': image.src = '../src/img/weather_clouds.svg';
      break;
    case 'Haze': image.src = '../src/img/weather_haze.svg';
      break;
    case 'Mist': image.src = '../src/img/weather_haze.svg';
      break;

    default: image.src = '';
  }

  temperature.innerHTML = `${parseInt(data.main.temp) / 10}<span>°C</span>`;
  description.innerHTML = `${data.weather[0].description}`;
  humidity.innerHTML = `${data.main.humidity}%`;
  wind.innerHTML = `${parseInt(data.wind.speed)}Km/h`;

  weatherBox.style.display = '';
  weatherDetails.style.display = '';
  weatherBox.classList.add('animate__animated', 'animated__fadeIn');
  weatherDetails.classList.add('animate__animated', 'animated__fadeIn');
}

getWeatherDay();