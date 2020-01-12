new Vue({
    el: '#test',
    data() {
        return {
            feedbackname: '',
            rangename: '',
            contents: []
        }
    },
    methods: {
        addAnotherRangeInput() {
            const range = {
                rangename: this.rangename, //name here
                type: "range"

            }
            this.contents.push(range);
            this.rangename = '';
            console.log(range);
        },
        removeRangeInput(range) {
            this.contents.splice(this.contents.indexOf(range), 1);
        },
        addAnotherFeedbackInput() {
            const feedback = {
                feedbackname: this.feedbackname,
                type: "feedback"
            }
            this.contents.push(feedback);
            this.feedbackname = '';
            console.log(feedback);
            //  alert(feedback.feedbackname);   
        },
        removeFeedbackInput(feedback) {
            this.contents.splice(this.contents.indexOf(feedback), 1);
        },
        sendData() {
            var formname = document.getElementById("formname").value;
            /* alert(formname);
             alert("testuser");
             alert(this.nam);*/
            $.post("insert_form_into_DB.php", { formname: formname, data: this.contents },
                function(data) {
                    switch (data) {
                        default: alert(data);
                    }

                });
        }

    }
})