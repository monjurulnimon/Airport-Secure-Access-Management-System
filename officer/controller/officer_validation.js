function validateOfficerAction(form) {
    const remarks = form.querySelector('textarea[name="remarks"]');

    if (!remarks || remarks.value.trim() === "") {
        alert("Officer remarks cannot be empty");
        remarks.focus();
        return false;
    }

    if (remarks.value.trim().length < 5) {
        alert("Remarks must be at least 5 characters");
        remarks.focus();
        return false;
    }

    return true;
}
