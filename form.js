const form = document.getElementById("registrationForm");

const validators = {
    name: v => /^[A-Za-z ]+$/.test(v),
    email: v => /^\S+@\S+\.\S+$/.test(v),
    phone: v => /^\d{10}$/.test(v),
    age: v => v >= 18,
    password: v => v.length >= 8,
    confirmPassword: v =>
        v === document.getElementById("password").value && v !== "",
    gender: v => v !== ""
};

function setError(input, message) {
    const group = input.parentElement;
    const small = group.querySelector("small");

    group.classList.remove("success");
    group.classList.add("error");

    group.classList.remove("shake");
    void group.offsetWidth;
    group.classList.add("shake");

    small.innerText = message;
}

function setSuccess(input) {
    const group = input.parentElement;
    const small = group.querySelector("small");

    group.classList.remove("error", "shake");
    group.classList.add("success");
    small.innerText = "";
}

function validateInput(input) {
    const rule = validators[input.id];
    if (!rule(input.value.trim())) {
        setError(input, getMessage(input.id));
        return false;
    } else {
        setSuccess(input);
        return true;
    }
}

function getMessage(id) {
    const messages = {
        name: "Only letters allowed",
        email: "Invalid email format",
        phone: "Enter 10-digit phone number",
        age: "Age must be 18 or above",
        password: "Minimum 8 characters required",
        confirmPassword: "Passwords do not match",
        gender: "Please select gender"
    };
    return messages[id];
}

document.querySelectorAll("input").forEach(input => {
    input.addEventListener("input", () => validateInput(input));
});

document.getElementById("gender").addEventListener("change", e => {
    validateInput(e.target);
});

form.addEventListener("submit", e => {
    e.preventDefault();

    let valid = true;

    Object.keys(validators).forEach(id => {
        const input = document.getElementById(id);
        if (!validateInput(input)) valid = false;
    });

    const terms = document.getElementById("terms");
    const termsError = document.querySelector(".terms-error");

    if (!terms.checked) {
        termsError.innerText = "You must accept the terms";
        valid = false;
    } else {
        termsError.innerText = "";
    }

    if (valid) {
        alert("Form submitted successfully!");
        form.reset();
        document.querySelectorAll(".form-group")
            .forEach(g => g.className = "form-group");
    }
});