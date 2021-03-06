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
    $('#prefecture').on('change', function () {
        let pref_val = $(this).val();
        axios.get('/search-city', {
            params: {
                prefecture: pref_val
            }
        }).then(function (response) {
            $('#city option').remove();
            $.each(response.data, function (key, value) {
                $('#city').append($('<option>').text(value.name).attr('value', value.id));
            })
        }).catch(function (error) {
            console.log(error);
        })
    })
})

