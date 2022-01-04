function onSubmitForm(url) {
    document.getElementById("formAdd").action = url;
    document.getElementById("formAdd").submit();
    return true;
};