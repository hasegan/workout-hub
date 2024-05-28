$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});

// CODE FOR CATEGORY
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
    // var exist = $("#check-valid-name").text().length;

    // if (exist == 0) {
    //     if (validationFieldForCategory()) {
    var data = $("#add_category").serializeArray();
    $.post("categories", data, function (data) {
        $("#listing_categories").prepend(data);
        $("#add_category").remove();
    });
    //     }
    // }
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
    // if (validationFieldForCategory(id)) {
    var data = $("#edit_category_" + id).serializeArray();

    $.ajax({
        url: "/categories/" + id,
        type: "PUT",
        data: data,
        success: function (result) {
            $("#edit_category_" + id).replaceWith(result);
        },
    });
    // }
}
