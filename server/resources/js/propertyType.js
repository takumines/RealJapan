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
    $('#area').on('change', function () {
        let type_val = $(this).val();
        axios.get('/search-property-type', {
            params: {
                areaName: type_val
            }
        }).then(function (response) {
            $('#property_type option').remove();
            $.each(response.data, function (key, value) {
                $('#property_type').append($('<option>').text(value).attr('value', value));
            })
        }).catch(function (error) {
            console.log(error);
        })
    })
})