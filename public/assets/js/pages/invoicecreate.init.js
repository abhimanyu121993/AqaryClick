var paymentSign = "$";

function otherPayment() {
    var e = document.getElementById("choices-payment-currency").value;
    paymentSign = e, Array.from(document.getElementsByClassName("product-line-price")).forEach(function (e) {
        isUpdate = e.value.slice(1), e.value = paymentSign + isUpdate
    }), recalculateCart()
}
Array.from(document.getElementsByClassName("product-line-price")).forEach(function (e) {
    e.value = paymentSign + "0.00"
});
var isPaymentEl = document.getElementById("choices-payment-currency"),
    choices = new Choices(isPaymentEl, {
        searchEnabled: !1
    });

function isData() {
    var e = document.getElementsByClassName("plus"),
        t = document.getElementsByClassName("minus");
    e && Array.from(e).forEach(function (n) {
        n.onclick = function (e) {
            var t;
            parseInt(n.previousElementSibling.value) < 10 && (e.target.previousElementSibling.value++, t = n.parentElement.parentElement.previousElementSibling.querySelector(".product-price").value, e = n.parentElement.parentElement.nextElementSibling.querySelector(".product-line-price"), updateQuantity(n.parentElement.querySelector(".product-quantity").value, t, e))
        }
    }), t && Array.from(t).forEach(function (n) {
        n.onclick = function (e) {
            var t;
            1 < parseInt(n.nextElementSibling.value) && (e.target.nextElementSibling.value--, t = n.parentElement.parentElement.previousElementSibling.querySelector(".product-price").value, e = n.parentElement.parentElement.nextElementSibling.querySelector(".product-line-price"), updateQuantity(n.parentElement.querySelector(".product-quantity").value, t, e))
        }
    })
}
document.querySelector("#profile-img-file-input").addEventListener("change", function () {
    var e = document.querySelector(".user-profile-image"),
        t = document.querySelector(".profile-img-file-input").files[0],
        n = new FileReader;
    n.addEventListener("load", function () {
        e.src = n.result
    }, !1), t && n.readAsDataURL(t)
}), flatpickr("#date-field", {
    enableTime: !0,
    dateFormat: "d M, Y, h:i K"
}), isData();

remove();
var taxRate = .125,
    shippingRate = 65,
    discountRate = .15;

function remove() {
    Array.from(document.querySelectorAll(".product-removal a")).forEach(function (e) {
        e.addEventListener("click", function (e) {
            removeItem(e), resetRow()
        })
    })
}

function resetRow() {
    Array.from(document.getElementById("newlink").querySelectorAll("tr")).forEach(function (e, t) {
        t += 1;
        e.querySelector(".product-id").innerHTML = t
    })
}

function recalculateCart() {
    var t = 0;
    Array.from(document.getElementsByClassName("product")).forEach(function (e) {
        Array.from(e.getElementsByClassName("product-line-price")).forEach(function (e) {
            e.value && (t += parseFloat(e.value.slice(1)))
        })
    });
    var e = t * taxRate,
        n = t * discountRate,
        o = 0 < t ? shippingRate : 0,
        a = t + e + o - n;
    document.getElementById("cart-subtotal").value = paymentSign + t.toFixed(2), document.getElementById("cart-tax").value = paymentSign + e.toFixed(2), document.getElementById("cart-shipping").value = paymentSign + o.toFixed(2), document.getElementById("cart-total").value = paymentSign + a.toFixed(2), document.getElementById("cart-discount").value = paymentSign + n.toFixed(2), document.getElementById("totalamountInput").value = paymentSign + a.toFixed(2), document.getElementById("amountTotalPay").value = paymentSign + a.toFixed(2)
}

function amountKeyup() {
    Array.from(document.getElementsByClassName("product-price")).forEach(function (n) {
        n.addEventListener("keyup", function (e) {
            var t = n.parentElement.nextElementSibling.nextElementSibling.querySelector(".product-line-price");
            updateQuantity(e.target.value, n.parentElement.nextElementSibling.querySelector(".product-quantity").value, t)
        })
    })
}

function updateQuantity(e, t, n) {
    t = (t = e * t).toFixed(2);
    n.value = paymentSign + t, recalculateCart()
}

function removeItem(e) {
    e.target.closest("tr").remove(), recalculateCart()
}
amountKeyup();
var genericExamples = document.querySelectorAll("[data-trigger]");

