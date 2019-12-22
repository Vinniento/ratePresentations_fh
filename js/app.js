// new Vue({
//   el: 'teacherNavigation',
//   data: {
//     currentComponent: null,
//     componentsArray: ['Add Students', 'Create Groups', 'Create Survey', 'Add Group to Survey', 'Rate Groups', 'View Ratings', 'Create Rating']
//   },
//   components: {
//     'Add Students': {
//       template: '#addstudents'
//     },
//     'Create Groups': {
//       template: '#creategroups'
//     },
//     'Create Survey': {
//       template: '<h3>link to create survey formuluar!</h3>'
//     },
//     'Add Group to Survey': {
//       template: '<h3>add group to survey here</h3>'
//     },
//     'Rate Groups': {
//       template: '<h3>Rate Groups Component - show list of all groups and click on them to rate as a teacher!</h3>'
//     },
//     'View Ratings': {
//       template: '<h3>View Ratings Component!</h3>'
//     },
//     'Create Rating': {
//       template: '<h3>Create Ratings Component!</h3>'
//     }
//   },
//   methods: {
//     swapComponent: function(component)
//     {
//       this.currentComponent = component;
//     }
//   }
// })

new Vue({
  el: '#createRating',
  data: {
    ranges: [],
    texts: [],
    sections: []
  },
  methods: {
    addRange: function() {
      var elem = document.createElement("tr");
      this.ranges.push({
        question: "",
        slider: ""
      });
    },
    addText: function() {
      var elem = document.createElement("tr");
      this.texts.push({
        feedback: "",
        text: ""
      });
    },
    addSection: function() {
      var elem = document.createElement("tr");
      this.sections.push({
        sectionname: "",
        sectiontest: ""
      });

    },
    removeRange: function(index) {
      this.ranges.splice(index, 1)
    },
    removeText: function(index) {
      this.texts.splice(index, 1)
    },
    removeSection: function(index) {
      this.sections.splice(index, 1)
    }
  }
});

new Vue({
  el: '#test',
  data () {
    return {
      rangename: '',
      feedbackname: '',
      contents: [],
      nam:[]
    }
  },
  methods:{
    addAnotherRangeInput(){      
      const range = {
        rangename: this.rangename, //name here
      }      
      this.contents.push(range);  
      this.nam.push(range.rangename);     
      this.rangename='';                  
      alert(range.rangename);    
    },
    removeRangeInput(range) {
      this.contents.splice(this.contents.indexOf(range),1);
    },
    addAnotherFeedbackInput(){
      const feedback = {
        feedbackname: this.feedbackname,
      }
      this.contents.push(feedback);
      this.nam.push(feedback.feedbackname);
      this.feedbackname='';
    },
    removeFeedbackInput(feedback) {
      this.contents.splice(this.contents.indexOf(feedback),1);
    },
    sentdata(){
      alert("test");
      alert(this.nam);
      $.post("create_pres.php",{ data: this.nam},
        function(data) {
            switch(data) {
              /*  case"no such user":
                    $('input[type="email"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
                    $('input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
                    alert(data);
                    break;
                case"email or password wrong":
                $('input[type="text"],input[type="password"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
                alert(data);
                case"password successfully changed":
                    $("form")[0].reset();
                    $('input[type="text"],input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
                    alert(data);
                   // window.location = "ch.php";
                    break;*/
                
                default:
                    alert(data);
                   /// alert("fehler");
            }
          
        });
      }
    
  }
})








