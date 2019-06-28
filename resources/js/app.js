/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

$(document).ready(function () {
    $("#SortSelector").on("change", function () {
        var url = location.href;
        var value = url.match(/sort=(.\w*)/);
        if (value != null) {
            url = url.replace(value[1], this.value);
        } else {
            if (location.search != "") {
                url = url + "&sort=" + this.value;
            } else {
                url = url + "?sort=" + this.value;
            }
        }
        if ($(this).attr("search") != null) {
            if (url.match(/search=/) == null) {
                var search = $(this).attr("search");
                if (location.search != "") {
                    url = url + "&search=" + search;
                } else {
                    url = url + "?search=" + search;
                }
            }
        }

        if ($("#MinPrice").val().length != 0) {
            if (url.match(/minprice=/) == null) {
                var minprice = $("#MinPrice").val();
                if (location.search != "") {
                    url = url + "&minprice=" + minprice;
                } else {
                    url = url + "?minprice=" + minprice;
                }
            }
        }
        if ($("#MaxPrice").val().length != 0) {
            if (url.match(/maxprice=/) == null) {
                var maxprice = $("#MaxPrice").val();
                if (location.search != "") {
                    url = url + "&maxprice=" + maxprice;
                } else {
                    url = url + "?maxprice=" + maxprice;
                }
            }
        }
        location.href = url;
    });

    function setCartCount(count) {
        $("#CartCount").text(count);
    }

    function addCount(selector, count) {
        var currentCount = $(selector).text();
        if (currentCount == undefined) {
            currentCount = 0;
        }
        currentCount = Number(currentCount);
        currentCount += Number(count);
        $(selector).text(currentCount);
    }

    (function() {
        $.get("/qualitysouvenirs/public/cart/count", function (data, status) {
            if (status == "success") {
                setCartCount(data);
            }
        });

        var selector_value = $('li.nav-item.sort-selector').attr('value');
        $('li.nav-item.sort-selector select').val(selector_value);
    })();

    $('button[id^=AddToCart-]').click(function () {
        var count = this.value;
        var id = $(this).attr("id").match(/AddToCart-(.*)/);
        if (id != null) {
            id = id[1];
        }

        $.ajax({
            url: '/qualitysouvenirs/public/cart/add',
            type: 'post',
            data: {
                id: id,
                count: count
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                addCount('#CartCount', count);
            }
        });
    });
})
