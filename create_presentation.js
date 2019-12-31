function addCheckedGroupsToArray() {
    var form = document.getElementById("selected_groups");
    inputs = form.getElementsByTagName("input");
    selected_groups = [];

    for (var i = 0, max = inputs.length; i < max; i += 1) {
        if (inputs[i].type === "checkbox" && inputs[i].checked) {
            selected_groups.push(inputs[i].id);
        }
    }
    return selected_groups;
}

function addSelectedForm() {
    var form = document.getElementById("selected_form");
    inputs = form.getElementsByTagName("input");
    for (var i = 0, max = inputs.length; i < max; i += 1) {
        if (inputs[i].type === "radio" && inputs[i].checked) {
            return (inputs[i].id);
        }
    }    
}

function insertPresentationIntoDB() {
    var presentation_date = document.getElementById("presentation_date").value;
    var selected_groups = addCheckedGroupsToArray();
    var selected_form = addSelectedForm();

    $.post("create_presentation.php", {
            selected_groups: selected_groups,
            selected_form: selected_form,
            presentation_date: presentation_date
        },
        //TODO form zurücksetzen (hackerl weg usw)
        function(data) {
            switch(data){
                case"presentation was successfully created":
                    alert(data);
                    break;
                case"You have to chose a group, form and a presentation date! One of them isn't chosen.":
                    alert(data);
                    break;
                    
                default:
                    alert();
            }
        }

    )
};