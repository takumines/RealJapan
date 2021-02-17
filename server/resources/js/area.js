const axiosBase = require('axios');
const axios = axiosBase.create({
    baseURL: 'http://localhost:80',
    headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    },
    responseType: 'json'
});

$(function (){
    $('#city').on('change', function () {
        let city_val = $(this).val();
        axios.get('/search-area', {
            params: {
                city: city_val
            }
        }).then(function (response) {
            $('#area option').remove();
            $.each(response.data, function (key, value) {
                $('#area').append($('<option>').text(value).attr('value', value));
            })
        }).catch(function (error) {
            console.log(error);
        })
    })
})