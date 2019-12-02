$(document).ready(function () {
    $("#name").blur(function(e) {
        var name = $("#name").val();
        if(name == "") {
            var $err = $("<span>", {"class": "error-text", html: "Empty Name"});
            $("#name").addClass("error");
            $("#name-container").append($err);
        }
        else if(!name.match(/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/)) {
            var $err = $("<span>", {"class": "error-text", html: "Invalid Name"});
            $("#name").addClass("error");
            $("#name-container").append($err);
        }
    });
    $("#name").focusin(function(e) {
        $("#name").removeClass("error");
        $("#name-container .error-text").remove();
    });
    $("#username").blur(function(e) {
        var username = $("#username").val();
        if(username == "") {
            var $err = $("<span>", {"class": "error-text", html: "Empty Username"});
            $("#username").addClass("error");
            $("#username-container").append($err);
        }               
    });
    $("#username").focusin(function(e) {
        $("#username").removeClass("error");
        $("#username-container .error-text").remove();
    });
    $("#email").blur(function(e) {
        var email = $("#email").val();
        if(email == "") {
            var $err = $("<span>", {"class": "error-text", html: "Empty Email"});
            $("#email").addClass("error");
            $("#email-container").append($err);
        }
        else if(!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
            var $err = $("<span>", {"class": "error-text", html: "Invalid Email"});
            $("#email").addClass("error");
            $("#email-container").append($err);
        }
    });
    $("#email").focusin(function(e) {
        $("#email").removeClass("error");
        $("#email-container .error-text").remove();
    });
    $("#email-confirm").blur(function(e) {
        var email = $("#email").val();
        var emconfirm = $("#email-confirm").val();
        if(emconfirm == "") {
            var $err = $("<span>", {"class": "error-text", html: "Email Confirm Empty"});
            $("#email-confirm").addClass("error");
            $("#email-confirm-container").append($err);
        }
        else if(email != emconfirm) {
            var $err = $("<span>", {"class": "error-text", html: "Emails Don't Match"});
            $("#email-confirm").addClass("error");
            $("#email-confirm-container").append($err);
        }
    });
    $("#email-confirm").focusin(function(e) {
        $("#email-confirm").removeClass("error");
        $("#email-confirm-container .error-text").remove();
    });
    $("#password").blur(function(e) {
        var password = $("#password").val();
        if(password == "") {
            var $err = $("<span>", {"class": "error-text", html: "Empty Password"});
            $("#password").addClass("error");
            $("#password-container").append($err);
        }
        else if(password.length < 8) {
            var $err = $("<span>", {"class": "error-text", html: "Must Be At Least 8 Characters"});
            $("#password").addClass("error");
            $("#password-container").append($err);
        }
    });
    $("#password").focusin(function(e) {
        $("#password").removeClass("error");
        $("#password-container .error-text").remove();
    });
    $("#password").on("input", function(e) {
        var password = $("#password").val();
        var ticks = 0;
        $(".tick").removeClass("highlight");
        if(password.length >= 8) {
            ticks++;
        }
        if(password.match(/[a-z]+/)) {
            ticks++;
        }
        if(password.match(/[A-Z]+/)) {
            ticks++;
        }
        if(password.match(/\d+/)) {
            ticks++;
        }
        if(password.match(/[!@#$%^&*(),.?":{}|<>]+/)) {
            ticks++;
        }
        if(password.length >= 12) {
            ticks++;
        }
        if(password.length >= 16) {
            ticks++;
        }
        if(password.length >= 32) {
            ticks++;
        }
        if(password.length >= 64) {
            ticks++;
        }
        if(password.length >= 128) {
            ticks++;
        }
        highlightTicks(ticks);
    });
    $("#password-confirm").blur(function(e) {
        var password = $("#password").val();
        var passconfirm = $("#password-confirm").val();
        if(passconfirm == "") {
            var $err = $("<span>", {"class": "error-text", html: "Password Confirm Empty"});
            $("#password-confirm").addClass("error");
            $("#password-confirm-container").append($err);
        }
        else if(password != passconfirm) {
            var $err = $("<span>", {"class": "error-text", html: "Passwords Don't Match"});
            $("#password-confirm").addClass("error");
            $("#password-confirm-container").append($err);
        }
    });
    $("#password-confirm").focusin(function(e) {
        $("#password-confirm").removeClass("error");
        $("#password-confirm-container .error-text").remove();
    });
});

function highlightTicks(amt) {
    $(".tick").slice(0, amt).addClass("highlight");
}