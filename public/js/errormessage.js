document.getElementById('phone').addEventListener('input', function() {
    let phoneNumber = this.value;
    let errorMessage = document.getElementById('error-msg');
    if (phoneNumber.length > 15) {
        errorMessage.textContent = 'Phone number should not exceed 15 digits';
    } else {
        errorMessage.textContent = '';
    }
});