function billingFunction() {
    document.getElementById("same").checked ? (document.getElementById("TenantName").value = document.getElementById("billingName").value, document.getElementById("shippingAddress").value = document.getElementById("billingAddress").value, document.getElementById("shippingPhoneno").value = document.getElementById("billingPhoneno").value, document.getElementById("shippingTaxno").value = document.getElementById("billingTaxno").value) : (document.getElementById("shippingName").value = "", document.getElementById("shippingAddress").value = "", document.getElementById("shippingPhoneno").value = "", document.getElementById("shippingTaxno").value = "")
}
Array.from(genericExamples).forEach(function (e) {
    new Choices(e, {
        placeholderValue: "This is a placeholder set in the config",
        searchPlaceholderValue: "This is a search placeholder"
    })
});
var cleaveBlocks = new Cleave("#cardNumber", {
    blocks: [4, 4, 4, 4],
    uppercase: !0
}),
    genericExamples = document.querySelectorAll('[data-plugin="cleave-phone"]');
Array.from(genericExamples).forEach(function (e) {
    new Cleave(e, {
        delimiters: ["(", ")", "-"],
        blocks: [0, 3, 3, 4]
    })
});
let viewobj;
var value, invoices_list = localStorage.getItem("invoices-list"),
    options = localStorage.getItem("option"),
    invoice_no = localStorage.getItem("invoice_no"),
    invoices = JSON.parse(invoices_list);
