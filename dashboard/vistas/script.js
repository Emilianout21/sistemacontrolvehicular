document.addEventListener('DOMContentLoaded', function () {
    const emailContainer = document.getElementById('emailContainer');
    const emailModal = document.getElementById('emailModal');
    const modalContent = document.getElementById('modalContent');
    const closeModal = document.getElementById('closeModal');

    // Obtiene los correos electrónicos de la base de datos
    axios.get('/emails')
        .then(function (response) {
            const emails = response.data;
            emails.forEach(function (email) {
                const emailCard = document.createElement('div');
                emailCard.classList.add('email-card');
                emailCard.innerHTML = `
                    <h3>${email.subject}</h3>
                    <p>${email.sender}</p>
                `;
                emailCard.addEventListener('click', function () {
                    modalContent.innerHTML = `
                        <h2>${email.subject}</h2>
                        <p>${email.sender}</p>
                        <p>${email.message}</p>
                    `;
                    emailModal.style.display = 'block';
                });
                emailContainer.appendChild(emailCard);
            });
        })
        .catch(function (error) {
            console.log(error);
        });

    // Cierra el modal al hacer clic en la 'X'
    closeModal.addEventListener('click', function () {
        emailModal.style.display = 'none';
    });

    // Cierra el modal al hacer clic fuera del contenido
    window.addEventListener('click', function (event) {
        if (event.target === emailModal) {
            emailModal.style.display = 'none';
        }
    });
});
