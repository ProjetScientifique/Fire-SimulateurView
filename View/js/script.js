
var URL = 'http://localhost:8000'
var TOKEN = '449928d774153132c2c3509647e3d23f8e168fb50660fa27dd33c8342735b166'
skip = 0
limit = 1000

function getIncidents() {
    let requestURL = `${URL}/incidents/?token_api=${TOKEN}&skip=${skip}&limit=${limit}`;
    let request = new XMLHttpRequest();
      request.open("GET", requestURL);
      request.send();
      request.onload = () => {
        if (request.status === 200) {
          // by default the response comes in the string format, we need to parse the data into JSON
          return JSON.parse(request.response);
        } else {
          console.log(`error ${request.status} ${request.statusText}`);
          return []
        }
      };
}
function getDetecteurs() {
    let requestURL = `${URL}/detecteurs/?token_api=${TOKEN}&skip=${skip}&limit=${limit}`;
    let request = new XMLHttpRequest();
      request.open("GET", requestURL);
      request.send();
      request.onload = () => {
        if (request.status === 200) {
          // by default the response comes in the string format, we need to parse the data into JSON
          return JSON.parse(request.response);
        } else {
          console.log(`error ${request.status} ${request.statusText}`);
          return []
        }
      };
}