if (null === localStorage.getItem("invoice_no") && null === localStorage.getItem("option") ? (viewobj = "", value = "#VL" + Math.floor(11111111 + 99999999 * Math.random()), document.getElementById("invoicenoInput").value = value) : viewobj = invoices.find(e => e.invoice_no === invoice_no), "" != viewobj && "edit-invoice" == options) {
    document.getElementById("registrationNumber").value = viewobj.company_details.legal_registration_no, document.getElementById("companyEmail").value = viewobj.company_details.email, document.getElementById("companyWebsite").value = viewobj.company_details.website, new Cleave("#compnayContactno", {
        prefix: viewobj.company_details.contact_no,
        delimiters: ["(", ")", "-"],
        blocks: [0, 3, 3, 4]
    }), document.getElementById("companyAddress").value = viewobj.company_details.address, document.getElementById("companyaddpostalcode").value = viewobj.company_details.zip_code;
    var preview = document.querySelectorAll(".user-profile-image");
    "" !== viewobj.img && (preview.src = viewobj.img), document.getElementById("invoicenoInput").value = "#VAL" + viewobj.invoice_no, document.getElementById("invoicenoInput").setAttribute("readonly", !0), document.getElementById("date-field").value = viewobj.date, document.getElementById("choices-payment-status").value = viewobj.status, document.getElementById("totalamountInput").value = "$" + viewobj.order_summary.total_amount, document.getElementById("billingName").value = viewobj.billing_address.full_name, document.getElementById("billingAddress").value = viewobj.billing_address.address, new Cleave("#billingPhoneno", {
        prefix: viewobj.company_details.contact_no,
        delimiters: ["(", ")", "-"],
        blocks: [0, 3, 3, 4]
    }), document.getElementById("TenantTaxno").value = viewobj.tenant_address.tax, document.getElementById("TenantName").value = viewobj.tenant_address.full_name, document.getElementById("TenantAddress").value = viewobj.tenant_address.address, new Cleave("#TenantPhoneno", {
        prefix: viewobj.company_details.contact_no,
        delimiters: ["(", ")", "-"],
        blocks: [0, 3, 3, 4]
    }), document.getElementById("LessorTaxno").value = viewobj.billing_address.tax;
    for (var paroducts_list = viewobj.prducts, counter = 1; counter++, 1 < paroducts_list.length && document.getElementById("add-item").click(), paroducts_list.length - 1 >= counter;);
    var counter_1 = 1;
    setTimeout(() => {
        Array.from(paroducts_list).forEach(function (e) {
            document.getElementById("deposite_date-" + counter_1).value = e.product_name, document.getElementById("cheque_remark-" + counter_1).value = e.product_details, document.getElementById("productRate-" + counter_1).value = e.rates, document.getElementById("product-qty-" + counter_1).value = e.quantity, document.getElementById("productPrice-" + counter_1).value = "$" + e.rates * e.quantity, counter_1++
        })
    }, 300), document.getElementById("cart-subtotal").value = "$" + viewobj.order_summary.sub_total, document.getElementById("cart-tax").value = "$" + viewobj.order_summary.estimated_tex, document.getElementById("cart-discount").value = "$" + viewobj.order_summary.discount, document.getElementById("cart-shipping").value = "$" + viewobj.order_summary.shipping_charge, document.getElementById("cart-total").value = "$" + viewobj.order_summary.total_amount, document.getElementById("choices-payment-type").value = viewobj.payment_details.payment_method, document.getElementById("cardholderName").value = viewobj.payment_details.card_holder_name;
    var cleave = new Cleave("#cardNumber", {
        prefix: viewobj.payment_details.card_number,
        delimiter: " ",
        blocks: [4, 4, 4, 4],
        uppercase: !0
    });
    document.getElementById("amountTotalPay").value = "$" + viewobj.order_summary.total_amount, document.getElementById("exampleFormControlTextarea1").value = viewobj.notes
}
document.addEventListener("DOMContentLoaded", function () {
    var T = document.getElementById("invoice_form");
    document.getElementsByClassName("needs-validation");
    T.addEventListener("submit", function (e) {
        e.preventDefault();
        var t = document.getElementById("invoicenoInput").value.slice(4),
            n = document.getElementById("companyEmail").value,
            o = document.getElementById("date-field").value,
            a = document.getElementById("totalamountInput").value.slice(1),
            l = document.getElementById("choices-payment-status").value,
            i = document.getElementById("TenantName").value,
            c = document.getElementById("TenantAddress").value,
            d = document.getElementById("TenantPhoneno").value.replace(/[^0-9]/g, ""),
            r = document.getElementById("TenantTaxno").value,
            u = document.getElementById("LessorName").value,
            m = document.getElementById("LessorAddress").value,
            s = document.getElementById("LessorPhoneno").value.replace(/[^0-9]/g, ""),
            p = document.getElementById("LessorTaxno").value,
            v = document.getElementById("choices-payment-type").value,
            g = document.getElementById("cardholderName").value,
            y = document.getElementById("cardNumber").value.replace(/[^0-9]/g, ""),
            E = document.getElementById("amountTotalPay").value.slice(1),
            b = document.getElementById("registrationNumber").value.replace(/[^0-9]/g, ""),
            I = document.getElementById("companyEmail").value,
            h = document.getElementById("companyWebsite").value,
            _ = document.getElementById("compnayContactno").value.replace(/[^0-9]/g, ""),
            B = document.getElementById("companyAddress").value,
            f = document.getElementById("companyaddpostalcode").value,
            x = document.getElementById("cart-subtotal").value.slice(1),
            w = document.getElementById("cart-tax").value.slice(1),
            S = document.getElementById("cart-discount").value.slice(1),
            j = document.getElementById("cart-shipping").value.slice(1),
            q = document.getElementById("cart-total").value.slice(1),
            A = document.getElementById("exampleFormControlTextarea1").value,
            e = document.getElementsByClassName("product"),
            N = 1,
            C = [];
        Array.from(e).forEach(e => {
            var t = e.querySelector("#deposite_date-" + N).value,
                n = e.querySelector("#cheque_remark-" + N).value,
                o = parseInt(e.querySelector("#productRate-" + N).value),
                a = parseInt(e.querySelector("#product-qty-" + N).value),
                e = e.querySelector("#productPrice-" + N).value.split("$"),
                e = {
                    product_name: t,
                    product_details: n,
                    rates: o,
                    quantity: a,
                    amount: parseInt(e[1])
                };
            C.push(e), N++
        }), !1 === T.checkValidity() ? T.classList.add("was-validated") : ("edit-invoice" == options && invoice_no == t ? (objIndex = invoices.findIndex(e => e.invoice_no == t), invoices[objIndex].invoice_no = t, invoices[objIndex].customer = i, invoices[objIndex].img = "", invoices[objIndex].email = n, invoices[objIndex].date = o, invoices[objIndex].invoice_amount = a, invoices[objIndex].status = l, invoices[objIndex].billing_address = {
            full_name: i,
            address: c,
            phone: d,
            tax: r
        }, invoices[objIndex].shipping_address = {
            full_name: u,
            address: m,
            phone: s,
            tax: p
        }, invoices[objIndex].payment_details = {
            payment_method: v,
            card_holder_name: g,
            card_number: y,
            total_amount: E
        }, invoices[objIndex].company_details = {
            legal_registration_no: b,
            email: I,
            website: h,
            contact_no: _,
            address: B,
            zip_code: f
        }, invoices[objIndex].order_summary = {
            sub_total: x,
            estimated_tex: w,
            discount: S,
            shipping_charge: j,
            total_amount: q
        }, invoices[objIndex].prducts = C, invoices[objIndex].notes = A, localStorage.removeItem("invoices-list"), localStorage.removeItem("option"), localStorage.removeItem("invoice_no"), localStorage.setItem("invoices-list", JSON.stringify(invoices))) : localStorage.setItem("new_data_object", JSON.stringify({
            invoice_no: t,
            customer: i,
            img: "",
            email: n,
            date: o,
            invoice_amount: a,
            status: l,
            billing_address: {
                full_name: i,
                address: c,
                phone: d,
                tax: r
            },
            shipping_address: {
                full_name: u,
                address: m,
                phone: s,
                tax: p
            },
            payment_details: {
                payment_method: v,
                card_holder_name: g,
                card_number: y,
                total_amount: E
            },
            company_details: {
                legal_registration_no: b,
                email: I,
                website: h,
                contact_no: _,
                address: B,
                zip_code: f
            },
            order_summary: {
                sub_total: x,
                estimated_tex: w,
                discount: S,
                shipping_charge: j,
                total_amount: q
            },
            prducts: C,
            notes: A
        })), window.location.href = "apps-invoices-list.html")
    })
});


