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
  el: 'teacherNavigation',
  data: {
    currentComponent: null,
    componentsArray: ['Add Students', 'Create Groups', 'Rate Groups', 'View Ratings']
  },
  components: {
    'Add Students': {
      template: '#addstudents'
    },
    'Create Groups': {
      template: '#creategroups'
    },
    'Rate Groups': {
      template: '<h3>Rate Groups Component!</h3>'
    },
    'View Ratings': {
      template: '<h3>View Ratings Component!</h3>'
    }
  },
  methods: {
    swapComponent: function(component)
    {
      this.currentComponent = component;
    }
  }
})
