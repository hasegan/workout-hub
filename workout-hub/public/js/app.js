$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});

// -------------- CODE FOR CATEGORY -----------

// add form for creating the category
function addCategory() {
    $.get("categories/create", {}, function (data) {
        $("#js_add_category").html(data).addClass("form-group");
    });
}
// close creating form
function cancelCreateCategory() {
    $("#add_category").remove();
}
// store category
function storeCategory() {
    var exist = $("#check-valid-name").text().length;

    if (exist == 0) {
        if (validationFieldForCategory()) {
            var data = $("#add_category").serializeArray();
            $.post("categories", data, function (data) {
                $("#listing_categories").prepend(data);
                $("#add_category").remove();
            });
        }
    }
}
//edit category
function editCategory(id) {
    $.get("categories/" + id + "/edit", {}, function (data) {
        $("#listing_category_" + id).replaceWith(data);
    });
}
// cancel edit
function cancelEditCategory(id) {
    $.get("cancelEditCategory/" + id, {}, function (data) {
        $("#edit_category_" + id).replaceWith(data);
    });
}
//update category
function updateCategory(id) {
    var exist = $("#check-valid-name_" + id).text().length;

    if (exist == 0) {
        if (validationFieldForCategory(id)) {
            var data = $("#edit_category_" + id).serializeArray();

            $.ajax({
                url: "/categories/" + id,
                type: "PUT",
                data: data,
                success: function (result) {
                    $("#edit_category_" + id).replaceWith(result);
                },
            });
        }
    }
}
// verify if the category already exists
function checkExistingCategory(id) {
    if (id) {
        var category = $("#name_" + id).val();
    } else {
        var category = $("#name").val();
    }

    var i = 0;

    if (category != "") {
        $.get("checkExistingCategory/" + category, {}, function (data) {
            if (data == 1) {
                if (id) {
                    $("#check-valid-name_" + id).text("");
                    $("#check-valid-name_" + id).text(
                        "Category already exists."
                    );
                    i++;
                } else {
                    $("#check-valid-name").text("");
                    $("#check-valid-name").text("Category already exists.");
                    i++;
                }
            } else {
                if (id) {
                    $("#check-valid-name_" + id).text("");
                } else {
                    $("#check-valid-name").text("");
                }
            }
            if (i != 0) {
                return true; //
            }
            if (i == 0) {
                return false; //
            }
        });
    }
}

function validationFieldForCategory(id) {
    var i = 0;

    if (id) {
        var name = $("#name_" + id).val();

        if (name == null || name == 0 || name == "") {
            $("#check-name_" + id).text("Name is required");
            i++;
        }
    } else {
        var name = $("#name").val();

        if (name == null || name == 0 || name == "") {
            $("#check-name").text("Name is required");
            i++;
        }
    }

    if (i != 0) {
        return false;
    }
    return true;
}
// remove name warning
function removeWarningForName(id) {
    if ($("input[name$='name']")) {
        if (id) {
            return $("#check-name_" + id).text("");
        }
        return $("#check-name").text("");
    }
}

// -------------- CODE FOR TRAINING -----------
// add creating form
function addTraining() {
    $.get("trainings/create", {}, function (data) {
        $("#js_add_training").html(data).addClass("form-group");
    });
}
// delete creating form
function cancelCreateTraining() {
    $("#add_training").remove();
}
// save category
function storeTraining() {
    var data = $("#add_training").serializeArray();
    $.post("trainings", data, function (data) {
        $("#listing_trainings").prepend(data);
        $("#add_training").remove();
    });
}
// edit training
function editTraining(id) {
    $.get("trainings/" + id + "/edit", {}, function (data) {
        $("#listing_training_" + id).replaceWith(data);
    });
}
// cancel edit
function cancelEditTraining(id) {
    $.get("cancelEditTraining/" + id, {}, function (data) {
        $("#edit_training_" + id).replaceWith(data);
    });
}
// update training
function updateTraining(id) {
    var data = $("#edit_training_" + id).serializeArray();

    $.ajax({
        url: "/trainings/" + id,
        type: "PUT",
        data: data,
        success: function (result) {
            $("#edit_training_" + id).replaceWith(result);
        },
    });
}
