<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('assets/js/plugins.js')}}"></script>

<!-- apexcharts -->
<script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<!-- Vector map-->
<script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="{{asset('assets/libs/jsvectormap/maps/world-merc.js')}}"></script>

<!--Swiper slider js-->
<script src="{{asset('assets/libs/swiper/swiper-bundle.min.js')}}"></script>

<!-- Dashboard init -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{asset('assets/js/pages/dashboard-ecommerce.init.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--Toaster Js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>
 <!--select2 cdn-->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script src="{{ asset('assets/js/pages/select2.init.js')}}"></script>
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });

</script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    var Cookie = {
	set: function (name, value, days) {
		var domain, domainParts, date, expires, host;
		if (days) {
			date = new Date();
			date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
			expires = "; expires=" + date.toGMTString();
		} else {
			expires = "";
		}

		host = location.host;
		if (host.split(".").length === 1) {
			// no "." in a domain - it's localhost or something similar
			document.cookie = name + "=" + value + expires + "; path=/";
		} else {
		
			domainParts = host.split(".");
			domainParts.shift();
			domain = "." + domainParts.join(".");

			document.cookie =
				name + "=" + value + expires + "; path=/; domain=" + domain;

			// check if cookie was successfuly set to the given domain
			// (otherwise it was a Top-Level Domain)
			if (Cookie.get(name) == null || Cookie.get(name) != value) {
				// append "." to current domain
				domain = "." + host;
				document.cookie =
					name + "=" + value + expires + "; path=/; domain=" + domain;
			}
		}
	},

	get: function (name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(";");
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == " ") {
				c = c.substring(1, c.length);
			}

			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}
		return null;
	},

	erase: function (name) {
		Cookie.set(name, "", -1);
	}
};

function googleTranslateElementInit() {
	let url = new URL(window.location);
	let lang = url.searchParams.get("lang");
	if (lang) {
		console.log(lang);
		Cookies.set("googtrans", `/en/${lang}`, { path: "" });
		Cookie.set("googtrans", `/en/${lang}`);
		Cookies.set("googtrans", `/en/${lang}`, { path: "", domain: location.host });
	} else {
		Cookie.erase("googtrans");
		Cookies.remove("googtrans", { path: "" });
	}
	new google.translate.TranslateElement({ pageLanguage: "en" }, "translate");
	// add event listener to change url param on language selection change
	let langSelector = document.querySelector(".goog-te-combo");
	langSelector.addEventListener("change", function () {
		let lang = langSelector.value;
		var newurl =
			window.location.protocol +
			"//" +
			window.location.host +
			window.location.pathname +
			"?lang=" +
			lang;
		window.history.pushState({ path: newurl }, "", newurl);
	});
}
document.addEventListener("DOMContentLoaded", function () {
	(function () {
		Cookie.erase("googtrans");
		var googleTranslateScript = document.createElement("script");
		googleTranslateScript.type = "text/javascript";
		googleTranslateScript.async = true;
		googleTranslateScript.src =
			"//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit";
		(
			document.getElementsByTagName("head")[0] ||
			document.getElementsByTagName("body")[0]
		).appendChild(googleTranslateScript);
	})();
});

</script>

