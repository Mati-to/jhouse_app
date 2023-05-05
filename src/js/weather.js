const weatherBox = document.querySelector('.weather-box');
const weatherDetails = document.querySelector('.weather-details');
const error = document.querySelector('.weather-notFound');

// API weather requests
const APIKey = 'efe08ebabcd00794d3986b4778416db6';
const lat = 35.65;
const long = 139.83;
const weatherAPI = `https://api.openweathermap.org/data/2.5/weather?q=tokyo&appid=${APIKey}`;

async function getWeatherDay() {
  const response = await fetch(weatherAPI);
  const dataDay = await response.json();

  error.style.display = 'none';
  error.classList.remove('animate__animated', 'animate__fadeIn');

  // Actual day weather
  const image = document.querySelector('.weather-box img');
  const temperature = document.querySelector('.weather-box .temperature');
  const description = document.querySelector('.weather-box .description');
  const humidity = document.querySelector('.humidity-box span');
  const wind = document.querySelector('.wind-box span');

  const weatherImages = {
    'Clear': '../src/img/weather_clear.svg',
    'Rain': '../src/img/weather_rain.svg',
    'Snow': '../src/img/weather_snow.svg',
    'Clouds': '../src/img/weather_clouds.svg',
    'Haze': '../src/img/weather_haze.svg',
    'Mist': '../src/img/weather_haze.svg'
  };

  image.src = weatherImages[dataDay.weather[0].main] || '';

  temperature.innerHTML = `${parseInt(dataDay.main.temp) / 10}<span>°C</span>`;
  description.textContent = `${dataDay.weather[0].description}`;
  humidity.innerHTML = `${dataDay.main.humidity}%`;
  wind.innerHTML = `${dataDay.wind.speed} <span>Km/hr</span>`;

  weatherBox.style.display = '';
  weatherDetails.style.display = '';
  weatherBox.classList.add('animate__animated', 'animated__fadeIn');
  weatherDetails.classList.add('animate__animated', 'animated__fadeIn');

  if(data.cod === 404) {
    weatherBox.style.display = 'none';
    weatherDetails.style.details = 'none';
    error.style.display = 'block';
    error.classList.add('animate__animated', 'animate__fadeIn');
    return;
  }


}

getWeatherDay();