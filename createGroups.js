function addCheckedStudentsToArray() {
    var form = document.getElementById("selected_students");
    inputs = form.getElementsByTagName("input");
    arr = [];

    for (var i = 0, max = inputs.length; i < max; i += 1) {
        if (inputs[i].type === "checkbox" && inputs[i].checked) {
            arr.push(inputs[i].id);
        }
    }
    // alert(JSON.stringify(arr, null, 4));

    insertGroupIntoDB();
}

function insertGroupIntoDB() {
    var groupname = document.getElementById("groupname").value;
    $.post("insertGroupIntoDB.php", {
            groupname: groupname,
            selectedStudents: arr
        },
        //TODO form zurücksetzen (hackerl weg usw)
        function(data) {
            switch(data){
                case"students not selected or groupname not entered":
                    alert(data);
                    break;
                case"group created and students successfully added":
                    alert(data);
                    break;
                default:
                    alert(data);
            }
        }

    )
};