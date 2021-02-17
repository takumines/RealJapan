require('./bootstrap');

require('alpinejs');

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