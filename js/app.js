var one = new Vue({
    el: '#login',
    data: {
      title: 'Login'
    },
    computed: {
      greet: function(){
        return 'Hallo';
      }
    }
});

var two = new Vue({
    el: '#createaccount',
    data: {
      title: 'Create Account'
    },
    computed: {
      greet: function(){
        return 'Yo dudes, this is app 2 speaking to ya';
      }
    },
    methods: {
      changeTitle: function(){
        one.title = two.title;
      }
    }
});

new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  data: () => ({
    rating: 3
  }),
})