// khởi tạo hàm chức năng

function setFormMessage(formElement, type, message) {
    const messageElement = formElement.querySelector(".form__message");

    messageElement.textContent = message;
    messageElement.classList.remove("form__message--success", "form__message--error");
    messageElement.classList.add(`form__message--${type}`);
}

function setInputError(inputElement, message) {
    inputElement.classList.add("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = message;
}

function clearInputError(inputElement) {
    inputElement.classList.remove("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = "";
}

document.addEventListener("DOMContentLoaded", () => {
    // khai báo biến
    const createAccount = document.querySelector("#createAccount");
    const username = document.querySelector("#username");
    let usernameValue = null;

    // lấy giá trị username và kiểm tra với username được nhập.
    username.addEventListener('blur', (e) => {
        usernameValue = username.value;

        // duyệt vòng lập kiểm tra nếu, đã tồn tại username thì in ra lỗi, nếu không sẽ không setError
        users.forEach(user => {
            if (user.username === usernameValue) {
                setInputError(username, "Vui lòng chọn tên tài khoản khác!");
            }
        });
    });

    // set lỗi
    document.querySelectorAll(".form__input").forEach(inputElement => {
        inputElement.addEventListener("blur", e => {
            if (e.target.id === "username" && e.target.value.length > 0 && e.target.value.length < 10) {
                setInputError(inputElement, "Username must be at least 10 characters in length");
            }
        });

        inputElement.addEventListener("input", e => {
            clearInputError(inputElement);
        });
    });
});