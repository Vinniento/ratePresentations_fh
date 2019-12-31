/*new Vue({
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
}); */

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
      alert(feedback.feedbackname);   
    },
    removeFeedbackInput(feedback) {
      this.contents.splice(this.contents.indexOf(feedback),1);
    },
    sendData(){
      var formname = document.getElementById("formname").value; 
      alert(formname);
      alert("testuser");
      alert(this.nam);
      $.post("insert_form_into_DB.php",{formname : formname, data: this.nam},
        function(data) {
            switch(data) {
                default:
                    alert(data);
            }
          
        });
      }
    
  }
})








