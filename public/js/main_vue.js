/**
 * Created by Abdykapar on 8/9/2017.
 */
    new Vue({
        el: '#body',
        methods: {
            sure: function () {
                return window.confirm('Are you sure?')
            }
        }
    });
