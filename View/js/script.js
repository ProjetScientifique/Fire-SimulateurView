
var URL = 'http://192.168.5.183:8000'
var TOKEN = '449928d774153132c2c3509647e3d23f8e168fb50660fa27dd33c8342735b166'
skip = 0
limit = 1000

function getIncident() {
    let requestURL = `${URL}/incidents/?token_api=${TOKEN}&skip=${skip}&limit=${limit}`;
    axios
        .get(requestURL)
        .then(response => {
          console.log(response.data);
        })
        .catch(error => console.error(error));
}
