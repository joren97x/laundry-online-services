document.addEventListener('DOMContentLoaded', () => {
    if(localStorage.getItem('checkout_modal_opened')) {
        setWeightInModal()
        document.getElementById('bbtn').click()
    }
    const paymentMethodSelect = document.getElementById('payment-method');
    const popup = document.getElementById('popup');
    

    paymentMethodSelect.addEventListener('change', () => {
        if (paymentMethodSelect.value === 'gcash') {
            popup.style.display = 'flex';
        } else {
            popup.style.display = 'none';
        }
    });

    // close.addEventListener('click', () => {
    //     popup.style.display = 'none';
    // });

    window.addEventListener('click', (event) => {
        if (event.target === popup) {
            popup.style.display = 'none';
        }
    });
});  
