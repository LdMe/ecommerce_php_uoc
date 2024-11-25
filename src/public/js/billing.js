function unselectBillings() {
    const billings = document.querySelectorAll(".billing-list :not(thead) tr");
    billings.forEach(billing => {
        billing.classList.remove("selected");
    });
}
document.addEventListener('DOMContentLoaded', function () {
    const billings = document.querySelectorAll(".billing-list :not(thead) tr");
    billings.forEach(billing => {
        billing.addEventListener("click", () => {
            const email = billing.querySelector(".billing-email").textContent;
            const address = billing.querySelector(".billing-address").textContent;
            const phone = billing.querySelector(".billing-tel").textContent;
            document.querySelector(".billing-form input[name=email]").value = email;
            document.querySelector(".billing-form input[name=address]").value = address;
            document.querySelector(".billing-form input[name=phone]").value = phone;
            unselectBillings();
            billing.classList.add("selected");

        });
    });
    const inputs = document.querySelectorAll(".billing-form input");
    inputs.forEach(input => {
        input.addEventListener("input", () => {
            unselectBillings();
        });
    });

});